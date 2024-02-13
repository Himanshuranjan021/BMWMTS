<?php
if (!isset($_SESSION['bmw_user_id'])) {
	return redirect('index.php/user');
} else {
	$admin_session = $_SESSION['bmw_user_id'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>
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

	<?php include('public/includes/user/headernav.php') ?>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/user/sidenav.php') ?>
				</div>
				<div class="col-md-10" style="min-height:120vh;">
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

					<div class="adm-cont p-t-40">

						<div class="row">
							<!-- <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/user/insert_dummy_issue_collection" method="post">   -->

							<div class="col-md-6 col-12">

								<div class="form-group mb-5">
									<div class="row">
										<div class="col-md-3"><label for="name">Scan Result:</label></div>
										<div class="col-md-9">

											<input type="text" class="form-control" placeholder="Scan Here" name="scan" id="scan" required>
										</div>
									</div>
								</div>
								<!-- <input type="submit" value="submit"> -->
								<!-- </form> -->

							</div>
						</div>

						<form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/user/issue_waste_collection" method="post">


							<h5>Issue Waste Bag</h5>
							<!-- <div class="row float-md-right">
									<div><a href="#"><img class="org-rset" src="img/reset.png"></a></div>
								</div> -->


							<!-- <div class="col-md-12 col-8"> -->




							<div class="row ">
								<div class="col col-12" class="table-responsive ">
									<div class="text-danger"><?php echo validation_errors(); ?></div>
									<div Style="width:100%; overflow:scroll;" class="tblemob">
									<table class="table table-striped table-bordered" id="myTable2" name="myTable">
										<thead>
											<tr>
												<th scope="col">SL no.</th>
												<th scope="col">Barcode</th>
												<th scope="col">Category</th>
												<th scope="col">Weight</th>
												<th scope="col">Action</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($get_dummy_data as $row) {

											?>

												<tr>
													<th scope="row"> <?php echo $i ?> </th>
													<td>

														<input type="text" style="background: none;" value="<?php echo $row['issue_code'] ?>" name="issue_code[]" readonly>

													</td>
													<td><input type="text" style="background: none;" value="<?php echo $row['waste_category'] ?>" name="category[]" readonly class="no-outline"></td>
													<td><input type="text" style="background: none;" value="<?php echo $row['weight'] ?>" name="weight[]" readonly>
														<input type="hidden" value="<?php echo $row['organization_master_id'] ?>" name="org_id">
														<input type="hidden" value="<?php echo $row['organization_spl_code'] ?>" name="organization_spl_code[]">
													</td>
													<td>
														<a href="<?php echo base_url('index.php/user/delete_dummy_waste_collection/') . $row['id']; ?>" class="text-danger">Delete</a>
													</td>
													</th>
												</tr>

											<?php

												$i++;
											} ?>


										</tbody>
									</table>
									</div>
								</div>
							</div>

							<div class="row mt-5">

								<div class="col-md-3 col-12"><label for="name">Vehicle:</label></div>
								<div class="col-md-3 col-12">
									<select class="form-control" name="vehicle_number" id="vehicle_number" required>

										<option value="">-Select-</option>
										<?php foreach ($get_vehicle_data as $row1) { ?>
											<option value="<?php echo $row1['vc_no']; ?>">
											<?php
											echo $row1['vc_no'];
										}

											?>
											</option>
									</select>

								</div>

							</div>



							<div class="row">
								<div class="col-md-3 col-12"><label for="name">CBWTF:</label></div>
								<div class="col-md-3 col-12">
									<input type="hidden" class="form-control" name="plant_name" id="plant_name" value="<?php echo ($cbwtf_data) ? $cbwtf_data['plant_id'] :''; ?>" required>
									<input type="text" class="form-control" value="<?php echo ($cbwtf_data) ? $cbwtf_data['plant_name'] :''; ?>" required id="cbwtf_name">
								</div>
							</div>





							<div class="row  p-t-40">
								<div class="col text-right">
									<button type="submit" id="submit" class="btn btn-primary org-btn">Submit</button>

								</div>
							</div>


							<?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							); ?>
							<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
						</form>
					</div>


					<div class="row p-t-40" style="width: 100%">
						<div class="col">
							<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
								<div class="row">




									<div class="col-md-12">
										<h3>Today's Record</h3>

										<div class="col-sm-12">
											<table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
												<thead>
													<tr role="row">
														<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sl No.: activate to sort column descending" style="width: 155.371px;">Sl No.</th>


														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Barcode</th>

														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Category</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Weight</th>

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
																<td><?php echo $row['issue_code'] ?> </td>

																<td><?php echo $row['waste_category'] ?> </td>
																<td><?php echo $row['weight'] ?> </td>




																<div>
																	<a href="<?php echo base_url('index.php/user/delete_waste_collection/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style="display:none">Delete</button></a>
																</div>
																<div>
																	<a href="<?php echo base_url('index.php/user/remove_waste_collection/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style="display:none">Remove</button></a>
																</div>
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
	</section>

	<footer class="footer">
		<?php include('public/includes/user/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->
<?php }
?>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->



<script>
	document.getElementById('cbwtf_name').readOnly = true;
	document.getElementById('scan').focus();

	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
		csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	$('#scan').on('input', function() {

		var scan = $("#scan").val();
		//alert(scan);
		if (scan.length == 13) {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>index.php/user/insert_dummy_issue_collection',
				data: {
					[csrfName]: csrfHash,
					'scan': scan
				},
				success: function() {

					$('#scan').val('');
					location.reload(true);
					//alert("success");

					//$('#area').html(data);
				}
			});
		}
	});




	$('#vehicle_number').on('change', function() {
		var vehicle_number = $("#vehicle_number").val();
		// alert(vehicle_number);
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('index.php/user/fetch_cbwtf_ajax_data') ?>',
			data: {
				[csrfName]: csrfHash,
				'vehicle_number': vehicle_number
			},
			success: function(data) {
				//alert('success');
				$('#plant_name').html(data);
			}
		});
	});
	document.getElementById('plant_name').readOnly = true;
</script>