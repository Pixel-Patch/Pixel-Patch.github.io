<?php
// Start session to enable the use of session variables
session_start();

// Database configuration
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb";

// Establish a connection to the database
$conn = new mysqli($server, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

// Set the default timezone
date_default_timezone_set('Asia/Manila');


// Check if the form data has been submitted
if (isset($_POST['v_userID'])) {
    // Start the session or continue the existing one
    $v_userID = $_POST['v_userID'];

    // Assign the retrieved user ID to $id
    $id = $v_userID;

    // Check if the user ID exists in the v_user table
    $userCheckSql = "SELECT * FROM v_user WHERE V_USERID='$id'";
    $userCheckQuery = $conn->query($userCheckSql);

    if ($userCheckQuery->num_rows == 0) {
        // If user ID not found, set error message and redirect
        $_SESSION['error'] = 'User not found. Please scan your QR Code again.';
        header("Location: scanner.php");
        exit(); // Stop executing the rest of the code
    }
    // Get current date and time
    $currentDateTime = date('Y-m-d H:i:s'); // Format: Year-Month-Day Hour:Minute:Second

    // Check if there is an existing entry for the user with status '1' (time out) within the last 5 minutes
    $fiveMinutesAgo = date('Y-m-d H:i:s', strtotime('-5 minutes')); // 5 minutes ago
    $sql = "SELECT * FROM vehicle_log WHERE V_USERID='$id' AND STATUS='1' AND TIMEOUT > '$fiveMinutesAgo'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        // If a recent time out exists, redirect back to the scanner page
        header("Location: scanner.php");
        exit(); // Stop executing the rest of the code
    }

    // Check if there is an existing entry for the user with status '0' (time in)
    $sql = "SELECT vehicle_log.*, v_user.Rank, v_user.Fullname, v_user.image, v_user.Gender, v_user.Date_of_Birth, v_user.Office, v_user.Date_Registered, v_user.Vehicle_Model, v_user.Vehicle_Type, v_user.Vehicle_Plate_Number 
FROM vehicle_log 
JOIN v_user ON vehicle_log.V_USERID = v_user.V_USERID 
WHERE vehicle_log.V_USERID='$id' AND vehicle_log.STATUS='0'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        // If entry exists, get the timestamp of the last scan
        $lastScanRow = $query->fetch_assoc();
        $lastScanTime = strtotime($lastScanRow['TIMEIN']);
        $currentTime = strtotime($currentDateTime);

        // Calculate the time difference in seconds
        $timeDifference = $currentTime - $lastScanTime;

        // Check if the time difference is less than 5 minutes (300 seconds)
        if ($timeDifference < 300) {
            // Do not set an error message, just redirect back to the scanner page
            header("Location: scanner.php");
            exit(); // Stop executing the rest of the code
        } else {
            // If the time difference is greater than or equal to 5 minutes, update the entry to time out
            $sql = "UPDATE vehicle_log SET TIMEOUT='$currentDateTime', STATUS='1' WHERE V_USERID='$id' AND STATUS='0'";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['success'] = 'Successfully Time Out: ' . $id;
                $_SESSION['userID'] = $id;

                // Assign user details to session variables
                $_SESSION['Rank'] = $lastScanRow['Rank'];
                $_SESSION['Fullname'] = $lastScanRow['Fullname'];
                $_SESSION['image'] = $lastScanRow['image'];
                $_SESSION['Gender'] = $lastScanRow['Gender'];
                $_SESSION['Date_of_Birth'] = $lastScanRow['Date_of_Birth'];
                $_SESSION['Office'] = $lastScanRow['Office'];
                $_SESSION['Date_Registered'] = $lastScanRow['Date_Registered'];
                $_SESSION['Vehicle_Model'] = $lastScanRow['Vehicle_Model'];
                $_SESSION['Vehicle_Type'] = $lastScanRow['Vehicle_Type'];
                $_SESSION['Vehicle_Plate_Number'] = $lastScanRow['Vehicle_Plate_Number'];
            } else {
                // If update fails, set error message in session variable
                $_SESSION['error'] = $conn->error;
            }
        }
    } else {
        // Insert a new entry with time in
        $sql = "INSERT INTO vehicle_log(V_USERID, TIMEIN, STATUS) VALUES('$id','$currentDateTime','0')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = 'Successfully Time In: ' . $id;
            $_SESSION['userID'] = $id;

            // Fetch user details from the database
            $userDetailsSql = "SELECT Rank, Fullname, image, Gender, Date_of_Birth, Office, Date_Registered, Vehicle_Model, Vehicle_Type, Vehicle_Plate_Number FROM v_user WHERE V_USERID='$id'";
            $userDetailsResult = $conn->query($userDetailsSql);
            if ($userDetailsResult->num_rows > 0) {
                // Assuming you have the user details
                $userDetails = $userDetailsResult->fetch_assoc(); // Fetch the result into an associative array
                // Assign user details to session variables
                $_SESSION['Rank'] = $userDetails['Rank'];
                $_SESSION['Fullname'] = $userDetails['Fullname'];
                $_SESSION['image'] = $userDetails['image'];
                $_SESSION['Gender'] = $userDetails['Gender'];
                $_SESSION['Date_of_Birth'] = $userDetails['Date_of_Birth'];
                $_SESSION['Office'] = $userDetails['Office'];
                $_SESSION['Date_Registered'] = $userDetails['Date_Registered'];
                $_SESSION['Vehicle_Model'] = $userDetails['Vehicle_Model'];
                $_SESSION['Vehicle_Type'] = $userDetails['Vehicle_Type'];
                $_SESSION['Vehicle_Plate_Number'] = $userDetails['Vehicle_Plate_Number'];
            } else {
                // Handle the case where user details are not found (though unlikely)
                $_SESSION['error'] = 'Failed to retrieve user details.';
            }
        } else {
            // If insertion fails, set error message in session variable
            $_SESSION['error'] = $conn->error;
        }
    }
} else {
    // If form data not submitted, set error message in session variable
    $_SESSION['error'] = 'Please scan your QR Code number';
}


// Redirect to the scanner page after processing the form data
header("location: scanner.php");

// Close the database connection
$conn->close();
