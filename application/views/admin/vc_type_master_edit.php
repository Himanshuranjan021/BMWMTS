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
				<div class="col-md-10" style="height:120vh;">

					<div class="row adm-cont p-t-40">

						<form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="<?php echo base_url()?>index.php/admin/vc_type_master_edit/<?php echo $get_vc_data['id'] ;?>" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
							<h5>Vehicle Type Master</h5>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="vc_type_name">Vehicle Type:</label></div>
											<div class="col-md-9"><input type="text" class="form-control" placeholder="Enter Vehicle Type" name="vc_type_name" id="vc_type_name"   value="<?php echo $get_vc_data['vc_type_name']  ?>" required></div>
											<div class="text-danger ml-4"> <?php echo form_error('vc_type_name');?> </div>
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="vc_type_desc">Description</label></div>
											<div class="col-md-9"><input type="text" class="form-control" placeholder="Enter Description" name="vc_type_desc" id="vc_type_desc" value="<?php echo $get_vc_data['vc_type_desc']  ?>" required></div>
											<div class="text-danger ml-4"> <?php echo form_error('vc_type_desc');?> </div>
										</div>
									</div>
								</div>

							</div>


							<div class="row  p-t-20" style="float: right;">
								<div class="col text-right">
								<a href="<?php echo base_url()?>index.php/admin/vc_type_master"> 
                    <input type="button" value="Cancel" class="btn btn-warning" />
                    </a>
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</div>

								   
							<?php    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash());?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

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