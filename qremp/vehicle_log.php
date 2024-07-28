<?php include('header.php'); ?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css" />
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_miscellaneous.css" />
<link rel="stylesheet" type="text/css" href="../assets/css/forms/theme-checkbox-radio.css" />
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css" />
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME GLOBAL STYLES date range picker-->
<link href="../plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
<link href="../plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
<!-- END THEME GLOBAL STYLES -->


<!--  BEGIN CUSTOM STYLE FILE  date range picker-->
<link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="../plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css" />
<link href="../plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css" />
<link href="../plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../assets/npm/flatpickr.js/dist/flatpickr.min.css">
<!--  END CUSTOM STYLE FILE  -->


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
                            <button class="btn btn-dark btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style=" font-weight: bold; font-size: 16px;">
                                <i class="fa fa-plus"></i> Download CSV
                            </button>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <div class="form-group col-md-4">
                                        <form action="export.php" method="post">
                                            <!-- Add an input field to capture the selected date range or single date -->
                                            <div class="form-group mb-0">
                                                <div class="d-flex">

                                                    <input id="selectedDateRange" class="form-control flatpickr flatpickr-input active mr-2" type="text" placeholder="Select Date Range or Single Date" name="selectedDateRange" required autocomplete="off">
                                                    <input type="submit" name="export_csv" class="btn btn-success" style="width: 200px;" value="Export to CSV">


                                                </div>
                                            </div>


                                            <!-- Add a button to export to CSV -->

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mb-4 mt-4">
                                <?php


                                // Enable error reporting
                                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                                // Prepare and execute SQL query
                                $sql = "SELECT 
                                    vehicle_log.V_USERID,
                                    v_user.BRANCH_OF_SERVICE,
                                    v_user.FULLNAME,
                                    v_user.CELLPHONE_NUMBER,
                                    v_user.VEHICLE_PLATE_NUMBER,
                                    vehicle_log.TIMEIN,
                                    vehicle_log.TIMEOUT
                            
                                    FROM 
                                        vehicle_log
                                    LEFT JOIN 
                                    v_user ON vehicle_log.V_USERID = v_user.V_USERID";
                                $result = $conn->query($sql);

                                // Check for errors
                                if (!$result) {
                                    die("Query failed: " . $conn->error);
                                }
                                ?>

                                <table id="alter_pagination" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">User ID</th>
                                            <th class="text-center">Branch Of Service</th>
                                            <th class="text-center">Fullname</th>
                                            <th class="text-center">Cellphone Number</th>
                                            <th class="text-center">Vehicle Plate Number</th>
                                            <th class="text-center">Time In</th>
                                            <th class="text-center">Time Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Output data in table format
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row['V_USERID']; ?></td>
                                                    <td><?php echo $row['BRANCH_OF_SERVICE']; ?></td>
                                                    <td><?php echo $row['FULLNAME']; ?></td>
                                                    <td><?php echo $row['CELLPHONE_NUMBER']; ?></td>
                                                    <td><?php echo $row['VEHICLE_PLATE_NUMBER']; ?></td>
                                                    <td><?php echo $row['TIMEIN']; ?></td>
                                                    <td><?php echo $row['TIMEOUT']; ?></td>

                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'>No results found.</td></tr>";
                                        }

                                        // Close connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">User ID</th>
                                            <th class="text-center">Branch Of Service</th>
                                            <th class="text-center">Fullname</th>
                                            <th class="text-center">Cellphone Number</th>
                                            <th class="text-center">Vehicle Plate Number</th>
                                            <th class="text-center">Time In</th>
                                            <th class="text-center">Time Out</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php include('footer.php'); ?>
        </div>
        <!--  END CONTENT AREA  -->

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

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="../plugins/table/datatable/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#alter_pagination').DataTable({
                "pagingType": "full_numbers",
                "oLanguage": {
                    "oPaginate": {
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });
        });
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script>
        function Export() {
            var conf = confirm("Please confirm if you wish to proceed in exporting the vehicle_log in to Excel File");
            if (conf == true) {
                window.open("export.php", '_blank');
            }
        }
    </script>
    <script src="../assets/npm/flatpickr.js"></script>

    <script>
        // Initialize Flatpickr for date selection
        flatpickr("#selectedDateRange", {
            mode: "range",
            dateFormat: "Y-m-d",
            allowInput: true // Allow manually typing dates
        });
    </script>



</body>

</html>