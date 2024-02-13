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
				<div class="col-md-3" style="height:120vh;">
					<?php include('public/includes/cbwtf/sidenav.php') ?>
				</div>
				<div class="col-md-9">

					<div class="row adm-cont p-t-40">

						<div class="row" style="overflow-x:auto;">
							<!-- <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/cbwtf/insert_dummy_issue_receive" method="post">  -->

							<div class="col-md-6">

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


								<h5>Receive Waste Collection</h5>

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
														<th scope="col">Cbwtf  Weight</th>
														<th scope="col">Status</th>

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
																<input type="text"  value="<?php echo $row['weight'] ?>" name="weight[]" >
																<!-- <input type="hidden" value="<?php echo $row['org_master_id'] ?>" name="org_id"> -->
															</td>
														
															<td>
															<input type="hidden" value="<?php echo $row['org_master_id'] ?>" name="org_id[]">
																<input type="text" value="<?php echo $row['org_name'] ?>" name="org_name[]" readonly>
															</td>
															<td>
															<!-- <input type="text"  value="" name="weight[]" readonly> -->
															</td>
															<td>
																<span id="match" style="display:none;">Matched</span>	
																<span id="mismatch" style="display:none; color:red">Mismatch</span>
																<!-- <input type="text"  name="reason" > -->
															</td>
															<td>
																<a href="<?php echo base_url('index.php/cbwtf/delete_dummy_waste_receive/') . $row['id']; ?>" class="text-danger">Delete</a>
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

    $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {

                return $(this).text();
            }).get();

           // console.log(data);
            $('#hidden_id').val(data[1]);
            $('#old_designation').val(data[4]);








	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
		csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	$('#scan').on('input', function() {

		var scan = $("#scan").val();
		//alert(scan);
		$.ajax({
			type: "POST",
			url: '<?php echo base_url() ?>index.php/cbwtf/insert_dummy_issue_receive',
			data: {
				[csrfName]: csrfHash,
				'scan': scan
			},
			success: function() {

				$('#scan').val('');
				location.reload(true);
				//alert("success");


			}
		});
	});


</script>