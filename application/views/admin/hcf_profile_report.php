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
				<div class="col-md-5 pt-4">

					<form class="orgisation-m-frm" action="<?php echo base_url('index.php/admin/hcf_profile') ?>" method="post">
						<h5>HCF Profile Data</h5>
						<div class="row adm-cont p-t-40">

							<div class="col-md-10">
								<label for="start">HCF</label>
								<select class="form-control" name="hcf" id="hcf">
									<option value="">-Select HCF-</option>
									<?php

									foreach ($get_organization_data as $row) { ?>

										<option value="<?php echo $row['id'] ?>"><?php echo $row['org_name'] ?></option>
									<?php }	?>
								</select>
							</div>


						</div>

						<div>
							<button class="btn btn-primary org-btn rounded" type="submit" id="submit">View Profile</button>
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

										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">

										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-5 pt-4">

					<form class="orgisation-m-frm" action="<?php echo base_url('index.php/admin/hcf_profile_excel') ?>" method="post">
						<h5>District Wise Report</h5>
						<div class="row adm-cont p-t-40">


							<div class="col-md-10">
								<label for="start">District</label>
								<select class="form-control" name="district" id="district">
									<option value="">-Select District-</option>
									<?php

									foreach ($get_district_data as $row) { ?>

										<option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
									<?php }	?>
								</select>
							</div>


						</div>
						<div>
							<button class="btn btn-primary org-btn rounded" type="submit" id="submit">Get Excel Report</button>
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

										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">

										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- second form -->

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