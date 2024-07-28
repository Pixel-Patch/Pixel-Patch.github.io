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

date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');

function uploadImage($file, $fullname, $uploadDir)
{
    $imageName = $file['name'];
    $tmpName = $file['tmp_name'];
    $error = $file['error'];
    $allowedExs = array("jpg", "jpeg", "png");

    if ($error === 0) {
        $ex = pathinfo($imageName, PATHINFO_EXTENSION);
        $exLc = strtolower($ex);

        if (in_array($exLc, $allowedExs)) {
            $newName = 'V' . str_replace(' ', '_', $fullname) . '.' . $exLc;
            $uploadPath = $uploadDir . $newName;
            move_uploaded_file($tmpName, $uploadPath);
            return $newName;
        }
    }
    return null;
}

if (isset($_POST['submit'])) {
    // Form variables 
    $sponsor = strtoupper($_POST['sponsor']);
    $fullname = strtoupper($_POST['name']);
    $dob = $_POST['birthdate'];
    $gender = strtoupper($_POST['gender']);
    $cellno = $_POST['cellphoneNumber'];
    $address = strtoupper($_POST['address']);
    $email = $_POST['email'];
    $visitReason = $_POST['visitReason'];
    $v_model = strtoupper($_POST['vModel']);
    $v_type = strtoupper($_POST['vType']);
    $v_color = strtoupper($_POST['vColor']);
    $v_plate = strtoupper($_POST['vPlateNumber']);
    $visitDate = $_POST['visitDate'];

    $new_avatar_name = uploadImage($_FILES['avatarImage'], $fullname, '../assets/vauploads/');
    $new_dl_name = uploadImage($_FILES['driversLicenseImage'], $fullname, '../assets/vdluploads/');
    $new_v_name = uploadImage($_FILES['vehicleImage'], $fullname, '../assets/vuploads/');

    $stmt = $conn->prepare("INSERT INTO temp_visitor (userType, sponsor, visitReason, name, email, gender, birthdate, cellphoneNumber, address, vModel, vType, vColor, vPlateNumber, avatarImage, driversLicenseImage, vehicleImage, dateRegistered, visitDate, status)
                            VALUES ('VISITOR', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'PENDING')");
    $stmt->bind_param("sssssssssssssssss", $sponsor, $visitReason, $fullname, $email, $gender, $dob, $cellno, $address, $v_model, $v_type, $v_color, $v_plate, $new_avatar_name, $new_dl_name, $new_v_name, $currentDateTime, $visitDate);

    if ($stmt->execute() === TRUE) {
        $last_id = $stmt->insert_id;
        $V_USERID = "V" . str_pad($last_id, 4, '0', STR_PAD_LEFT);

        $update_stmt = $conn->prepare("UPDATE temp_visitor SET V_USERID=? WHERE id=?");
        $update_stmt->bind_param("si", $V_USERID, $last_id);
        $update_stmt->execute();

        header("Location:pendingVisitor.php");
    } else {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
    exit();
}
