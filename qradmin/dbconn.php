<?php
session_start();
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "qrcodedb";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $database);
// Check connection
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}
$conn->set_charset("utf8mb4");

// Redirect users based on their type
if (isset($_SESSION['Type'])) {
    switch ($_SESSION['Type']) {
        case 'admin':
            // Do nothing - this is the admin page
            break;
        case 'emp':
            header("Location: ../qremp/index.php");
            exit();
            break;
        default:
            // Redirect to the login page or another default page
            header("Location: ../login.php");
            exit();
            break;
    }
} else {
    // Redirect to the login page or another default page
    header("Location: ../index.php");
    exit();
}
