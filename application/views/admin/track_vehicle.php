<?php
if (!isset($_SESSION['bmw_email'])) {

	return redirect('index.php/admin');
} else {

	if (isset($get_district_dataa)) {
		extract($get_district_dataa);
	}

	$admin_session = $_SESSION['bmw_email'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>


	<?php include('public/includes/headernav.php') ?>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/sidenav.php') ?>
				</div>
				<div class="col-md-10" style="min-height:120vh;">

					<div class="row adm-cont p-t-40">

						<form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="<?php echo site_url('index.php/vehicleController/track') ?>" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
							<h5>Track Vehicles</h5>

							<div class="row">

								<div class="col-md-6">

									<div class="form-group row">

										<div class="col-md-3"><label for="inputPassword" class="col-sm-2 col-form-label" style="text-align: right;">District:</label></div>
										<div class="col-md-9">

											<select id="district_name" name="district_name" class="form-control">
												<option value="">-Select District-</option>
												<?php foreach ($get_district_data as $row) : ?>
													<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
												<?php endforeach; ?>
											</select>


										</div>
										<div class="text-danger ml-4"> <?php echo form_error('district_name'); ?> </div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group row">
										<div class="col-md-3"><label for="inputPassword" class="col-sm-2 col-form-label" style="text-align: right;">Vehicle:</label></div>
										<div class="col-md-9">
											<select name="vehicle" id="vehicle" class="form-control" required>
												<option value="">-Select Vehicle-</option>
											</select>

										</div>
										<div class="text-danger ml-4"> <?php echo form_error('vehicle'); ?> </div>
									</div>
								</div>
							</div>


							<div class="row  p-t-20" style="float: right;">
								<div class="col text-right">

									<button type="submit" class="btn btn-primary">Track</button>

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


	<script>
		var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
			csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

		$('#district_name').on('change', function() {
			var district = $("#district_name").val();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>index.php/admin/ajax_get_vehicle',
				data: {
					[csrfName]: csrfHash,
					'district_name': district
				},
				success: function(data) {
					response = JSON.parse(data);
					$('#vehicle').html(response);
				}
			});
		});
	</script>



<?php } ?>