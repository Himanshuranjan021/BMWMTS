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

						<form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="<?php echo base_url()?>index.php/admin/org_cat_edit/<?php echo $get_org_cat_data['id'] ;?>" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
							<h5>Organization Category Master</h5>

							<div class="row">
								<div class="col-md-6">

									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="Statename">Category Name:</label></div>
											<div class="col-md-9">
												<input type="text" class="form-control" name="name" id="cat_name" placeholder="Enter Category Name" value="<?php echo  $get_org_cat_data['name'] ?>" required>
											</div>
											<div class="text-danger ml-4"> <?php echo form_error('name');?> </div>
										</div>
									</div>



								</div>

								<div class="col-md-6">

									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="Category Name">Note:</label></div>
											<div class="col-md-9"><textarea type="textarea" class="form-control" placeholder="Put Your Notes Here...." id="note" name="note"> <?php echo  $get_org_cat_data['note'] ?></textarea></div>
										</div>
										<div class="text-danger ml-4"> <?php echo form_error('note');?> </div>
									</div>
								</div>
							</div>


							<div class="row  p-t-20" style="float: right;">
								<div class="col text-right">
								<a href="<?php echo base_url()?>index.php/admin/organisation"> 
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