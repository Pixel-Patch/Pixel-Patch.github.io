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
                    $sql = "SELECT * FROM v_user WHERE id = '$id' ";
                    $query = $conn->query($sql) or die($conn->error);
                    $row = $query->fetch_assoc();
                    ?>
                    <?php do { ?>
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">

                                <h3>Edit <?php echo $row['Fullname']; ?>'s Information</h3>
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6" style="position: relative; padding-bottom:3%">

                                        <form action="Update.php?3cia=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                            <h5 style="font-weight: bold;">User Info</h5> <br>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-2">
                                                    <label class="bold-label" for="type">Type</label>
                                                    <select class="form-control" id="type" name="userType">
                                                        <option></option>
                                                        <option value="PSG" <?php echo ($row['userType'] == "PSG") ? 'selected' : ''; ?>>PSG</option>
                                                        <option value="OP" <?php echo ($row['userType'] == "OP") ? 'selected' : ''; ?>>OP</option>
                                                        <option value="RESIDENT" <?php echo ($row['userType'] == "RESIDENT") ? 'selected' : ''; ?>>RESIDENT</option>
                                                        <option value="PT" <?php echo ($row['userType'] == "PT") ? 'selected' : ''; ?>>PT</option>
                                                        <option value="ST JUDE" <?php echo ($row['userType'] == "ST JUDE") ? 'selected' : ''; ?>>ST JUDE</option>
                                                        <option value="LPLP" <?php echo ($row['userType'] == "LPLP") ? 'selected' : ''; ?>>LPLP</option>
                                                        <option value="VISITOR" <?php echo ($row['userType'] == "LPLP") ? 'selected' : ''; ?>>VISITOR</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="bold-label" style="" for="rank">Rank</label>
                                                    <input type="text" class="form-control" id="rank" placeholder="Enter Rank" name="rank" required value="<?php echo $row['Rank']; ?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="bold-label" for="bos">Branch of Service</label>
                                                    <input type="text" class="form-control" id="bos" placeholder="Enter Branch of Service" name="bos" required value="<?php echo $row['Branch_of_Service']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="fullname">Fullname</label>
                                                    <input type="text" class="form-control" id="fullname" placeholder="Enter Fullname" name="fullname" required value="<?php echo $row['Fullname']; ?>">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label class="bold-label" for="dob">Date of Birth</label>
                                                    <input type="date" class="form-control" id="dob" title="Please enter your date of birth in YYYY-MM-DD format" placeholder="YYYY-MM-DD" name="dob" required value="<?php echo $row['Date_of_Birth']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-3">
                                                    <label class="bold-label" for="cellno">Cellphone Number</label>
                                                    <input type="text" class="form-control" id="cellno" pattern="\+63[0-9]{10}" title="Enter a valid cellphone number in the format +63X XXXX XXXX" placeholder="Enter remaining digits" name="cellno" required value="<?php echo $row['Cellphone_Number']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="bold-label" for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" placeholder="Enter Full Address" name="address" required value="<?php echo $row['Address']; ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="bold-label" for="office">Office</label>
                                                    <input type="text" class="form-control" id="office" placeholder="Enter Office" name="office" required value="<?php echo $row['Office']; ?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="bold-label" for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option></option>
                                                        <option value="Male" <?php echo ($row['Gender'] == "Male") ? 'selected' : ''; ?>>Male</option>
                                                        <option value="Female" <?php echo ($row['Gender'] == "Female") ? 'selected' : ''; ?>>Female</option>
                                                        <option value="Other" <?php echo ($row['Gender'] == "Other") ? 'selected' : ''; ?>>Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row mb-4">
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
                                                        <div class="custom-file-container__image-name" style="display: <?php echo ($row['image']) ? 'block' : 'none'; ?>;">
                                                            <?php echo basename($row['image']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="custom-file-container" data-upload-id="myDriversLicense">
                                                        <label>
                                                            <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a>
                                                            Driver's License ID
                                                        </label>
                                                        <label class="custom-file-container__custom-file">
                                                            <input type="file" name="drivers_license_id" id="driversLicenseInput" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                        </label>
                                                        <div class="custom-file-container__image-preview" style="display: none;"></div>
                                                        <div class="custom-file-container__image-name" style="display: <?php echo ($row['imageDL']) ? 'block' : 'none'; ?>;">
                                                            <?php echo basename($row['imageDL']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <h5 style="font-weight: bold;">Vehicle Info</h5> <br>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-3">
                                                    <label class="bold-label" for="v_model">Model</label>
                                                    <input type="text" class="form-control" id="v_model" placeholder="Enter Vehicle Model" name="v_model" required value="<?php echo $row['Vehicle_Model']; ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="bold-label" for="v_type">Type</label>
                                                    <input type="text" class="form-control" id="v_type" placeholder="Enter Vehicle Type" name="v_type" required value="<?php echo $row['Vehicle_Type']; ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="bold-label" for="v_color">Color</label>
                                                    <input type="text" class="form-control" id="v_color" placeholder="Enter Vehicle Color" name="v_color" required value="<?php echo $row['Vehicle_Color']; ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="bold-label" for="v_plate">Plate Number</label>
                                                    <input type="text" class="form-control" id="v_plate" placeholder="Enter Vehicle Plate Number" name="v_plate" required value="<?php echo $row['Vehicle_Plate_Number']; ?>">
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <input type="submit" class="btn btn-dark btn-sm" value="Update" name="submit" style="font-weight: bold; font-size: 16px; width: 150px; margin-bottom:-4%">
                                                </div>
                                            </div>
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
    // Assuming you have established the database connection using $conn
    $userIdQuery = "SELECT `V_USERID`, `image`, `imageDL` FROM `v_user` WHERE ID = $id";
    $userIdResult = $conn->query($userIdQuery);

    if ($userIdResult && $userIdResult->num_rows > 0) {
        $userIdRow = $userIdResult->fetch_assoc();
        $V_USERID = $userIdRow['V_USERID'];
        $row = $userIdRow; // Add this line to store the fetched row

        if (isset($_POST['submit'])) {
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

            // Set the initial SQL query without the image columns
            $sql1 = "UPDATE `v_user` SET `userType`='$userType', `Rank`='$rank', `Branch_of_Service`='$bos', `Fullname`='$fullname', `Cellphone_Number`='$cellno', `Date_of_Birth`='$dob', `Address`='$address', `Office`='$office', `Gender`='$gender', `Vehicle_Model`='$v_model', `Vehicle_Type`='$v_type', `Vehicle_Color`='$v_color', `Vehicle_Plate_Number`='$v_plate' WHERE ID = $id";

            // Image upload handling
            if (!empty($_FILES["image"]["name"]) && !empty($V_USERID)) {
                $avatarTargetDir = "../assets/avataruploads/";
                $avatarFileName = "$V_USERID - $fullname." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                $avatarTargetFilePath = $avatarTargetDir . $avatarFileName;

                // Get the file extension of the previous photo
                $prevPhotoExt = pathinfo($row['image'], PATHINFO_EXTENSION);

                // Get the base name of the previous photo (without extension)
                $prevPhotoBaseName = pathinfo($row['image'], PATHINFO_FILENAME);

                // Delete the previous photo with the same name but different extension
                if (!empty($prevPhotoExt) && file_exists($avatarTargetDir . "$prevPhotoBaseName.$prevPhotoExt")) {
                    unlink($avatarTargetDir . "$prevPhotoBaseName.$prevPhotoExt");
                }

                // Delete the previous photo with the same name as the new photo (in case it's different)
                if (!empty($prevPhotoExt) && file_exists($avatarTargetDir . "$V_USERID - $fullname.$prevPhotoExt")) {
                    unlink($avatarTargetDir . "$V_USERID - $fullname.$prevPhotoExt");
                }

                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                if (in_array(pathinfo($avatarTargetFilePath, PATHINFO_EXTENSION), $allowTypes)) {
                    // Upload file to the server
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $avatarTargetFilePath)) {
                        // Image upload success, modify SQL to include image file name
                        $sql1 = "UPDATE `v_user` SET `userType`='$userType', `Rank`='$rank', `Branch_of_Service`='$bos', `Fullname`='$fullname', `Cellphone_Number`='$cellno', `Date_of_Birth`='$dob', `Address`='$address', `Office`='$office', `Gender`='$gender', `Vehicle_Model`='$v_model', `Vehicle_Type`='$v_type', `Vehicle_Color`='$v_color', `Vehicle_Plate_Number`='$v_plate', `image`='$avatarFileName' WHERE ID = $id";
                    } else {
                        $errorUpload = "File upload failed, please try again.";
                    }
                } else {
                    $errorUploadType = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
                }
            }

            // ImageDL upload handling
            if (!empty($_FILES["drivers_license_id"]["name"]) && !empty($V_USERID)) {
                $dlTargetDir = "../assets/dluploads/";
                $dlFileName = "$V_USERID - $fullname." . pathinfo($_FILES["drivers_license_id"]["name"], PATHINFO_EXTENSION);
                $dlTargetFilePath = $dlTargetDir . $dlFileName;

                // Get the file extension of the previous DL photo
                $prevDlPhotoExt = pathinfo($row['imageDL'], PATHINFO_EXTENSION);

                // Get the base name of the previous DL photo (without extension)
                $prevDlPhotoBaseName = pathinfo($row['imageDL'], PATHINFO_FILENAME);

                // Delete the previous DL photo with the same name but different extension
                if (!empty($prevDlPhotoExt) && file_exists($dlTargetDir . "$prevDlPhotoBaseName.$prevDlPhotoExt")) {
                    unlink($dlTargetDir . "$prevDlPhotoBaseName.$prevDlPhotoExt");
                }

                // Delete the previous DL photo with the same name as the new photo (in case it's different)
                if (!empty($prevDlPhotoExt) && file_exists($dlTargetDir . "$V_USERID - $fullname.$prevDlPhotoExt")) {
                    unlink($dlTargetDir . "$V_USERID - $fullname.$prevDlPhotoExt");
                }

                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                if (in_array(pathinfo($dlTargetFilePath, PATHINFO_EXTENSION), $allowTypes)) {
                    // Upload file to the server
                    if (move_uploaded_file($_FILES["drivers_license_id"]["tmp_name"], $dlTargetFilePath)) {
                        // Image upload success, modify SQL to include image file name
                        $sql1 = "UPDATE `v_user` SET `userType`='$userType', `Rank`='$rank', `Branch_of_Service`='$bos', `Fullname`='$fullname', `Cellphone_Number`='$cellno', `Date_of_Birth`='$dob', `Address`='$address', `Office`='$office', `Gender`='$gender', `Vehicle_Model`='$v_model', `Vehicle_Type`='$v_type', `Vehicle_Color`='$v_color', `Vehicle_Plate_Number`='$v_plate', `imageDL`='$dlFileName' WHERE ID = $id";
                    } else {
                        $errorUpload = "File upload failed, please try again.";
                    }
                } else {
                    $errorUploadType = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
                }
            }

            // Execute the SQL query
            $conn->query($sql1) or die($conn->error);

            echo '<script>window.location.href = "vehicle_info.php";</script>';
            exit();
        }
    } else {
        echo "Error: Unable to fetch V_USERID from the database.";
        exit();
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
        var secondUpload = new FileUploadWithPreview('myDriversLicense');
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
            $('#driversLicenseInput').change(function() {
                if (this.files && this.files[0]) {
                    $('.custom-file-container__image-preview').css('display', 'block');
                } else {
                    $('.custom-file-container__image-preview').css('display', 'none');
                }
            });
        });
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>