<?php include('header.php'); ?>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES vehicle-->
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
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
                                                <div class="form-group col-md-2">
                                                    <label class="bold-label" for="RollNo">Username</label>
                                                    <input type="text" class="form-control" id="RollNo" placeholder=" " name="RollNo" required value="<?php echo $row['RollNo']; ?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="bold-label" for="Name">Name</label>
                                                    <input type="text" class="form-control" id="Name" placeholder=" " name="Name" required value="<?php echo $row['Name']; ?>">
                                                </div>
                                                <div class="form-group col-md-2">
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
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-2">
                                                    <label class="bold-label" for="image">Image</label>
                                                    <input type="file" name="image" value="<?php echo $row['image']; ?>" />

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

        // Set the initial SQL query without the image column
        $sql1 = "UPDATE `user` SET `Name`='$Name', `Type`='$Type', `EmailId`='$EmailId', `MobNo`='$MobNo' WHERE `ID` = $id";


        // Image upload handling
        if (!empty($_FILES["image"]["name"])) {
            $targetDir = "../assets/uploads/";
            $fileName = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to the server
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                    // Image upload success, modify SQL to include image file name
                    $sql1 = "UPDATE `user` SET `Name`='$Name', `Type`='$Type', `EmailId`='$EmailId', `MobNo`='$MobNo',  `image`='$fileName' WHERE `ID` = $id";
                } else {
                    $errorUpload = "File upload failed, please try again.";
                    // Consider handling this error more gracefully
                }
            } else {
                $errorUploadType = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
                // Consider handling this error more gracefully
            }
        }

        // Execute the SQL query
        $conn->query($sql1) or die($conn->error);

        echo '<script>window.location.href = "qrvusers.php";</script>';
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
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>