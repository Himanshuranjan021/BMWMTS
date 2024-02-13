<?php
if (!isset($_SESSION['bmw_user_id'])) {
	return redirect('index.php/user');
} else {
	$admin_session = $_SESSION['bmw_user_id'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>

	<style>
		/* QR Code printing style */
		#omm {
			display: none;
			text-align: center;
		}

		@media print {
			body>:not(#omm) {
				display: none;
			}

			#omm {
				display: block;
			}

			#omm {
				height: 100%;
				width: 100%;

			}
		}

		/* QR Code printing style */

		@page {
			height: 50mm !important;
			width: 50mm !important;
			text-align: center !important;
			vertical-align: middle;
			margin-top: 120px !important;
			margin-bottom: 10px !important;

		}
	</style>

	<?php include('public/includes/user/headernav.php') ?>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/user/sidenav.php') ?>
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
						<form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/user/waste_collection" method="post">
							<h5>Collect Waste Bag</h5>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="name"><span style="color:red;">*</span>Select Department:</label></div>
											<div class="col-md-9">

												<select class="form-control" name="department" onChange="getWords(this.value);" id="department" required>
													<option value="">-Select-</option>
													<?php foreach ($get_department_data as $row2) {
														if ($row2['remove'] == 1) {
														} else {

													?>
															<option value="<?php echo $row2['dept_name']; ?>">
														<?php
															echo $row2['dept_name'];
														}
													}

														?>
															</option>
												</select>


											</div>
											<div class="text-danger ml-4"> <?php echo form_error('department'); ?> </div>
										</div>
									</div>


									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="name"><span style="color:red;">*</span>Select Category:</label></div>
											<div class="col-md-9">
												<?php
												foreach ($get_waste_category_data as $category) {
												?>

													<div class="custom-control custom-radio">
														<input type="radio" id="<?php echo $category['id'] ?>" name="category" value="<?php echo $category['category'] ?>" class="custom-control-input" checked="checked" required>
														<label class="custom-control-label" for="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></label>
													</div>

												<?php
												} ?>


											</div>
											<div class="text-danger ml-4"> <?php echo form_error('category'); ?> </div>
										</div>
									</div>



								</div>

								<div class="col-md-6">

									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="name"><span style="color:red;">*</span>Select Ward:</label></div>
											<div class="col-md-9">
												<select class="form-control" name="ward" id="ward" required>
													<option value="">-Select-</option>
													<?php foreach ($get_ward_data as $row1) {
														if ($row1['remove'] == 1) {
														} else {


													?>
															<option value="<?php echo $row1['ward_name']; ?>">
														<?php

															echo $row1['ward_name'];
														}
													}

														?>
															</option>
												</select>

											</div>
											<div class="text-danger ml-4"> <?php echo form_error('ward'); ?> </div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="name"><span style="color:red;">*</span>Weight:</label></div>
											<div class="col-md-7">
												<input type="text" name="weight" id="weight" class="form-control" placeholder="Weight" name="weight" value="<?php if (isset($get_weight_data['weight'])) {
																																								echo $get_weight_data['weight'];
																																							} ?>" required>
												<!-- <input type="text" name="weight"  id="weight" class="form-control"  name="weight"> -->
												<div class="text-danger" id="no_data">
													<!-- <?php if (isset($get_weight_data['info'])) {
																echo $get_weight_data['info'];
															} ?> -->
												</div>

												<input type="hidden" id="table_id" class="form-control" placeholder="table_id" name="table_id" value="<?php if (isset($get_weight_data['table_id'])) {
																																							echo $get_weight_data['table_id'];
																																						} ?>" required>

												<div class="text-danger ml-4"> <?php echo form_error('weight'); ?> </div>
											</div>
											<div class="col-md-2">
												<input type="button" onclick="ajaxCall();" class="btn btn-primary btn-sm" value="Get">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="dob"> <span style="color:red;">*</span>Date</label></div>
											<div class="col-md-9"><input type="date" name="date" class="form-control" id="dob" value="<?php echo date('Y-m-d') ?>" required readonly></div>
											<div class="text-danger ml-4"> <?php echo form_error('date'); ?> </div>
										</div>
									</div>




									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="remarks">Occupancy:</label></div>
											<div class="col-md-9"><input type="text" name="occupancy" class="form-control" placeholder="Occupancy"></div>
											<div class="text-danger ml-4"> <?php echo form_error('occupancy'); ?> </div>
										</div>
									</div>

								</div>
							</div>

							<div class="row  p-t-40">
								<div class="col text-right">
									<button type="submit" class="btn btn-primary org-btn" id="submit">Submit</button>

								</div>
							</div>

							<?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							); ?>
							<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
							<p style="color:red;">* &nbsp;Required Fields</p>
						</form>

					</div>

					<div class="row p-t-40">
						<div class="col">
							<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<h3>Today's Record</h3>

									</div>
									<div class="row">
										<div class="col-sm-12">
											<table class="table table-striped table-bordered dataTable no-footer table-responsive" id="myTable" role="grid" aria-describedby="myTable_info" width="100%">
												<thead>
													<tr role="row">
														<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sl No.: activate to sort column descending" style="width: 155.371px;">Sl No.</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Barcode</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Department</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Ward</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Category</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Weight</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Occupancy</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Action</th>
													</tr>
												</thead>
												<tbody>

													<?php

													$i = 1;
													foreach ($get_waste_data as $row) {
														if ($row['remove'] == 1) {
														} else {


													?>
															<tr class="odd">
																<th scope="row" class="sorting_1"><?php echo $i; ?></th>
																<td><?php echo $row['barcode'] ?> </td>
																<td><?php echo $row['department'] ?> </td>
																<td><?php echo $row['ward'] ?> </td>
																<td><?php echo $row['category'] ?> </td>
																<td><?php echo $row['collected_weight'] ?> </td>
																<td><?php echo $row['remarks'] ?> </td>
																<td>
																	<?php if ($row['issued'] == NULL) { ?>
																		<a href="<?php echo base_url('index.php/user/delete_waste_collection/') . $row['waste_id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are You Sure You Want to delete the waste Package ?')">Delete</button></a>
																	<?php } ?>
																	<a href="<?php echo base_url('index.php/user/remove_waste_collection/') . $row['waste_id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are You Sure You Want to delete the waste Package ?')" Style="display:none">Remove</button></a>
																</td>

															</tr>

													<?php $i++;
														}
													} ?>
												</tbody>
											</table>
										</div>
									</div>

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
		<?php include('public/includes/user/footer.php'); ?>
	</footer>
	<div id="omm">
		<div>
			<div style="text-align:center;">
				<div id="bar_name" style="text-align:center; font-size:150px;">Name</div>
				<img id="bar_img" src="https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=${data}" style="width:85%;" />
			</div>
			<div id="spl_code" style="text-align:center; font-size:120px;">Name</div>
			<div id="color" style="text-align:center; font-size:150px;">Color</div>
		</div>

	</div>

	<!-- wrapper Ends -->
<?php } ?>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> -->
<script>
	document.getElementById('weight').readOnly = true;

	//setInterval(ajaxCall, 10000); //300000 MS == 5 minutes

	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
		csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	$(document).ready(function() {
		ajaxCall();
	});




	function getWords() {
		var department = $("#department").val();
		//if(weight==''){
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('index.php/user/fetch_word') ?>',
			data: {
				[csrfName]: csrfHash,
				['dept']: department
			},

			success: function(data) {

				$('#ward').html(data);
			}
		});

		//}
	}
	function ajaxCall() {
		var weight = $("#weight").val();
		//if(weight==''){
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('index.php/user/fetch_weight') ?>',
			data: {
				[csrfName]: csrfHash
			},

			success: function(data) {

				array = JSON.parse(data);
				if (array.info != undefined) {
					$('#no_data').html(array.info);
				} else {
					$('#no_data').html('');
				}

				var weight = array.weight;
				var table_id = array.table_id;
				$('#weight').val(weight);
				$('#table_id').val(table_id);
			}
		});

		//}
	}

	$(document).ready(function() {
		$("#submit").click(function(event) {
			event.preventDefault();
			var form = $(this).parents('form');
			var weight = $("#weight").val();
			var dept = $("#department").val();
			var ward = $("#ward").val();

			if (weight == '' || dept == '' || ward == '') {
				alert('Please Filled Up The Required Fields.');
			} else {
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url('index.php/user/insert_waste_collection_data') ?>',
					data: form.serializeArray(),
					success: function(data) {
						row = JSON.parse(data);

						// $('body>*:not(#omm):not(script)').hide()
						// update image details
						$('#bar_name').html(row[0].code)
						$('#color').html(row[0].color)
						$('#spl_code').html(row[0].spl_code)
						// $('#omm').show()
						$('#bar_img')
							.attr('src', `https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=${row[0].code}`)
							.on('load', function() {
								window.print()
								// $('body>*:not(#omm):not(script)').show()
								// $('#omm').hide()
								// location.reload()
								$(form).trigger("reset");
								//location.reload();
							})

					}
				});
			}

		});
	});
</script>