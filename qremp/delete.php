<?php
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

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Escape user inputs for security
    $id = $conn->real_escape_string($_GET['id']);

    // Prepare a delete statement
    $sql = "DELETE FROM v_user WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        // Record deleted successfully, redirect to vehicle_info.php
        header("Location: vehicle_info.php");
        exit(); // Ensure that script execution stops after redirection
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
