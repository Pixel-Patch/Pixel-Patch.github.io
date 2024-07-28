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
    die("Connection failed: " . $conn->connect_error);
}

// Set the default timezone
date_default_timezone_set('Asia/Manila');

// Function to log activity
function logActivity($conn, $action, $userID, $oldValue, $newValue) {
    if (isset($_SESSION['RollNo'])) {
        $rollno = $_SESSION['RollNo'];
        $userSql = "SELECT `id`, `RollNo`, `Name`, `Type`, `title`, `EmailId`, `MobNo`, `Password`, `image`, `Date_Registered` FROM `user` WHERE `RollNo`='$rollno'";
        $userResult = $conn->query($userSql);

        if ($userResult->num_rows > 0) {
            $userRow = $userResult->fetch_assoc();
            $adminRollNo = $userRow['RollNo'];

            $logSql = "INSERT INTO `activity_log`(`name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`) 
                       VALUES ('$adminRollNo', '$action', '$userID', 'vehicle_log', 'STATUS', '$oldValue', '$newValue', NOW())";
            $conn->query($logSql);
        } else {
            echo "Admin user not found.";
            exit();
        }
    } else {
        echo "RollNo is not set in the session";
        exit();
    }
}

// Check if the form data has been submitted
if (isset($_POST['v_userID'])) {
    $v_userID = $_POST['v_userID'];
    $id = $v_userID;

    // Check if the user ID exists in the v_user table
    $userCheckSql = "SELECT * FROM v_user WHERE V_USERID='$id'";
    $userCheckQuery = $conn->query($userCheckSql);

    // Check if the user ID exists in the visitor table if not found in v_user
    if ($userCheckQuery->num_rows == 0) {
        $visitorCheckSql = "SELECT * FROM visitor WHERE V_USERID='$id'";
        $visitorCheckQuery = $conn->query($visitorCheckSql);

        if ($visitorCheckQuery->num_rows == 0) {
            $_SESSION['error'] = 'User not found. Please scan your QR Code again.';
            header("Location: scanner.php");
            exit();
        } else {
            $userCheckQuery = $visitorCheckQuery;
            $userType = "visitor";
        }
    } else {
        $userType = "v_user";
    }

    // Get current date and time
    $currentDateTime = date('Y-m-d H:i:s');

    // Prevent duplicate time-out within 5 minutes
    $fiveMinutesAgo = date('Y-m-d H:i:s', strtotime('-5 minutes'));
    $sql = "SELECT * FROM vehicle_log WHERE V_USERID='$id' AND STATUS='1' AND TIMEOUT > '$fiveMinutesAgo'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        header("Location: scanner.php");
        exit();
    }

    // Check if there's an existing time-in entry
    $sql = "SELECT vehicle_log.*, v_user.userType, v_user.Rank, v_user.Fullname, v_user.image, v_user.Gender, v_user.Date_of_Birth, v_user.Office, v_user.Date_Registered, v_user.Vehicle_Model, v_user.Vehicle_Type, v_user.Vehicle_Plate_Number
            FROM vehicle_log
            JOIN v_user ON vehicle_log.V_USERID = v_user.V_USERID
            WHERE vehicle_log.V_USERID='$id' AND vehicle_log.STATUS='0'";
    
    $query = $conn->query($sql);

    if ($query->num_rows == 0 && $userType == "visitor") {
        $sql = "SELECT vehicle_log.*, visitor.userType, visitor.name AS Fullname, visitor.avatarImage AS image, visitor.gender AS Gender, visitor.birthdate AS Date_of_Birth, visitor.address AS Office, visitor.dateRegistered AS Date_Registered, visitor.vModel AS Vehicle_Model, visitor.vType AS Vehicle_Type, visitor.vPlateNumber AS Vehicle_Plate_Number
                FROM vehicle_log
                JOIN visitor ON vehicle_log.V_USERID = visitor.V_USERID
                WHERE vehicle_log.V_USERID='$id' AND vehicle_log.STATUS='0'";
        $query = $conn->query($sql);
    }

    if ($query->num_rows > 0) {
        $lastScanRow = $query->fetch_assoc();
        $lastScanTime = strtotime($lastScanRow['TIMEIN']);
        $currentTime = strtotime($currentDateTime);
        $timeDifference = $currentTime - $lastScanTime;

        if ($timeDifference < 300) {
            header("Location: scanner.php");
            exit();
        } else {
            $sql = "UPDATE vehicle_log SET TIMEOUT='$currentDateTime', STATUS='1' WHERE V_USERID='$id' AND STATUS='0'";
            if ($conn->query($sql) === TRUE) {
                logActivity($conn, 'TIMED OUT', $id, '0', '1');
                $_SESSION['success'] = 'Successfully Time Out: ' . $id;
                $_SESSION['userID'] = $id;
            } else {
                $_SESSION['error'] = $conn->error;
            }
        }
    } else {
        $sql = "INSERT INTO vehicle_log(V_USERID, TIMEIN, STATUS) VALUES('$id','$currentDateTime','0')";
        if ($conn->query($sql) === TRUE) {
            logActivity($conn, 'TIMED IN', $id, NULL, '0');
            $_SESSION['success'] = 'Successfully Time In: ' . $id;
            $_SESSION['userID'] = $id;

            if ($userType == "v_user") {
                $userDetailsSql = "SELECT id, V_USERID, userType, Rank, Branch_of_Service, Fullname, Cellphone_Number, Date_of_Birth, Address, Office, Gender, Vehicle_Model, Vehicle_Type, Vehicle_Color, Vehicle_Plate_Number, Date_Registered, image, imageDL FROM v_user WHERE V_USERID='$id'";
                $userDetailsResult = $conn->query($userDetailsSql);
                if ($userDetailsResult->num_rows > 0) {
                    $userDetails = $userDetailsResult->fetch_assoc();
                    foreach ($userDetails as $key => $value) {
                        $_SESSION[$key] = $value;
                    }
                } else {
                    $_SESSION['error'] = 'Failed to retrieve user details.';
                }
            } else {
                $userDetailsSql = "SELECT id, V_USERID, userType, sponsor, visitReason, name, email, gender, birthdate, cellphoneNumber, address, vModel, vType, vColor, vPlateNumber, avatarImage, driversLicenseImage, vehicleImage, dateRegistered, visitDate, status FROM visitor WHERE V_USERID='$id'";
                $userDetailsResult = $conn->query($userDetailsSql);
                if ($userDetailsResult->num_rows > 0) {
                    $userDetails = $userDetailsResult->fetch_assoc();
                    foreach ($userDetails as $key => $value) {
                        $_SESSION[$key] = $value;
                    }
                } else {
                    $_SESSION['error'] = 'Failed to retrieve user details.';
                }
            }
        } else {
            $_SESSION['error'] = $conn->error;
        }
    }
} else {
    $_SESSION['error'] = 'Please scan your QR Code number';
}

header("location: scanner.php");
$conn->close();
?>
