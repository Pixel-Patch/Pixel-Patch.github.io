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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">

                            <h3>Add New User</h3>
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6" style="position: relative; padding-bottom:3%">

                                    <form action="insert.php" method="post" enctype="multipart/form-data">
                                        <h5 style="font-weight: bold;">User Info</h5> <br>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-2">
                                                <label class="bold-label" for="type">Type</label>
                                                <select class="form-control" id="type" name="userType">
                                                    <option></option>
                                                    <option value="PSG">PSG</option>
                                                    <option value="OP">OP</option>
                                                    <option value="RESIDENT">RESIDENT</option>
                                                    <option value="PT">PT</option>
                                                    <option value="ST JUDE">ST JUDE</option>
                                                    <option value="LPLP">LPLP</option>
                                                    <option value="VISITOR">VISITOR</option>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label class="bold-label" style="" for="rank">Rank</label>
                                                <input type="text" class="form-control" id="rank" placeholder="Enter Rank" name="rank" required value="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="bold-label" for="bos">Branch of Service</label>
                                                <input type="text" class="form-control" id="bos" placeholder="Enter Branch of Service" name="bos" required value="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="bold-label" for="fullname">Fullname</label>
                                                <input type="text" class="form-control" id="fullname" placeholder="Enter Fullname" name="fullname" required value="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="bold-label" for="dob">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" title="Please enter your date of birth in YYYY-MM-DD format" placeholder="YYYY-MM-DD" name="dob" required value="">
                                            </div>

                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="cellno">Cellphone Number</label>
                                                <input type="text" class="form-control" id="cellno" pattern="\+63[0-9]{10}" title="Enter a valid cellphone number in the format +63X XXXX XXXX" placeholder="Enter remaining digits" name="cellno" required value="">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="bold-label" for="address">Address</label>
                                                <input type="text" class="form-control" id="address" placeholder="Enter Full Address" name="address" required value="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="office">Office</label>
                                                <input type="text" class="form-control" id="office" placeholder="Enter Office" name="office" required value="">
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
                                                </div>
                                            </div>
                                        </div>

                                        <h5 style="font-weight: bold;">Vehicle Info</h5> <br>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="v_model">Model</label>
                                                <input type="text" class="form-control" id="v_model" placeholder="Enter Vehicle Model" name="v_model" required value="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="v_type">Type</label>
                                                <input type="text" class="form-control" id="v_type" placeholder="Enter Vehicle Type" name="v_type" required value="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="v_color">Color</label>
                                                <input type="text" class="form-control" id="v_color" placeholder="Enter Vehicle Color" name="v_color" required value="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="bold-label" for="v_plate">Plate Number</label>
                                                <input type="text" class="form-control" id="v_plate" placeholder="Enter Vehicle Plate Number" name="v_plate" required value="">
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-dark btn-sm" value="Add" name="submit" style="font-weight: bold; font-size: 16px; width: 150px; margin-bottom:-4%">
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