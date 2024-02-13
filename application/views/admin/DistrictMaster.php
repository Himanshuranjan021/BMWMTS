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

						<form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="<?php echo site_url('index.php/admin/district') ?>" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
							<h5>District Master</h5>

							<div class="row">
							
								<div class="col-md-6">
									
									<div class="form-group row">
									
										<div class="col-md-3"><label for="inputPassword" class="col-sm-2 col-form-label" style="text-align: right;">State Name:</label></div>
										<div class="col-md-9">

											<select id="state_name" name="state_name" class="form-control">
												<option value="Odisha">Odisha</option>
											</select>


										</div>
										<div class="text-danger ml-4"> <?php echo form_error('state_name');?> </div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group row">
										<div class="col-md-3"><label for="inputPassword" class="col-sm-2 col-form-label" style="text-align: right;">District:</label></div>
										<div class="col-md-9"><input type="text" class="form-control" name="district" id="district" placeholder="Enter District Name" value="<?php if (isset($name)) {echo $name;} ?>" required></div>
											<div class="text-danger ml-4"> <?php echo form_error('district');?> </div>
									</div>
								</div>
							</div>


							<div class="row  p-t-20" style="float: right;">
								<div class="col text-right">

									<?php if (isset($get_district_dataa)) { ?>
										<button type="submit" class="btn btn-warning">Update</button>
									<?php } else { ?>
										<button type="submit" class="btn btn-primary">Submit</button>
									<?php } ?>
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
										<th scope="col">State Name</th>
										<th scope="col">District</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($get_district_data as $row) {
										
										if($row['remove']==1)
										{
	
										}
										else{
									?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $row['state']; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td>
												<a href="<?php echo base_url('index.php/admin/district_edit/') . $row['id']; ?>"> <button class="btn btn-primary org-btn rounded">&#9998; </button> </a>
												<a href="<?php echo base_url('index.php/admin/district_delete/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" Style="display:none">Delete</a>
												<a href="<?php echo base_url('index.php/admin/district_remove/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</a>
											</td>
										</tr>
									<?php
										  $i++;
										}
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