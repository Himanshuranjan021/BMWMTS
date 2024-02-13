<?php
if (!isset($_SESSION['bmw_email'])) {
	return redirect('index.php/admin');
} else {
	$admin_session = $_SESSION['bmw_email'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>


	<?php include('public/includes/headernav.php') ?>

	<section>
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-2 pl-0 " style="height:120vh;">
					<?php include('public/includes/sidenav.php') ?>
				</div>
				<div class="col-md-10 pt-4">

					<form class="orgisation-m-frm" action="<?php echo base_url('index.php/admin/print_report') ?>" method="post">
						<h5>Transaction Report</h5>
						<div class="row adm-cont p-t-40">
							<!-- <div class="col-md-6">
								<label for="start"> From</label>
								<input type="date" name="start" id="start" class=" form-control" required>
							</div> -->
							<div class="col-md-6">
								<label for="start"> Date</label>
								<input type="date" name="end" id="end" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
							</div>
							<!-- <div class="col-md-6">
								<label for="start">District</label>
								<select class="form-control" name="district"  id="district">
									<option value="">-Select District-</option>
									<?php

									foreach ($get_district_data as $row) { ?>

										<option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
									<?php }	?>
								</select>
							</div> -->
							<div class="col-md-6">
								<label for="start">HCF</label>
								<select class="form-control" name="hcf"  id="hcf">
									<option value="">-Select HCF-</option>
									<?php
									foreach ($get_organization_data as $row) { ?>

										<option value="<?php echo $row['id'] ?>"><?php echo $row['org_name'] ?></option>
									<?php }	?>
								</select>
							</div>
							<!-- <div class="col-md-6">
								<label for="start">CBWTF</label>
								<select class="form-control" name="cbwtf"  id="cbwtf">
									<option value="">-Select CBWTF-</option>
									<?php

									foreach ($get_treatment_data as $row) { ?>

										<option value="<?php echo $row['id'] ?>"><?php echo $row['Plant_name'] ?></option>
									<?php }	?>
								</select>
							</div> -->
							<!-- <div class="col-md-6">
								<label for="start">Vehicle</label>
								<select class="form-control" name="vehicle"  id="vehicle">
									<option value="">-Select Vehicle-</option>
									<?php

									foreach ($get_vehicle_data as $row) { ?>

										<option value="<?php echo $row['vc_no'] ?>"><?php echo $row['vc_no'] ?></option>
									<?php }	?>
								</select>
							</div> -->
						</div>
						<div>
							<button class="btn btn-primary org-btn rounded" type="submit" id="submit">Get Report</button>
						</div>




						<?php $csrf = array(
							'name' => $this->security->get_csrf_token_name(),
							'hash' => $this->security->get_csrf_hash()
						); ?>
						<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
					</form>
					<div class="row p-t-40">
						<div class="col">
							<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
								<div class="row">
									<div class="col-sm-12 col-md-6">

										<div class="col-sm-12 col-md-6">
											<!-- <div id="myTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="myTable"></label></div> -->
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">

										</div>
									</div>
									<!-- <div class="row">
									<div class="col-sm-12 col-md-5">
										<div class="dataTables_info" id="myTable_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
									</div>
									<div class="col-sm-12 col-md-7">
										<div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate">
											<ul class="pagination">
												<li class="paginate_button page-item previous disabled" id="myTable_previous"><a href="#" aria-controls="myTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
												<li class="paginate_button page-item active"><a href="#" aria-controls="myTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
												<li class="paginate_button page-item next disabled" id="myTable_next"><a href="#" aria-controls="myTable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
											</ul>
										</div>
									</div>
								</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		</div>
	</section>

	<footer class="footer">
		<?php include('public/includes/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->
<?php }
?>