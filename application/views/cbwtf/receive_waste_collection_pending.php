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
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-md-2" style="height:120vh;">
					<?php include('public/includes/cbwtf/sidenav.php') ?>
				</div>
				<div class="col-md-10">

					<div class="row adm-cont p-t-40">


						<div class="row" style="overflow-x:auto;">
							<!-- <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/cbwtf/insert_dummy_issue_receive" method="post">  -->

							<div class="col-md-6">
							<?php if ($this->session->flashdata('success')) { ?>
							<section>
								<div class="success" style="background:#0a96b3;">
									<span class="title"> <?php echo $data1 = $this->session->flashdata('success');  ?><span class="close">X</span>
								</div>
							</section>
						<?php } else {
						} ?>
						<?php if ($this->session->flashdata('error')) { ?>
							<section>
								<div class="error" style="background:#0a96b3;">
									<span class="title"> <?php echo $data1 = $this->session->flashdata('error');  ?><span class="close">X</span>
								</div>
							</section>
						<?php } else {
						} ?>

								<div class="form-group mb-5">
									<div class="row">
										<div class="col-md-3"><label for="name">Scan Result:</label></div>
										<div class="col-md-9">

											<input type="text" class="form-control" placeholder="Scan Report" name="scan" id="scan" required>
										</div>
									</div>
								</div>



							</div>


							<form class="orgisation-m-frm ml-4" method="post" action="<?php echo base_url() ?>index.php/cbwtf/receive_waste_collection" onsubmit="return validation();">


								<h5>Receive Waste Collection2</h5>

								<div class="text-danger"><?php echo validation_errors(); ?></div>
								<div class="col-md-12">
									<div class="text-danger">
										<!-- <?php echo form_error('category[]'); ?></div> -->


										<!-- <?php echo form_error('category[]') ?> -->
										<div class="row p-t-40 ">
											<div class="col">
												<table class="table table-striped table-bordered " id="myTable" name="myTable">
													<thead>
														<tr>
															<th scope="col">SL no.</th>
															<th scope="col">Collection Code</th>
															<th scope="col">Category</th>
															<th scope="col" style="display:none">Weight</th>
															<th scope="col">HCF</th>
															<th scope="col">Cbwtf Weight</th>
															<th scope="col">Remark</th>

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

																	<input type="text" style="width: 80%;" value="<?php echo $row['barcode'] ?>" name="issue_code[]" readonly>

																</td>
																<td><input type="text" value="<?php echo $row['category'] ?>" name="category[]" readonly></td>
																<td style="display:none">
																	<input type="text" value="<?php echo $row['weight'] ?>" name="weight[]">
																	<button class="btn btn primary">Get</button>
																	<!-- <input type="hidden" value="<?php echo $row['org_master_id'] ?>" name="org_id"> -->
																</td>

																<td>
																	<input type="hidden" value="<?php echo $row['org_master_id'] ?>" name="org_id[]">
																	<input type="text" value="<?php echo $row['org_name'] ?>" name="org_name[]" readonly>
																</td>
																<td>
																	<!-- <input type="text"  value="" name="weight[]" readonly> -->
																</td>
																<!-- <td>
																<span id="match" style="display:none;">Matched</span>	
																<span id="mismatch" style="display:none; color:red">Mismatch</span>
																
															</td> -->
																<!-- <td>
																<a href="<?php echo base_url('index.php/cbwtf/delete_dummy_waste_receive/') . $row['id']; ?>" class="text-danger">Delete</a>
															</td> -->


																</th>




															</tr>

														<?php

															$i++;
														} ?>


													</tbody>
												</table>
											</div>
										</div>


										<!-- <div class="form-group mt-5">
										<div class="row">
											<div class="col-md-3"><label for="name">Vehicle:</label></div>
											<div class="col-md-3">
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
									</div> -->





										<div class="col-md-12">

											<div class="row  p-t-40">
												<div class="col text-right">
													<button type="submit" id="submit" class="btn btn-primary org-btn">Submit</button>

												</div>
											</div>
										</div>

										<?php $csrf = array(
											'name' => $this->security->get_csrf_token_name(),
											'hash' => $this->security->get_csrf_hash()
										); ?>
										<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
							</form>
						</div>


						<div class="row p-t-40">
							<div class="col">
								<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="row">
										<div class="col-sm-12 col-md-6">

											<div class="col-sm-12 col-md-6">

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
		<?php include('public/includes/cbwtf/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->
<?php }
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
	var count = 1;
	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
		csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	$('#scan').on('input', function() {
		var scan = $("#scan").val();
		$.ajax({
			type: "POST",
			url: '<?php echo base_url() ?>index.php/cbwtf/fetch_barcode_data',
			data: {
				[csrfName]: csrfHash,
				'scan': scan
			},
			success: function(data) {
				$('#scan').val('');
				barcode = JSON.parse(data);
				if(barcode!=null)
				{

				$.ajax({
					type: "POST",
					url: '<?php echo base_url() ?>index.php/cbwtf/fetch_weight_data',
					data: {
						[csrfName]: csrfHash,
						'scan': scan
					},
					success: function(data) {
						wt = JSON.parse(data);
						if (wt.weight) {
							var dis = Math.abs(barcode.weight - wt.weight);
							if (dis >= 0.4) {
								html = '<tr>';
								html += '<td scope="row">' + count + '</td>';
								html += '<td> <input type="text" style="width: 80%;" value="' + barcode.barcode + '" name="issue_code[]" readonly></td>';
								html += '<td><input type="text" value="' + barcode.category + '" name="category[]" readonly></td>';
								html += '<td><input type="hidden" value="' + barcode.org_master_id + '" name="org_id[]">';
								html += '<input type="text" value="' + barcode.organization + '" name="org_name[]" readonly>';
								html += '<input type="hidden" value="' + barcode.weight + '" name="weight[]" readonly>';
								html += '</td>';
								html += '<td class="d-flex">';
								html +='<input type="text" value="' + wt.weight + '" name="weight_cbwtf[]" readonly>';
								html +='<input type="button" class="btn btn-primary" value="Get" btn-sm">';
								html +='</td>';
								html += '<td>';
								html += '<input type="text" placeholder="Reason of Weight Descripancy"  name="reason[]" required><br>';
								html += '<span id="mismatch">Mismatch</span>';
								html += '</td>';
								html += '</tr>';
								tableBody = $("table tbody");
								tableBody.append(html);

							} else {
								html = '<tr>';
								html += '<td scope="row">' + count + '</td>';
								html += '<td> <input type="text" style="width: 80%;" value="' + barcode.barcode + '" name="issue_code[]" readonly></td>';
								html += '<td><input type="text" value="' + barcode.category + '" name="category[]" readonly></td>';
								html += '<td><input type="hidden" value="' + barcode.org_master_id + '" name="org_id[]">';
								html += '<input type="text" value="' + barcode.organization + '" name="org_name[]" readonly>';
								html += '<input type="hidden" value="' + barcode.weight + '" name="weight[]" readonly>';
								html += '</td>';
								html += '<td class="d-flex">';
								html +='<input type="text" value="' + wt.weight + '" name="weight_cbwtf[]" readonly>';
								html +='<input type="button" class="btn btn-primary" value="Get" btn-sm">';
								html +='</td>';
								html += '<td>';
								html += '<input type="hidden" value=""  name="reason[]">';
								html += '<span id="mismatch">Matched</span>';
								html += '</td>';
								html += '</tr>';
								tableBody = $("table tbody");
								tableBody.append(html);



							}
							count += 1;
						} else {
							alert('Weight Not Found');
						}
					}
				});

			}else{ //alert('Invalid Input!');
			}

			}
		});
	});
</script>