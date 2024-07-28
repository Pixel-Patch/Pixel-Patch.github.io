<?php include('header.php'); ?>

<?php
// Initialize variables for counting vehicles
$totalRows = 0; // Total number of rows
$inCount = 0;   // Number of vehicles in
$outCount = 0;  // Number of vehicles out

// Query to count total number of rows
$totalQuery = "SELECT COUNT(*) AS total FROM vehicle_log";
$totalResult = $conn->query($totalQuery);
if ($totalResult->num_rows > 0) {
	$row = $totalResult->fetch_assoc();
	$totalRows = $row["total"];
}

// Query to count number of vehicles in
$inQuery = "SELECT COUNT(*) AS inCount FROM vehicle_log WHERE STATUS = '0'";
$inResult = $conn->query($inQuery);
if ($inResult->num_rows > 0) {
	$row = $inResult->fetch_assoc();
	$inCount = $row["inCount"];
}

// Query to count number of vehicles out
$outQuery = "SELECT COUNT(*) AS outCount FROM vehicle_log WHERE STATUS = '1'";
$outResult = $conn->query($outQuery);
if ($outResult->num_rows > 0) {
	$row = $outResult->fetch_assoc();
	$outCount = $row["outCount"];
}

// Calculate percentages
$inPercentage = ($totalRows > 0) ? ($inCount / $totalRows) * 100 : 0;
$outPercentage = ($totalRows > 0) ? ($outCount / $totalRows) * 100 : 0;

// Query for daily analytics (last 24 hours)
$dailyQuery = "SELECT COUNT(*) AS dailyCount FROM vehicle_log WHERE LOGDATE >= DATE_SUB(NOW(), INTERVAL 1 DAY)";
$dailyResult = $conn->query($dailyQuery);
$row = $dailyResult->fetch_assoc();
$dailyCount = $row["dailyCount"];

// Query for weekly analytics (last 7 days)
$weeklyQuery = "SELECT COUNT(*) AS weeklyCount FROM vehicle_log WHERE LOGDATE >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
$weeklyResult = $conn->query($weeklyQuery);
$row = $weeklyResult->fetch_assoc();
$weeklyCount = $row["weeklyCount"];

// Query for monthly analytics (last 30 days)
$monthlyQuery = "SELECT COUNT(*) AS monthlyCount FROM vehicle_log WHERE LOGDATE >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
$monthlyResult = $conn->query($monthlyQuery);
$row = $monthlyResult->fetch_assoc();
$monthlyCount = $row["monthlyCount"];
?>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>

<body class="alt-menu sidebar-noneoverflow">
	
	<!-- BEGIN LOADER -->
	<div id="load_screen">
		<div class="loader">
			<div class="loader-content">
				<div class="spinner-grow align-self-center"></div>
			</div>
		</div>
	</div>
	<!--  END LOADER -->

	<?php include('navbar.php'); ?>
	<!--  BEGIN MAIN CONTAINER  -->



	<!--  BEGIN MAIN CONTAINER  -->
	<div class="main-container" id="container">

		<div class="overlay"></div>
		<div class="search-overlay"></div>

		<!--  BEGIN TOPBAR  -->
		<?php include('topbar.php'); ?>
		<!--  END TOPBAR  -->


		<!--  BEGIN MAIN CONTAINER  -->
		<div class="main-container" id="container">
			<div class="overlay"></div>
			<div class="search-overlay"></div>

			<!--  BEGIN CONTENT PART  -->
			<div id="content" class="main-content">
				<div class="layout-px-spacing">
					<div class="page-header">
						<div class="page-title">
							<h3>Analytics Dashboard</h3>
						</div> 
					</div>

					<div class="row layout-top-spacing">
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
							<div class="widget-four">
								<div class="widget-heading">
									<h5 class="">Visitors by Browser</h5>
								</div>
								<div class="widget-content">
									<div class="vistorsBrowser">
										<div class="browser-list">
											<div class="w-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome">
													<circle cx="12" cy="12" r="10"></circle>
													<circle cx="12" cy="12" r="4"></circle>
													<line x1="21.17" y1="8" x2="12" y2="8"></line>
													<line x1="3.95" y1="6.06" x2="8.54" y2="14"></line>
													<line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>
												</svg>
											</div>
											<div class="w-browser-details">
												<div class="w-browser-info">
													<h6>IN</h6>
													<p class="browser-count"><?php echo round($inPercentage, 2); ?>%</p>
												</div>
												<div class="w-browser-stats">
													<div class="progress">
														<div class="progress-bar bg-gradient-primary" role="progressbar" style="width: <?php echo $inPercentage; ?>%" aria-valuenow="<?php echo $inCount; ?>" aria-valuemin="<?php echo $totalRows; ?>" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
										</div>

										<div class="browser-list">
											<div class="w-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass">
													<circle cx="12" cy="12" r="10"></circle>
													<polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
												</svg>
											</div>
											<div class="w-browser-details">
												<div class="w-browser-info">
													<h6>OUT</h6>
													<p class="browser-count"><?php echo round($outPercentage, 2); ?>%</p>
												</div>

												<div class="w-browser-stats">
													<div class="progress">
														<div class="progress-bar bg-gradient-danger" role="progressbar" style="width: <?php echo $outPercentage; ?>%" aria-valuenow="<?php echo $outCount; ?>" aria-valuemin="0" aria-valuemax="<?php echo $totalRows; ?>"></div>
													</div>
												</div>
											</div>
										</div>


									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing"> 
						<?php
// Database connection 


// Initialize arrays for in and out data
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$inData = [];
$outData = [];

foreach ($months as $index => $month) {
    $monthNumber = $index + 1; // Properly assign month number to a variable
    $inQuery = "SELECT COUNT(*) AS count FROM vehicle_log WHERE MONTH(TIMEIN) = ? AND YEAR(TIMEIN) = YEAR(CURRENT_DATE())";
    $outQuery = "SELECT COUNT(*) AS count FROM vehicle_log WHERE MONTH(TIMEOUT) = ? AND YEAR(TIMEOUT) = YEAR(CURRENT_DATE())";

    // Prepare and execute the IN query
    $stmt = $conn->prepare($inQuery);
    $stmt->bind_param("i", $monthNumber); // Bind the month number variable
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $inData[] = $row['count'];

    // Prepare and execute the OUT query
    $stmt = $conn->prepare($outQuery);
    $stmt->bind_param("i", $monthNumber); // Bind the month number variable
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $outData[] = $row['count'];
}

$conn->close();
?>
							<div class="widget widget-chart-three">
								<div class="widget-heading">
									<div class="">
										<h5 class="">Unique Visitors</h5>
									</div>

									<div class="dropdown custom-dropdown">
										<a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
												<circle cx="12" cy="12" r="1"></circle>
												<circle cx="19" cy="12" r="1"></circle>
												<circle cx="5" cy="12" r="1"></circle>
											</svg>
										</a>
									</div>
								</div>

								<div class="widget-content">
									<div id="uniqueVisits"></div>
								</div>
							</div>

						</div>




					</div>

					<div class="footer-wrapper">
						<div class="footer-section f-section-1">
							<p class="">
								Copyright © 2024
								<a target="_blank" href="https://github.com/Pixel-Patch/">PixelPatch Inc.</a>, All rights reserved.
							</p>
						</div>
						<div class="footer-section f-section-2">
							<p class="">
								Coded with
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
									<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
								</svg>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!--  END CONTENT PART  -->
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

		<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
		<script src="../plugins/apex/apexcharts.min.js"></script> 
		<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
		<script>
	 


   
/*
	===================================
		Unique Visitors | Options
	===================================
*/


var d_1options1 = {
  chart: {
	  height: 350,
	  type: 'bar',
	  toolbar: {
		show: false,
	  },
	  dropShadow: {
		  enabled: true,
		  top: 1,
		  left: 1,
		  blur: 2,
		  color: '#acb0c3',
		  opacity: 0.7,
	  }
  },
  colors: ['#5c1ac3', '#ffbb44'],
  plotOptions: {
	  bar: {
		  horizontal: false,
		  columnWidth: '55%',
		  endingShape: 'rounded'  
	  },
  },
  dataLabels: {
	  enabled: false
  },
  legend: {
		position: 'bottom',
		horizontalAlign: 'center',
		fontSize: '14px',
		markers: {
		  width: 10,
		  height: 10,
		},
		itemMargin: {
		  horizontal: 0,
		  vertical: 8
		}
  },
  stroke: {
	  show: true,
	  width: 2,
	  colors: ['transparent']
  },
  series: [{
    name: 'In',
    data: [<?php echo implode(", ", $inData); ?>]
  }, {
    name: 'Out',
    data: [<?php echo implode(", ", $outData); ?>]
  }],
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  },
  fill: {
	type: 'gradient',
	gradient: {
	  shade: 'light',
	  type: 'vertical',
	  shadeIntensity: 0.3,
	  inverseColors: false,
	  opacityFrom: 1,
	  opacityTo: 0.8,
	  stops: [0, 100]
	}
  },
  tooltip: {
	  y: {
		  formatter: function (val) {
			  return val
		  }
	  }
  }
}



/*
	===================================
		Unique Visitors | Script
	===================================
*/

var d_1C_3 = new ApexCharts(
	document.querySelector("#uniqueVisits"),
	d_1options1
);
d_1C_3.render();

		</script>
</body>

</html>