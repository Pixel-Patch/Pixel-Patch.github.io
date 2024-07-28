<?php include('header.php'); ?>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES vehicle-->
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
<link href="../plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<style>
    .bold-label {
        font-weight: bold !important;
        color: #3b3f5c !important;
    }
</style>

</head>

<body class="sidebar-noneoverflow">

    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>

    <?php include('navbar.php'); ?>
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <?php include('topbar.php'); ?>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">
                    <?php

                    $id = $_GET['3cia'];
                    $sql = "SELECT * FROM user WHERE id = '$id' ";
                    $query = $conn->query($sql) or die($conn->error);
                    $row = $query->fetch_assoc();
                    ?>
                    <?php do { ?>
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">

                                <h3>Edit <?php echo $row['Name']; ?>'s Information</h3>
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6" style="position: relative; padding-bottom:3%">

                                        <form action="updateuser.php?3cia=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                            <h5 style="font-weight: bold;">User Info</h5> <br>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="RollNo">Username</label>
                                                    <input type="text" class="form-control" id="RollNo" placeholder=" " name="RollNo" required value="<?php echo $row['RollNo']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="Name">Name</label>
                                                    <input type="text" class="form-control" id="Name" placeholder=" " name="Name" required value="<?php echo $row['Name']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="Type">Type</label>
                                                    <select class="form-control" id="Type" name="Type">
                                                        <option value="admin" <?php echo ($row['Type'] == "admin") ? 'selected' : ''; ?>>Admin</option>
                                                        <option value="emp" <?php echo ($row['Type'] == "emp") ? 'selected' : ''; ?>>Employee</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="EmailId">Email</label>
                                                    <input type="text" class="form-control" id="EmailId" placeholder="" name="EmailId" required value="<?php echo $row['EmailId']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="MobNo">Cellphone Number</label>
                                                    <input type="text" class="form-control" id="MobNo" pattern="\+63[0-9]{10}" title="Enter a valid cellphone number in the format +63X XXXX XXXX" placeholder="Enter remaining digits" name="MobNo" required value="<?php echo $row['MobNo']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="Password">Password</label>
                                                    <input type="password" class="form-control" id="Password" placeholder="Enter new password" name="Password">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="ConfirmPassword">Confirm Password</label>
                                                    <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm new password" name="ConfirmPassword">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                                        <label>
                                                            <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a>
                                                            Avatar Image
                                                        </label>
                                                        <label class="custom-file-container__custom-file">
                                                            <input type="file" name="image" id="imageInput" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                        </label>
                                                        <div class="custom-file-container__image-preview" style="display: none;"></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <input type="submit" class="btn btn-dark btn-sm" value="Update" name="submit" style="position: absolute; bottom: 4%; right: 2%; font-weight: bold; font-size: 16px;">
                                            <input type="hidden" name="ID" value="<?php echo $id ?>">
                                        </form>

                                    </div>
                                </div>
                            <?php } while ($row = $query->fetch_assoc()) ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $RollNo = $_POST['RollNo'];
        $Name = $_POST['Name'];
        $Type = $_POST['Type'];
        $EmailId = $_POST['EmailId'];
        $MobNo = $_POST['MobNo'];
        $Password = $_POST['Password'];
        $ConfirmPassword = $_POST['ConfirmPassword'];
        $id = $_POST['ID']; // Assuming $id is being sent through the form

        // Initialize connection to database
        // $conn = new mysqli('your_host', 'your_username', 'your_password', 'your_database');

        // Initialize error message variable
        $errorMessage = '';

        // Check for duplicate RollNo
        $checkQuery = "SELECT * FROM `user` WHERE `RollNo` = '$RollNo' AND `ID` != $id";
        $checkResult = $conn->query($checkQuery);
        if ($checkResult->num_rows > 0) {
            $errorMessage = 'Error: Username already exists!';
        } else {
            // Set the initial SQL query
            $sql1 = "UPDATE `user` SET `RollNo`='$RollNo', `Name`='$Name', `Type`='$Type', `EmailId`='$EmailId', `MobNo`='$MobNo'";

            // Handle password update if provided and matches
            if (!empty($Password) && $Password === $ConfirmPassword) {
                $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
                $sql1 .= ", `Password`='$hashed_password'";
            } elseif (!empty($Password) || !empty($ConfirmPassword)) {
                $errorMessage = 'Error: Passwords do not match!';
            }

            // Image upload handling
            if (!empty($_FILES["image"]["name"])) {
                $targetDir = "../assets/uploads/";
                $fileName = basename($_FILES["image"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                        // Image upload success, modify SQL to include image file name
                        $sql1 .= ", `image`='$fileName'";
                    } else {
                        $errorMessage = 'File upload failed, please try again.';
                    }
                } else {
                    $errorMessage = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                }
            }

            // Add WHERE clause to the SQL query
            $sql1 .= " WHERE `ID` = $id";

            // Execute the SQL query if no errors
            if (empty($errorMessage)) {
                $conn->query($sql1) or die($conn->error);
                echo '<script>window.location.href = "qrvusers.php";</script>';
                exit();
            }
        }
    }
    ?>



    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../assets/js/custom.js"></script>

    <script src="../plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage');
    </script>
    <script>
        $(document).ready(function() {
            $('#imageInput').change(function() {
                if (this.files && this.files[0]) {
                    $('.custom-file-container__image-preview').css('display', 'block');
                } else {
                    $('.custom-file-container__image-preview').css('display', 'none');
                }
            });
        });
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script src="../bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php if (!empty($errorMessage)) : ?>
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Update Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo $errorMessage; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn btn-open" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>
    <?php endif; ?>


</body>

</html>