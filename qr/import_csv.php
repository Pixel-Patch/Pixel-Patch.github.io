<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');

$importSuccess = false; // Track the success of the import

if (isset($_POST['import_csv_btn'])) {
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
        // Generate new filename with current date and time
        $newFileName = "import_" . date('Y-m-d_H-i-s') . ".csv";
        $destination = "../assets/csv/" . $newFileName; // Adjust the path to your needs

        // Attempt to move the uploaded file to its new location
        if (move_uploaded_file($_FILES['csv_file']['tmp_name'], $destination)) {
            // File successfully saved, now open and process it
            $handle = fopen($destination, "r");
            if ($handle !== FALSE) {
                fgetcsv($handle); // Skip the first line if it contains column headers
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    // Assuming the CSV columns match your database fields in order
                    $sql = "INSERT INTO `v_user` (`V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `Date_Registered`, `image`, `imageDL`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("sssssssssssssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13], $currentDateTime, $data[14],  $data[15]);
                        if ($stmt->execute()) {
                            $importSuccess = true; // Assume success for this row
                        } else {
                            echo "Error: " . $stmt->error;
                            $importSuccess = false; // Fail the whole import on any error
                            break; // Stop importing further rows on first error
                        }
                        $stmt->close();
                    } else {
                        echo "Error preparing statement: " . $conn->error;
                        break;
                    }
                }
                fclose($handle);
                if ($importSuccess) {
                    // If import was successful, redirect
                    header('Location: vehicle_info.php');
                    exit();
                }
            }
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
}
$conn->close();
