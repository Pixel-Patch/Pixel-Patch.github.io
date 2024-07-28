<?php include('header.php'); ?>

<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
<!-- END PAGE LEVEL CUSTOM STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/css/forms/theme-checkbox-radio.css">
<link href="../plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/apps/contacts.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<link href="../assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
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
							<div class="table-responsive mb-4 mt-4">
								<table id="html5-extension" class="table table-hover non-hover" style="width:100%">
									<thead>
										<tr>
											<th class="text-center">Username</th>
											<th class="text-center">Name</th>
											<th class="text-center">Type</th>
											<th class="text-center">Email</th>
											<th class="text-center">Cellphone Number</th>
											<th class="text-center">Date Registered</th>
											<th class="text-center">Image</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php


										$sql = "SELECT * FROM `user` ";
										$query = $conn->query($sql);
										while ($row = $query->fetch_assoc()) {
										?>
											<tr>
												<td class="text-center"><?php echo $row['RollNo']; ?></td>
												<td class="text-center"><?php echo $row['Name']; ?></td>
												<td class="text-center"><?php echo $row['Type']; ?></td>
												<td class="text-center"><?php echo $row['EmailId']; ?></td>
												<td class="text-center"><?php echo $row['MobNo']; ?></td>
												<td class="text-center"><?php echo $row['Date_Registered']; ?></td>

												<td class="text-center">
													<div class="d-flex justify-content-center align-items-center">
														<div class="usr-img-frame mr-3  ">
															<img alt="avatar" class="img-fluid rounded-circle" src="../assets/uploads/<?php echo $row['image']; ?>">
														</div>
													</div>
												</td>
												<td class="text-center">
													<div class="btn-group">
														<button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
																<polyline points="6 9 12 15 18 9"></polyline>
															</svg>
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
															<a class="dropdown-item" href="updateuser.php?3cia=<?php echo $row['id']; ?>">Edit</a>
															<a class="dropdown-item delete-trigger" href="#" data-id="<?php echo $row['id']; ?>" data-rollno="<?php echo $row['RollNo']; ?>" data-toggle="modal" data-target="#deleteConfirmationModal">Delete</a>




														</div>
													</div>

													<!-- Delete Confirmation Modal -->
													<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	Are you sure you want to delete <strong id="rollNoToDelete"></strong>?
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
																	<button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
																</div>
															</div>
														</div>
													</div>

												</td>

											</tr>
										<?php
										}
										?>
									</tbody>
									<tfoot>
										<tr>
											<th class="text-center">Username</th>
											<th class="text-center">Name</th>
											<th class="text-center">Type</th>
											<th class="text-center">Email</th>
											<th class="text-center">Cellphone Number</th>
											<th class="text-center">Date Registered</th>
											<th class="text-center">Image</th>
											<th class="text-center">Action</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

				</div>

			</div>
			<?php include('footer.php'); ?>
			<div class="footer-section f-section-1">
				<p class="">
					Copyright © 2024
					<a target="_blank" href="https://github.com/Pixel-Patch/">PixelPatch Inc.</a>, All rights reserved.
				</p>
			</div>
		</div>
		<div class="footer-section f-section-2">
			<p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
					<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
				</svg></p>
		</div>
	</div>
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
	<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
	<script src="../plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
	<script src="../plugins/table/datatable/button-ext/jszip.min.js"></script>
	<script src="../plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
	<script src="../plugins/table/datatable/button-ext/buttons.print.min.js"></script>
	<script>
		$('#html5-extension').DataTable({
			dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
			buttons: {
				buttons: [{
						extend: 'copy',
						className: 'btn'
					},
					{
						extend: 'csv',
						className: 'btn'
					},
					{
						extend: 'excel',
						className: 'btn'
					},
					{
						extend: 'print',
						className: 'btn'
					}
				]
			},
			"oLanguage": {
				"oPaginate": {
					"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
					"sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
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
	</script>

	<script src="../assets/js/custom.js"></script>
	<!-- Bootstrap CSS -->

	<!-- Bootstrap JS and its dependencies -->
	<script src="../bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.delete-trigger').click(function() {
				var rollNo = $(this).data('rollno'); // Retrieve RollNo for display
				var id = $(this).data('id'); // Retrieve ID for the action

				$('#rollNoToDelete').text(rollNo); // Insert the Roll Number into the modal

				// Setup the confirm deletion button click event
				$('#confirmDelete').off('click').on('click', function() {
					// Redirect for deletion with ID
					window.location.href = 'deleteuser.php?id=' + id;
				});
			});
		});
	</script>



	<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

</html>