<?php
session_start(); // Make sure to start the session

$server = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$name = "Not found"; // Set a default value
$rollno = "";

// Fetch the name of the user
if (isset($_SESSION['RollNo'])) {
    $rollno = $_SESSION['RollNo'];
    $stmt = $conn->prepare("SELECT RollNo FROM qrcodedb.user WHERE RollNo = ?");
    $stmt->bind_param("s", $rollno);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['RollNo'];
    }
} else {
    echo "RollNo is not set in the session";
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Escape user inputs for security
    $id = $conn->real_escape_string($_GET['id']);

    // Fetch the record from the v_user table
    $sql = "SELECT * FROM v_user WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $V_USERID = $row['V_USERID'];

        // Insert the record into the archived_v_user table
        $sql = "INSERT INTO `archived_v_user`(`V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `Date_Registered`, `image`, `imageDL`, `status`)
        VALUES ('{$row['V_USERID']}', '{$row['userType']}', '{$row['Rank']}', '{$row['Branch_of_Service']}', '{$row['Fullname']}', '{$row['Cellphone_Number']}', '{$row['Date_of_Birth']}', '{$row['Address']}', '{$row['Office']}', '{$row['Gender']}', '{$row['Vehicle_Model']}', '{$row['Vehicle_Type']}', '{$row['Vehicle_Color']}', '{$row['Vehicle_Plate_Number']}', '{$row['Date_Registered']}', '{$row['image']}', '{$row['imageDL']}', 'Archived')";

        if ($conn->query($sql) === TRUE) {
            // Delete the record from the v_user table
            $sql = "DELETE FROM v_user WHERE id = '$id'";

            if ($conn->query($sql) === TRUE) {
                // Log the activity
                date_default_timezone_set('Asia/Manila');
                $currentDateTime = date('Y-m-d H:i:s');

                $sql = "INSERT INTO `activity_log`(`id`, `name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`)
                VALUES (NULL, '$name', 'Archived', '$V_USERID', 'v_user', 'All',  'All', Null, '$currentDateTime')";

                $conn->query($sql) or die($conn->error);

                // Record deleted successfully, redirect to vehicle_info.php
                header("Location: vehicle_info.php");
                exit(); // Ensure that script execution stops after redirection
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } else {
            echo "Error archiving record: " . $conn->error;
        }
    } else {
        echo "No record found with ID: " . $id;
    }
} else {
    echo "ID parameter is not set in the URL";
}

// Close connection
$conn->close();
