 


<?php include('header.php'); ?>

<!-- BEGIN PAGE LEVEL CUSTOM STYLES vehicle-->
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
<script type="text/javascript" src="js/instascan.min.js"></script>
<link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="../assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->


<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/css/forms/theme-checkbox-radio.css">
<link href="../plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/apps/contacts.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<link href="../assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
<style>
    #divvideo {
        box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
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
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4">

                        <div style="padding:10px;background:#fff;border-radius: 5px;" id="divvideo">
                            <center>
                                <p class="login-box-msg"> <i class="glyphicon glyphicon-camera"></i> TAP HERE</p>
                            </center>
                            <video id="preview" width="100%" height="50%" style="border-radius:10px;"></video>
                            <br>
                            <br>


                        </div>

                        <!-- Error Modal -->
                        <div id="errorModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="alert alert-primary mb-4" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                        <strong><?php if (isset($_SESSION['error'])) echo $_SESSION['error']; ?></strong></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Success Modal -->
                        <div id="successModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="user-profile">
                                        <div class="widget-content widget-content-area">

                                            <div class="alert alert-primary mb-4" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                                <strong><?php if (isset($_SESSION['success'])) echo $_SESSION['success']; ?></strong></button>
                                            </div>
                                            <div class="text-left">

                                            </div>
                                            <div class="text-center user-info" style="margin-top: 3%;">
                                                <img src="../assets/avataruploads/<?php echo $_SESSION['image']; ?>" alt="avatar" style="width: 90px; height: 90px;">
                                                <p class=""><?php echo $_SESSION['Rank'] . ' ' . $_SESSION['Fullname']; ?></p>
                                            </div>
                                            <div class="user-info-list">
                                                <div class="" style="text-align: center;">
                                                    <ul class="contacts-block list-unstyled" style="display: inline-block; text-align: left; margin-bottom: 3%;margin-top: 3%;">
                                                        <li class="contacts-block__item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="9" cy="7" r="4"></circle>
                                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                            </svg><?php echo $_SESSION['Gender']; ?>
                                                        </li>
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                                            </svg><?php echo $_SESSION['Date_of_Birth']; ?>
                                                        </li>
                                                        <li class="contacts-block__item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                                                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                                            </svg><?php echo $_SESSION['Office']; ?>
                                                        </li>
                                                        <li class="contacts-block__item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
                                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                                <line x1="12" y1="18" x2="12" y2="12"></line>
                                                                <line x1="9" y1="15" x2="15" y2="15"></line>
                                                            </svg><?php echo $_SESSION['Date_Registered']; ?>
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li class="list-inline-item">
                                                            <button type="button" class="btn btn-outline-dark mb-2" style="font-weight: bold; font-size: 16px;">
                                                                <?php echo $_SESSION['Vehicle_Model']; ?>
                                                        </li>

                                                        <li class="list-inline-item">
                                                            <button type="button" class="btn btn-outline-dark mb-2" style="font-weight: bold; font-size: 16px;">
                                                                <?php echo $_SESSION['Vehicle_Type']; ?>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <button type="button" class="btn btn-outline-dark mb-2" style="font-weight: bold; font-size: 16px;">
                                                                <?php echo $_SESSION['Vehicle_Plate_Number']; ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="CheckInOut.php" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                            <i class="glyphicon glyphicon-qrcode"></i> <label>Manual Time &Time Out</label>
                            <p id="time"></p>
                            <input type="text" name="v_userID" id="text" placeholder="Enter User ID" class="form-control" autofocus>
                        </form>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                        <div class="widget-content widget-content-area br-6">

                            <div class="table-responsive mb-4 mt-4" style="margin-top: -0.3rem!important;">
                                <h4>Real-Time Vehicle Log</h4>

                                <table id="alter_pagination" class="table table-hover" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">User ID</th>
                                            <th class="text-center">Time In</th>
                                            <th class="text-center">Time Out</th>
                                            <th class="text-center">Plate Number</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php


                                        // Fetching data from the database joining records from the vehicle_log table with corresponding user details from the v_user table
                                        $sql = "SELECT * FROM vehicle_log LEFT JOIN v_user ON vehicle_log.V_USERID=v_user.V_USERID";
                                        $query = $conn->query($sql);

                                        // Executing the query
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['Fullname']; ?></td>
                                                <td class="text-center"><?php echo $row['V_USERID']; ?></td>
                                                <td class="text-center" aria-sort="descending !important;"><?php echo $row['TIMEIN']; ?></td>
                                                <td class="text-center"><?php echo $row['TIMEOUT']; ?></td>
                                                <td class="text-center"><?php echo $row['Vehicle_Plate_Number']; ?></td>
                                            </tr>

                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">User ID</th>
                                            <th class="text-center">Time In</th>
                                            <th class="text-center">Time Out</th>
                                            <th class="text-center">Plate Number</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
                "pageLength": 7,
                "order": [
                    [2, "desc"]
                ] // Setting the default sorting for the third column (index 2) to descending
            });
        });
    </script>

    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->


    <!-- CAM CUSTOM SCRIPTS -->
    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found');
            }

        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('text').value = c;
            document.forms[0].submit();
        });
    </script>
    <script type="text/javascript">
        date_default_timezone_set('Asia/Manila');
        var timestamp = '<?= time(); ?>';

        function updateTime() {
            $('#time').html(Date(timestamp));
            timestamp++;
        }
        $(function() {
            setInterval(updateTime, 1000);
        });
    </script>


    <script>
        $(document).ready(function() {
            <?php if (isset($_SESSION['error'])) { ?>
                $('#errorModal').modal('show');
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                $('#successModal').modal('show');
            <?php } ?>
        });
    </script>








</body>


</html>