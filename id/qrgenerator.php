<?php
include('header.php');
include('navbar.php');
include('topbar.php');
?>

<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
<link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="../assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css">
<link href="../plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<style>
    .qr-code {
        image-rendering: pixelated;
        width: 300px;
        height: 300px;
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

<!-- Main Container -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!-- Content Part -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header"></div>
            <div class="row layout-top-spacing">
                <div class="col-12" style="margin-bottom:24px;">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="alter_pagination" class="table table-hover" style="width:100%;">
                                <!-- QR Code Generator Form -->
                                <div class="card card-outline-secondary">
                                    <div class="card-header">
                                        <h3 class="mb-0">QR Code Generator</h3>
                                    </div>
                                    <div class="card-body" style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
                                        <form autocomplete="off" class="form" role="form" action="qrgenerator.php" method="post" style="width: fit-content;">
                                            <div class="form-group row" style="width: 100%; max-width: 600px;">
                                                <label class="col-lg-3 col-form-label form-control-label">Enter User's ID</label>
                                                <div class="col-lg-6" style="padding-bottom: 15px;">
                                                    <select class="form-control pb-2 js-example-basic-single" name="v_userid" required>
                                                        <?php
                                                        $query = "SELECT * FROM v_user";
                                                        $result = mysqli_query($conn, $query);
                                                        $selectedValue = '';
                                                        if (isset($_POST['btnsubmit'])) {
                                                            $selectedValue = $_POST['v_userid'];
                                                        }
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $selected = ($row['V_USERID'] == $selectedValue) ? 'selected' : '';
                                                                echo '<option value="' . $row['V_USERID'] . '"' . $selected . '>' . $row['V_USERID'] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option value="">No users found</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 text-right" style="margin-left: auto;">
                                                    <input class="btn btn-primary" style="width:168px;" type="submit" name="btnsubmit" value="Generate QR Code">
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        include "phpqrcode/qrlib.php";

                                        $PNG_TEMP_DIR = '../id/temp/';
                                        if (!file_exists($PNG_TEMP_DIR)) mkdir($PNG_TEMP_DIR);

                                        if (isset($_POST["btnsubmit"])) {
                                            $v_userid = $_POST["v_userid"];
                                            $query = "SELECT userType, Fullname FROM v_user WHERE V_USERID = '$v_userid'";
                                            $result = mysqli_query($conn, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                $row = mysqli_fetch_assoc($result);
                                                $userType = $row['userType'];
                                                $fullName = $row['Fullname'];
                                                $filename = $PNG_TEMP_DIR . $v_userid . ' - ' . $userType . ' - ' . $fullName . '.png';
                                                $codeString = $v_userid . "\n";
                                                QRcode::png($codeString, $filename, QR_ECLEVEL_L, 20);
                                                echo '<img class="qr-code" src="' . $filename . '" alt="QR Code" />';
                                                echo '<button id="downloadBtn" class="btn btn-primary mt-3">Download QR Code</button>';
                                            } else {
                                                echo 'User details not found.';
                                            }
                                            mysqli_close($conn);
                                        }
                                        ?>

                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include('footer.php'); ?>
        </div>
    </div>
</div>

<!-- Global Mandatory Scripts -->
<script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/app.js"></script>
<script src="../plugins/select2/select2.min.js"></script>
<script>
    $(document).ready(function() {
        App.init();
        $('.js-example-basic-single').select2(); // Initialize Select2
        
        // Hide the loader after the page is fully loaded
        $('#load_screen').fadeOut();

        // Add event listener for the download button
        document.getElementById('downloadBtn').addEventListener('click', function() {
            var link = document.createElement('a');
            link.href = '<?php echo $PNG_TEMP_DIR . basename($filename); ?>';
            link.download = '<?php echo basename($filename); ?>';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    });
</script>
<script src="../assets/js/custom.js"></script>
<!-- End Global Mandatory Scripts -->
</body>
</html>
