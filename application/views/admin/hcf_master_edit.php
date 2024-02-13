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
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-md-2">
					<?php include('public/includes/sidenav.php') ?>
				</div>
				<div class="col-md-10" style="min-height:100vh;">

					<div class="row adm-cont p-t-40">

						<form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="<?php echo base_url() ?>index.php/admin/hcf_master_edit/<?php echo $get_hcf_data['id']; ?>" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
							<h5>HCF Type Master</h5>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="name">HCF Type :</label></div>
											<div class="col-md-9"><input type="text" class="form-control" placeholder="Enter HCF Type" name="Type" id="type" value="<?php echo $get_hcf_data['Type'] ?>" required></div>
											<div class="text-danger ml-4"> <?php echo form_error('Type'); ?> </div>
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="name">HCF Code:</label></div>
											<div class="col-md-9"><input type="text" class="form-control" placeholder="Enter HCF Code" name="Type_code" id="Type_code" value="<?php echo $get_hcf_data['Type_code'] ?>"  required></div>
											<div class="text-danger ml-4"> <?php echo form_error('Type_code'); ?> </div>
										</div>
									</div>
								</div>

							</div>


							<div class="row  p-t-20" style="float: right;">
								<div class="col text-right">
									<a href="<?php echo base_url() ?>index.php/admin/hcf_master">
										<input type="button" value="Cancel" class="btn btn-warning" />
									</a>
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</div>

							<?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							); ?>
							<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

						</form>
					</div>


				</div>
			</div>
		</div>
	</section>

	<footer class="footer">
		<?php include('public/includes/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->

<?php } ?>