<?php
if (!isset($_SESSION['bmw_plant_id'])) {
	return redirect('index.php/Cbwtf');
} else {
	$admin_session = $_SESSION['bmw_plant_id'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>



	<?php include('public/includes/cbwtf/headernav.php') ?>

	<style>
		input {
			border-top-style: hidden;
			border-right-style: hidden;
			border-left-style: hidden;
			border-bottom-style: hidden;
			background-color: #eee;
		}

		.no-outline:focus {
			outline: none;
		}
	</style>

	<section>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/cbwtf/sidenav.php') ?>
				</div>
				<div class="col-md-10" style="min-height:100vh;">
					<div class="alertback">
						<?php if ($this->session->flashdata('success')) { ?>

							<div class="alert alert-success alert-white rounded alertrsize">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-check"></i></div>
								<p><?php echo $data1 = $this->session->flashdata('success');  ?></p>
							</div>

						<?php } else {
						} ?>

						<?php if ($this->session->flashdata('error')) { ?>

							<div class="alert alert-danger alert-white rounded alertrsize">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-check"></i></div>
								<p><?php echo $data1 = $this->session->flashdata('error');  ?></p>
							</div>
						<?php } else {
						} ?>
					</div>
					<div class="row adm-cont p-t-40">
						<!-- <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/insert_register_staff" method="post" enctype="multipart/form-data"> -->
						<form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/cbwtf/create_user" method="post" enctype="multipart/form-data" name="myform" onsubmit="return validation();">
							<h5>Register Staff Master</h5>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="name">Name :</label></div>
											<div class="col-md-8">
												<input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>" id="name" required>

											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('name'); ?>
											</div>

										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="email">Email:</label></div>
											<div class="col-md-8">
												<input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" rows="2" required>
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('email'); ?>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="address">Address:</label></div>
											<div class="col-md-8">
												<input type="text" name="address" placeholder="Address" class="form-control" value="<?php echo set_value('address'); ?>" required>
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('address'); ?>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="image">Photo:</label></div>
											<div class="col-md-8">
												<input type="file" name="image" id="image" class="form-control" required>
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('image'); ?>
											</div>

										</div>
									</div>
								</div>


								<div class="col-md-6">

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">*</span><label for="mobile">Mobile No:</label></div>
											<div class="col-md-8">
												<input type="text" class="form-control" name="mobile" placeholder="Mobile" id="mob" value="<?php echo set_value('mobile'); ?>" required>
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('mobile'); ?>
											</div>
										</div>
									</div>



									<div class="form-group">
										<div class="row">

											<div class="col-md-4"><span style="color:red">* </span><label for="designation">Designation:</label></div>
											<div class="col-md-8">
												<input type="text" class="form-control" name="designation" required placeholder="Designation">
												<!-- <select class="form-control" name="designation" required>
													<option value="">-Select-</option>
													<?php foreach ($get_designation_data as $row3) {

														if ($row3['remove'] == 1) {
														} else {


													?>

															<option value="<?php echo $row3['designation']; ?>">
														<?php
															echo $row3['designation'];
														}
													}

														?>
															</option>
												</select> -->
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('designation'); ?>
											</div>
										</div>
									</div>




									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><label for="remarks">Remarks:</label></div>
											<div class="col-md-8"><input type="remarks" class="form-control" placeholder="Remarks" id="remarks" name="remarks" value="<?php echo set_value('remarks'); ?>"></div>
										</div>
									</div>

								</div>
							</div>

							<div class="row  p-t-40">
								<div class="col text-right">
									<button type="submit" class="btn btn-primary org-btn rounded">Submit</button>

								</div>
							</div>

							<?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							); ?>
							<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

						</form>
					</div>

					<div class="row p-t-40 ">
						<div class="col">
							<!-- <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"> -->

							<div class="row">
								<div class="col-sm-12">


									<table class="table table-striped table-bordered table-responsive dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
										<thead>
											<tr>
												<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 12.5px;">Id</th>
												<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Name</th>
												<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 50.0273px;">Image</th>
												<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 35.1172px;">Email</th>
												<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 44.9414px;">Mobile</th>
												<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 76.6211px;">Designation</th>
												<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">Address</th>
												<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Function: activate to sort column ascending" style="width: 55.8984px;">Function</th>
											</tr>
										</thead>
										<tbody>

											<?php
											$i = 1;
											foreach ($get_user as $row) {

											?>

												<tr class="odd">
													<td align="center"> <?php echo $i; ?> </td>
													<td align="center"> <?php echo $row['Name']; ?> </td>
													<td align="center"> <img src="<?php echo base_url(); ?>upload/cbwtf/<?php echo $row['Photo']; ?>" style="width:100%;"> </td>
													<td align="center"><?php echo $row['Email']; ?></td>
													<td align="center"><?php echo $row['Mobile']; ?></td>
													<td align="center"><?php echo $row['Designation']; ?></td>
													<td align="center"><?php echo $row['Address']; ?></td>
													<td>
														<a href="<?php echo base_url('index.php/cbwtf/cbwtf_user_edit/') . $row['Id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">&#9998;</button></a>

														<a href="<?php echo base_url('index.php/cbwtf/cbwtf_user_delete/') . $row['Id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style="display:none">Delete</button></a>

														<a href="<?php echo base_url('index.php/cbwtf/cbwtf_user_remove/') . $row['Session_id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>

													</td>
												</tr>
											<?php $i++;
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
		<?php include('public/includes/cbwtf/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->
<?php } ?>




<script>
	//Photograph Validation
	var img = document.forms['myform']['image'];

	function validation() {

		if (img.value != '') {

			var img_ext = img.value.substring(img.value.lastIndexOf('.') + 1);

			if (img_ext === "jpg" || img_ext === "png" || img_ext === "jpeg") {

				if (parseFloat(img.files[0].size / 1024) > 200 || parseFloat(img.files[0].size / 1024) < 10) {

					alert('Photograph file size should be between 10 to 200 kb.');
					return false;

				}

			} else {

				alert('Photograph should be in JPG/PNG/JPEG.');
				return false;

			}
		} else {

			alert('No Candidate image Selected');
			return false;
		}

		return true;
	}
</script>