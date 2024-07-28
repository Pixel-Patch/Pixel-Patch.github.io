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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/css/fonts.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
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

    <!--  BEGIN MAIN CONTAINER  -->



    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">


        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">

                            <center><strong>
                                    <h2 style="margin-bottom: 10px;">Register Form for Visitors</h2>
                                </strong></center>
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6" style="position: relative; padding-bottom:3%">

                                    <form action="insertVisitor.php" method="post" enctype="multipart/form-data">
                                        <h5 style="font-weight: bold;">Visitor's Info</h5> <br>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label class="bold-label" for="name">Fullname</label>
                                                <input type="text" class="form-control" id="name" placeholder="Enter Fullname" name="name" required value="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="bold-label" style="" for="sponsor">Sponsor</label>
                                                <input type="text" class="form-control" id="sponsor" placeholder="1LT JUAN CARLOS A. DELA CRUZ JR. PAF" name="sponsor" required value="" placeholder="1LT JUAN CARLOS A. DELA CRUZ JR. PAF">
                                            </div>


                                            <div class="form-group col-md-2">
                                                <label class="bold-label" for="birthdate">Date of Birth</label>
                                                <input type="date" class="form-control" id="birthdate" title="Please enter your date of birth in YYYY-MM-DD format" placeholder="YYYY-MM-DD" name="birthdate" required value="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="bold-label" for="gender">Gender</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-2">
                                                <label class="bold-label" for="cellphoneNumber">Cellphone Number</label>
                                                <input type="text" class="form-control" id="cellphoneNumber" pattern="\+63[0-9]{10}" title="Enter a valid cellphone number in the format +63X XXXX XXXX" placeholder="Enter CellNumber " name="cellphoneNumber" required value="">
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label class="bold-label" for="address">Address</label>
                                                <input type="text" class="form-control" id="address" placeholder="Enter Full Address" name="address" required value="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="email">Email</label>
                                                <input type="text" class="form-control" id="office" placeholder="Enter Email Address" name="email" required value="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="bold-label" for="visitDate">Date of Visit</label>
                                                <input type="date" class="form-control" id="visitDate" title="Please enter your Date of Visit" placeholder="YYYY-MM-DD" name="visitDate" required value="">
                                            </div>


                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label class="bold-label" for="visitReason">Purpose of Visit</label>
                                                <textarea class="form-control" id="visitReason" placeholder="Enter Reason of Visit" name="visitReason" required rows="3" oninput="limitTextarea(this, 255)"></textarea>
                                            </div>

                                            <script>
                                                function limitTextarea(element, limit) {
                                                    if (element.value.length > limit) {
                                                        element.value = element.value.substring(0, limit);
                                                    }
                                                }
                                            </script>

                                            <div class="form-group col-md-6">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label>
                                                        <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a>
                                                        Avatar Image
                                                    </label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="avatarImage" id="avatarImage" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview" style="display: none;"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <div class="custom-file-container" data-upload-id="myDriversLicense">
                                                    <label>
                                                        <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a>
                                                        Driver's License ID
                                                    </label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="driversLicenseImage" id="driversLicenseImage" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview" style="display: none;"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="custom-file-container" data-upload-id="myVehicleImage">
                                                    <label>
                                                        <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a>
                                                        Vehicle Image
                                                    </label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="vehicleImage" id="vehicleImage" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview" style="display: none;"></div>
                                                </div>
                                            </div>

                                        </div>

                                        <h5 style="font-weight: bold;">Vehicle Info</h5> <br>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="vModel">Model</label>
                                                <input type="text" class="form-control" id="vModel" placeholder="Enter Vehicle Model" name="vModel" required value="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="vType">Type</label>
                                                <input type="text" class="form-control" id="vType" placeholder="Enter Vehicle Type" name="vType" required value="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="vColor">Color</label>
                                                <input type="text" class="form-control" id="vColor" placeholder="Enter Vehicle Color" name="vColor" required value="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="vPlateNumber">Plate Number</label>
                                                <input type="text" class="form-control" id="vPlateNumber" placeholder="Enter Vehicle Plate Number" name="vPlateNumber" required value="">
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-dark btn-sm" value="Submit" name="submit" style="font-weight: bold; font-size: 16px; width: 150px; margin-bottom:-4%">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        var secondUpload = new FileUploadWithPreview('myVehicleImage');
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