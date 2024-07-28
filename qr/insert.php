<?php session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');

if (isset($_POST['submit'])) {
    // Get the maximum ID from the database
    $sqlMaxId = "SELECT MAX(CAST(SUBSTRING_INDEX(V_USERID, ' ', 1) AS SIGNED)) AS max_id FROM v_user";
    $resultMaxId = $conn->query($sqlMaxId);
    $rowMaxId = $resultMaxId->fetch_assoc();
    $maxId = $rowMaxId['max_id'];

    // Increment and pad with zeros
    $newId = str_pad($maxId + 1, 4, '0', STR_PAD_LEFT);

    // Create the new V_USERID
    $v_user_id = $newId;

    $id = $_POST['id'];
    $userType = $_POST['userType'];
    $rank = $_POST['rank'];
    $bos = $_POST['bos'];
    $fullname = $_POST['fullname'];
    $cellno = $_POST['cellno'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $office = $_POST['office'];
    $gender = $_POST['gender'];
    $v_model = $_POST['v_model'];
    $v_type = $_POST['v_type'];
    $v_color = $_POST['v_color'];
    $v_plate = $_POST['v_plate'];

    // Handle image upload
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
            // Generate new image filename in the format "V_USERID - Fullname.png/.jpg"
            $new_img_name = $v_user_id . ' - ' . str_replace(' ', '_', $fullname) . '.' . $img_ex_lc;
            $img_upload_path = '../assets/avataruploads/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Handle driver's license image upload
            $dl_name = $_FILES['drivers_license_id']['name'];
            $dl_size = $_FILES['drivers_license_id']['size'];
            $dl_tmp_name = $_FILES['drivers_license_id']['tmp_name'];
            $dl_error = $_FILES['drivers_license_id']['error'];

            if ($dl_error === 0) {
                $dl_ex = pathinfo($dl_name, PATHINFO_EXTENSION);
                $dl_ex_lc = strtolower($dl_ex);

                if (in_array($dl_ex_lc, $allowed_exs)) {
                    // Generate new driver's license image filename in the format "V_USERID - Fullname.png/.jpg"
                    $new_dl_name = $v_user_id . ' - ' . str_replace(' ', '_', $fullname) . '.' . $dl_ex_lc;
                    $dl_upload_path = '../assets/dluploads/' . $new_dl_name;
                    move_uploaded_file($dl_tmp_name, $dl_upload_path);

                    // Include userType in the SQL INSERT statement
                    $sql = "INSERT INTO `v_user` (`V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `image`, `imageDL`, `Date_Registered`)
VALUES ('$v_user_id', '$userType', '$rank', '$bos', '$fullname', '$cellno', '$dob', '$address', '$office', '$gender', '$v_model', '$v_type', '$v_color', '$v_plate', '$new_img_name', '$new_dl_name', '$currentDateTime')";

                    $conn->query($sql) or die($conn->error);


                    // Fetch the name of the currently logged-in employee from the qrcodedb.user table
                    $rollno = $_SESSION['RollNo'];
                    $sql = "SELECT RollNo FROM qrcodedb.user WHERE RollNo='$rollno'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $name = $row['RollNo'];

                    // Insert a static value into the activity log
                    $sql = "INSERT INTO `activity_log`(`id`, `name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`)
VALUES (NULL, '$name', 'Added', '$newId', 'v_user', 'All', Null, 'All', '$currentDateTime')";

                    $conn->query($sql) or die($conn->error);

                    echo header("Location:vehicle_info.php");
                    exit();
                } else {
                    // If driver's license image format is invalid, insert data without driver's license image
                    $sql = "INSERT INTO `v_user` (`V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `image`, `Date_Registered`)
                VALUES ('$v_user_id', '$userType', '$rank', '$bos', '$fullname', '$cellno', '$dob', '$address', '$office', '$gender', '$v_model', '$v_type', '$v_color', '$v_plate', '$new_img_name', '$currentDateTime')";

                    $conn->query($sql) or die($conn->error);


                    // Fetch the name of the currently logged-in employee from the qrcodedb.user table
                    $rollno = $_SESSION['RollNo'];
                    $sql = "SELECT RollNo FROM qrcodedb.user WHERE RollNo='$rollno'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $name = $row['RollNo'];

                    // Insert a static value into the activity log
                    $sql = "INSERT INTO `activity_log`(`id`, `name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`)
VALUES (NULL, '$name', 'Added', '$newId', 'v_user', 'All', Null, 'All', '$currentDateTime')";

                    $conn->query($sql) or die($conn->error);

                    echo header("Location:vehicle_info.php");
                    exit();
                }
            } else {
                // If no driver's license image is uploaded, insert data without driver's license image
                $sql = "INSERT INTO `v_user` (`V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `image`, `Date_Registered`)
                                VALUES ('$v_user_id', '$userType', '$rank', '$bos', '$fullname', '$cellno', '$dob', '$address', '$office', '$gender', '$v_model', '$v_type', '$v_color', '$v_plate', '$new_img_name', '$currentDateTime')";

                $conn->query($sql) or die($conn->error);

                // Fetch the name of the currently logged-in employee from the qrcodedb.user table
                $rollno = $_SESSION['RollNo'];
                $sql = "SELECT RollNo FROM qrcodedb.user WHERE RollNo='$rollno'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $name = $row['RollNo'];

                // Insert a static value into the activity log
                $sql = "INSERT INTO `activity_log`(`id`, `name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`)
VALUES (NULL, '$name', 'Added', '$newId', 'v_user', 'All', Null, 'All', '$currentDateTime')";

                $conn->query($sql) or die($conn->error);

                echo header("Location:vehicle_info.php");
                exit();
            }
        } else {
            // If image format is invalid, insert data without image

            $sql = "INSERT INTO `v_user` (`V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `Date_Registered`)
                                                VALUES ('$v_user_id', '$userType', '$rank', '$bos', '$fullname', '$cellno', '$dob', '$address', '$office', '$gender', '$v_model', '$v_type', '$v_color', '$v_plate', '$currentDateTime')";

            $conn->query($sql) or die($conn->error);

            // Fetch the name of the currently logged-in employee from the qrcodedb.user table
            $rollno = $_SESSION['RollNo'];
            $sql = "SELECT RollNo FROM qrcodedb.user WHERE RollNo='$rollno'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $name = $row['RollNo'];

            // Insert a static value into the activity log
            $sql = "INSERT INTO `activity_log`(`id`, `name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`)
VALUES (NULL, '$name', 'Added', '$newId', 'v_user', 'All', Null, 'All', '$currentDateTime')";
            $conn->query($sql) or die($conn->error);

            echo header("Location:vehicle_info.php");
            exit();
        }
    } else {
        // If no image is uploaded, insert data without image

        $sql = "INSERT INTO `v_user` (`V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `Date_Registered`)
                                                                VALUES ('$v_user_id', '$userType', '$rank', '$bos', '$fullname', '$cellno', '$dob', '$address', '$office', '$gender', '$v_model', '$v_type', '$v_color', '$v_plate', '$currentDateTime')";

        $conn->query($sql) or die($conn->error);

        // Fetch the name of the currently logged-in employee from the qrcodedb.user table
        $rollno = $_SESSION['RollNo'];
        $sql = "SELECT RollNo FROM qrcodedb.user WHERE RollNo='$rollno'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name = $row['RollNo'];

        // Insert a static value into the activity log
        $sql = "INSERT INTO `activity_log`(`id`, `name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`)
VALUES (NULL, '$name', 'Added', '$newId', 'v_user', 'All', Null, 'All', '$currentDateTime')";

        $conn->query($sql) or die($conn->error);


        echo header("Location:vehicle_info.php");
        exit();
    }
}
