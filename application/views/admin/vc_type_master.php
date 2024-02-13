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

						<form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="vc_type_master" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
							<h5>Vehicle Type Master</h5>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><label for="vc_type_name">Vehicle Type:</label></div>
											<div class="col-md-8"><input type="text" class="form-control" placeholder="Enter Vehicle Type" name="vc_type_name" id="vc_type_name"  required></div>
											<div class="text-danger ml-4"> <?php echo form_error('vc_type_name');?> </div>
										</div>
									</div>
								</div>

							
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><label for="vc_type_desc">Description</label></div>
											<div class="col-md-8"><input type="text" class="form-control" placeholder="Enter Description" name="vc_type_desc" id="vc_type_desc" required></div>
											<div class="text-danger ml-4"> <?php echo form_error('vc_type_desc');?> </div>
										
										
										</div>
									</div>
								</div>

							</div>


							<div class="row  p-t-20" style="float: right;">
								<div class="col text-right">
									<button type="submit" class="btn btn-primary">Add</button>
								</div>
							</div>

								   
							<?php    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash());?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

						</form>
					</div>

					<div class="row p-t-40">
						<div class="col">
							<h5>Records</h5>
							<table class="table table-striped table-bordered  " id="myTable">
								<thead>
									<tr>
										<th scope="col">Sl</th>
										<th scope="col">Vehicle Type</th>
										<th scope="col">Description</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($get_vehicle_data as $row) {

										if($row['remove']==1)
										{
					  
										}
										else{
									?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $row['vc_type_name']; ?></td>
											<td><?php echo $row['vc_type_desc']; ?></td>
											<td>
												<a href="<?php echo site_url('index.php/admin/vc_type_master_edit/') . $row['id']; ?>" class="btn btn-primary org-btn rounded">&#9998;</a>
												<a href="<?php echo site_url('index.php/admin/vc_type_master_delete/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" style="display:none">Delete</a>
												<a href="<?php echo site_url('index.php/admin/vc_type_master_remove/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</a>
											</td>
										</tr>
									<?php  $i++;}
									} ?>
								</tbody>
							</table>
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

<?php } ?>