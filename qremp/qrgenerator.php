<?php include('header.php'); ?>

<!-- BEGIN PAGE LEVEL CUSTOM STYLES vehicle-->
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">

<link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="../assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<style>
    .centered-div {
        width: 80%;
        /* Adjust width as needed */
        margin: 0 auto;
        /* Center horizontally */
        margin-left: 25%;
        /* Additional styling */
        padding: 20px;
        background-color: #f0f0f0;
        text-align: center;
        /* Optional: To center text inside the div */
    }
</style>
<style>
    img {
        image-rendering: pixelated;
        /* Prevent blurriness when scaling up */
        width: 300px;
        height: 300px;
    }
</style>


</head>

<body class="sidebar-noneoverflow">
    <!-- BEGIN LOADER 
	//<div id="load_screen"> <div class="loader"> <div class="loader-content">
    <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    END LOADER -->

    <?php include('navbar.php'); ?>
    <!--  BEGIN MAIN CONTAINER  -->



    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <?php include('topbar.php'); ?>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="page-header"></div>

                <div class="row layout-top-spacing">
                    <div class="centered-div">
                        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                            <div class="widget-content widget-content-area br-6">

                                <div class="table-responsive mb-4 mt-4" style="margin-top: -0.3rem!important;">
                                    <!-- <h4>Generate QR</h4> -->

                                    <table id="alter_pagination" class="table table-hover" style="width:100%;">
                                        <!-- form user info -->
                                        <div class="card card-outline-secondary">
                                            <div class="card-header">
                                                <h3 class="mb-0">QR Code Generator</h3>
                                            </div>
                                            <?php
                                            $first_name = "";

                                            if (isset($_POST["btnsubmit"])) {
                                                $first_name = $_POST["first_name"];


                                                /*echo "<pre>";
                                    var_dump($_POST);
                                    echo "</pre>";*/
                                            }
                                            ?>
                                            <div class="card-body">
                                                <form autocomplete="off" class="form" role="form" action="qrgenerator.php" method="post">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">User's ID</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="text" value="<?php echo $first_name; ?>" name="first_name" placeholder="enter User's id">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                                        <div class="col-lg-9">
                                                            <input class="btn btn-primary" type="submit" name="btnsubmit" value="Generate QR Code">
                                                            <!-- Add a download button -->
                                                            <?php if (isset($_POST["btnsubmit"])) : ?>
                                                                <button id="downloadBtn" class="btn btn-primary">Download QR Code</button>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </form>

                                                <?php
                                                include "phpqrcode/qrlib.php";

                                                $PNG_TEMP_DIR = 'temp/';

                                                if (!file_exists($PNG_TEMP_DIR))
                                                    mkdir($PNG_TEMP_DIR);

                                                $filename = $PNG_TEMP_DIR . 'test.png';

                                                if (isset($_POST["btnsubmit"])) {
                                                    $codeString = $_POST["first_name"] . "\n";

                                                    $filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';

                                                    // Generate the QR code with a larger size (e.g., 10)
                                                    QRcode::png($codeString, $filename, QR_ECLEVEL_L, 20); // Adjust the size parameter for larger QR code

                                                    echo '<img class="qr-code" src="' . $PNG_TEMP_DIR . basename($filename) . '" alt="QR Code" />';
                                                }
                                                ?>


                                            </div>
                                            <script>
                                                // JavaScript script for handling download
                                                document.getElementById('downloadBtn').addEventListener('click', function() {
                                                    var link = document.createElement('a');
                                                    link.href = '<?php echo $PNG_TEMP_DIR . basename($filename); ?>';
                                                    link.download = 'generated_qr_code.png';
                                                    document.body.appendChild(link);
                                                    link.click();
                                                    document.body.removeChild(link);
                                                });
                                            </script>

                                        </div><!-- /form user info -->

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <?php include('footer.php'); ?>
            </div>
            <!--  END CONTENT PART  -->
        </div>
        <!-- END CONTENT PART -->

    </div>
    <!-- END MAIN CONTAINER -->




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