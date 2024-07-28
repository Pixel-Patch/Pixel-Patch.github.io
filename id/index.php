<?php include('../qr/header.php'); ?>

<!-- BEGIN PAGE LEVEL CUSTOM STYLES vehicle-->
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">

<link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="../plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
<link href="" rel="stylesheet" type="text/css">
<link href="../assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->


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
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>

    <?php include('../qr/navbar.php'); ?>
    <!--  BEGIN MAIN CONTAINER  -->



    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <?php include('../qr/topbar.php'); ?>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="page-header"></div>

                <div class="row layout-top-spacing">

                    <div class="col-12" style="margin-bottom:24px;">
                        <div class="widget-content widget-content-area br-6">

                            <div class="table-responsive mb-4 mt-4" style="margin-top: -0.3rem!important;">
                                <!-- <h4>Generate QR</h4> -->

                                <table id="alter_pagination" class="table table-hover" style="width:100%;">
                                    <!-- form user info -->
                                    <div class="card card-outline-secondary">
                                        <div class="card-header">
                                            <h3 class="mb-0">Card Generator</h3>
                                        </div>
                                        <?php
                                        require_once __DIR__ . '/vendor/autoload.php';
                                        require_once('phpqrcode/qrlib.php'); // Include the QR library
                                        use setasign\Fpdi\Fpdi;

                                        // Include the font files
                                        require_once('vendor/setasign/fpdf/font/calibri-regular.php');
                                        require_once('vendor/setasign/fpdf/font/arial-black.php');

                                        $pdfForPreview = '';

                                        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['v_userid'])) {
                                            $v_userid = $_POST['v_userid'];


                                            $sql = "SELECT * FROM `v_user` WHERE `V_USERID` = ?";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("s", $v_userid);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            if ($row = $result->fetch_assoc()) {
                                                $userType = $row['userType'];
                                                $fullName = $row['Fullname'];

                                                // Select the template based on user type
                                                $templatePath = __DIR__ . '/templates/';
                                                switch ($userType) {
                                                    case "PSG":
                                                    case "OP":
                                                        $templatePath .= 'templatered.pdf';
                                                        break;
                                                    case "RESIDENT":
                                                        $templatePath .= 'templategreen.pdf';
                                                        break;
                                                    case "PT":
                                                        $templatePath .= 'templateblue.pdf';
                                                        break;
                                                    case "ST JUDE":
                                                    case "LPLP":
                                                        $templatePath .= 'templateyellow.pdf';
                                                        break;
                                                    case "VISITOR":
                                                        $templatePath .= 'templategrey.pdf';
                                                        break;
                                                    default:
                                                        $templatePath .= 'template.pdf'; // Default template
                                                        break;
                                                }

                                                $pdf = new Fpdi();
                                                $pageCount = $pdf->setSourceFile($templatePath);
                                                $tplIdx = $pdf->importPage(1);
                                                $pdf->addPage('L');
                                                $pdf->useTemplate($tplIdx, 0, 0, 297, 210);

                                                // Register the fonts
                                                $pdf->AddFont('Calibri', '', 'calibri-regular.php');
                                                $pdf->AddFont('ArialBlack', '', 'arial-black.php');

                                                // Set fonts and add text
                                                $pdf->SetFont('Calibri', '', 11);
                                                $pdf->SetTextColor(0, 0, 0);
                                                $pdf->SetXY(86, 133.3);
                                                $pdf->Write(0, $row['Fullname']);
                                                $pdf->SetXY(87, 138);
                                                $pdf->Write(0, $row['Vehicle_Model'] . " / " . $row['Vehicle_Type'] . " / " . $row['Vehicle_Color']);
                                                $pdf->SetXY(89, 143);
                                                $pdf->Write(0, $row['Address']);
                                                $pdf->SetXY(85, 147.6);
                                                $pdf->Write(0, $row['Office']);
                                                $pdf->SetXY(83, 152.3);
                                                $pdf->Write(0, $row['Cellphone_Number']);

                                                $pdf->SetFont('ArialBlack', '', 18);
                                                $pdf->SetXY(113, 67.5);
                                                $pdf->Write(0, $row['V_USERID']);

                                                $pdf->SetXY(31, 67.5);
                                                $dateRegistered = new DateTime($row['Date_Registered']);
                                                $dateRegistered->add(new DateInterval('P1Y'));
                                                $newDate = $dateRegistered->format('Y');
                                                $pdf->Write(0, $newDate);

                                                $pdf->SetXY(31, 87);
                                                $pdf->SetFont('ArialBlack', '', 13);
                                                $newDate = $dateRegistered->format('M d');
                                                $pdf->Write(0, $newDate);

                                                $pdf->SetFont('ArialBlack', '', 52);
                                                $plate_number = $row['Vehicle_Plate_Number'];
                                                $center_x = (130 + 30) / 2 - ($pdf->GetStringWidth($plate_number) / 2);
                                                $pdf->SetXY($center_x, 104);
                                                $pdf->Write(0, $plate_number);

                                                $font_size = ($userType == 'RESIDENT' || $userType == 'ST JUDE' || $userType == 'VISITOR') ? 50 : 62;
                                                $pdf->SetFont('ArialBlack', '', $font_size);
                                                $center_x = (130 + 30) / 2 - ($pdf->GetStringWidth($userType) / 2);
                                                $pdf->SetXY($center_x, 43);
                                                $pdf->Write(0, $userType);

                                                // Add image from database
                                                $imagePath = '../assets/avataruploads/' . $row['image'];
                                                if (file_exists($imagePath)) {
                                                    $pdf->Image($imagePath, 32.3, 123, 38); // Example coordinates and size
                                                }

                                                // Generate QR code
                                                $PNG_TEMP_DIR = 'temp/';
                                                if (!file_exists($PNG_TEMP_DIR)) mkdir($PNG_TEMP_DIR);
                                                $qrFilename = $PNG_TEMP_DIR .  $v_userid . ' - ' . $userType . ' - ' . $fullName . '.png';
                                                QRcode::png($v_userid, $qrFilename, QR_ECLEVEL_L, 20, 1);
                                                $pdf->Image($qrFilename, 113.5, 70, 18, 18, 'PNG'); // Adjust the coordinates and dimensions as needed

                                                // Define the output path with dynamic variables
                                                $outputPath = 'output/' . $v_userid . ' - ' . $userType . ' - ' . $fullName . '.pdf';
                                                $pdf->Output('F', $outputPath);
                                                $pdfForPreview = $outputPath;
                                            }
                                        }
                                        ?>
                                        <div class="card-body" style="display: flex; align-items: center; justify-content: center;">
                                            <form autocomplete="off" class="form" role="form" action="index.php" method="post" style="width: fit-content;">
                                                <div class="form-group row" style="width: 100%; max-width: 600px;">
                                                    <label class="col-lg-3 col-form-label form-control-label">Enter User's ID</label>
                                                    <div class="col-lg-6" style="padding-bottom: 15px;">
                                                        <!-- Replace the input field with a select dropdown -->
                                                        <select class="form-control pb-2 js-example-basic-single" name="v_userid" required>
                                                            <!-- Options will be dynamically generated by PHP -->
                                                            <?php
                                                            // Query the v_user table to fetch user data
                                                            $query = "SELECT * FROM v_user";
                                                            $result = mysqli_query($conn, $query);

                                                            // Set the selected value to the value of the selected option
                                                            if (isset($_POST['btnsubmit'])) {
                                                                $selectedValue = $_POST['v_userid'];
                                                            }

                                                            // Generate options for V_USERID dropdown
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $selected = ($row['V_USERID'] == $selectedValue) ? 'selected' : '';
                                                                    echo '<option value="' . $row['V_USERID'] . '"' . $selected . '>' . $row['V_USERID'] . '</option>';
                                                                }
                                                            } else {
                                                                echo '<option value="">No users found</option>';
                                                            }

                                                            // Close the database connection
                                                            mysqli_close($conn);
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 text-right" style="margin-left: auto;">
                                                        <input class="btn btn-primary" style="width:141px;" type="submit" name="btnsubmit" value="Generate Card">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php if (!empty($pdfForPreview)) : ?>
                                            <iframe src="<?php echo htmlspecialchars($pdfForPreview); ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                                        <?php endif; ?>
                                    </div>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include('../qr/footer.php'); ?>
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
    <script src="../plugins/select2/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: 'Select a user ID',
                allowClear: true
            });
        });
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->


</body>

</html>