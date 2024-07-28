<?php include('dbconn.php'); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>QRv - Register Login Cover Page</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/css/fonts.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/switches.css">



</head>

<body class="form">

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Add Administrator Account</h1>
                        <p class="signup-link"></a></p>
                        <form class="text-left" method="post" enctype="multipart/form-data">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="Name" name="Name" type="text" class="form-control" placeholder="Fullname" required>
                                </div>
                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="Email" type="text" value="" placeholder="Email" required>
                                </div>
                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    <input id="PhoneNumber" name="PhoneNumber" type="text" value="" placeholder="Phone Number" required>
                                </div>
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <polyline points="17 11 19 13 23 9"></polyline>
                                    </svg>
                                    <input id="RollNo" name="RollNo" type="text" class="form-control" placeholder="Username" required>
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="Password" name="Password" type="Password" value="" placeholder="Password" required>
                                </div>
                                <div id="username-field" style="margin-bottom: 10%; ">
                                    <label class="bold-label" for="image">Image</label>
                                    <input id="image" name="image" type="file" class="form-control" placeholder="image" required>
                                </div>
                                <div class="field-wrapper terms_condition">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" class="new-control-input" required>
                                            <span class="new-control-indicator"></span><span>I agree to the <a href="../terms.html"> terms and conditions </a></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" name="signup" value="Sign Up">Get Started!</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <p class="terms-conditions">© QR Vehicle Monitor 2024 All Rights Reserved. Developed by <a href="https://github.com/Pixel-Patch/">Patricia Bagarra</a> under PixelPatch Inc.<br><a href="privacy.html">Privacy</a> and <a href="terms.html">Terms</a>.</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>


    <?php
    date_default_timezone_set('Asia/Manila');

    require_once 'dbconn.php';

    if (isset($_POST['signup'])) {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $mobno = $_POST['PhoneNumber'];
        $rollno = $_POST['RollNo'];
        $type = 'admin';

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];

        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../assets/uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Check if RollNo already exists
                $checkQuery = "SELECT * FROM qrcodedb.user WHERE RollNo = '$rollno'";
                $checkResult = $conn->query($checkQuery);

                if ($checkResult->num_rows > 0) {
                    // RollNo exists, handle the error with a modal
                    echo <<<ERRORMODAL
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="errorModalLabel">Registration Error</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<strong>Error!</strong> Username already exists!
</div>
<div class="modal-footer">
<button type="button" class="btn btn-dark btn btn-open" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<script>
// Ensure jQuery and Bootstrap's JS are loaded before this script
$(document).ready(function(){
$('#errorModal').modal('show');
});
</script>
ERRORMODAL;
                } else {

                    $currentDateTime = date('Y-m-d H:i:s');

                    $sql = "INSERT INTO qrcodedb.user (Name, Type, RollNo, EmailId, MobNo, Password, image, Date_Registered ) VALUES ('$name', '$type', '$rollno', '$email', '$mobno', '$hashed_password','$new_img_name', '$currentDateTime')";

                    if ($conn->query($sql) === TRUE) {
                        echo '<script>window.location.href="scanner.php";</script>';
                        exit();
                    } else {
                        echo <<<ERRORINSERT
    <div class="modal fade" id="insertErrorModal" tabindex="-1" role="dialog" aria-labelledby="insertErrorModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="insertErrorModalLabel">Registration Error</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <strong>Error!</strong> An error occurred while registering the user.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark btn btn-open" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
    $(document).ready(function(){
        $('#insertErrorModal').modal('show');
    });
    </script>
    ERRORINSERT;
                    }
                }
            }
        }
    }
    $conn->close();
    ?>




    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/authentication/form-1.js"></script>

    <!-- Include jQuery -->
    <script src="../assets/js/libs/jquery-3.5.1.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="../bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#errorModal').modal('show');
        });
    </script>



</body>

</html>