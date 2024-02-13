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
				<div class="col-md-2" style="min-height:90vh;">
					<?php include('public/includes/cbwtf/sidenav.php') ?>
				</div>
				<div class="col-md-10">
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

								<h5>Receive Waste Bag</h5>

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
															<th scope="col" class="remark">Remark</th>

														</tr>
													</thead>
													<tbody>



													</tbody>
												</table>
											</div>
										</div>



										<div class="col-md-12">

											<div class="row  p-t-40">
												<div class="col text-right">
													<button type="submit" id="submit" onclick="return check_weight();" class="btn btn-primary org-btn">Submit</button>

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


						<!-- <div class="row p-t-40">
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
						</div> -->
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
	document.getElementById('scan').focus();
	var count = 1;
	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
		csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	$('#scan').on('input', function() {
		var scan = $("#scan").val();
		if (scan.length == 13) {
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
					if (barcode != null) {
						document.getElementById('scan').readOnly = true;

						html = '<tr>';
						html += '<td scope="row">' + count + '</td>';
						html += '<td> <input type="text" style="width: 80%;" value="' + barcode.barcode + '" name="issue_code[]" readonly></td>';
						html += '<td><input type="text" value="' + barcode.category + '" name="category[]" readonly></td>';
						html += '<td><input type="hidden" value="' + barcode.org_master_id + '" name="org_id[]">';
						html += '<input type="text" value="' + barcode.organization + '" name="org_name[]" readonly>';
						html += '<input type="hidden" value="' + barcode.weight + '" name="weight[]" class="hcf_weight" readonly>';
						html += '</td>';
						html += '<td class="d-flex">';
						html += '<input type="text"  class="weight_cbwtf" id="weight_cbwtf" value="" name="weight_cbwtf[]" readonly>';
						html += '<input type="button" class="btn btn-primary get_btn"  value="Get" btn-sm">';
						html += '</td>';

						html += '</tr>';
						tableBody = $("table tbody");
						tableBody.append(html);

						count += 1;

					} else {
						alert('Invalid Input!');
					}

				}

			});
		}
	});




	$(document).on('click', '.get_btn', function() {

		var $tr = $(this).closest('tr');

		$.ajax({
			type: "POST",
			url: '<?php echo base_url() ?>index.php/cbwtf/fetch_weight_data',
			data: {
				[csrfName]: csrfHash,
			},
			success: function(data) {
				wt = JSON.parse(data);
				if (wt.weight) {
					document.getElementById('scan').readOnly = false;
					$($tr).find('.weight_cbwtf').val(wt.weight);
					var code = $($tr).find('.hcf_weight').val();
					var dis = Math.abs(code - wt.weight);
					if (dis >= 0) {

						let html;
						html = '<td class="remark">';
						html += '<input type="text" value=""  name="reason[]" required placeholder="Enter reason here" style="background:#fff;">';
						html += '<span id="Mismatch">Mismatch</span>';
						html += '</td>';
						$($tr).append(html);

					} else {

						let html;
						html = '<td class="remark">';
						html += '<input type="hidden" value=""  name="reason[]">';
						html += '<span id="Mismatch">Matched</span>';
						html += '</td>';
						$($tr).append(html);
					}

				} else {
					alert('No Weight Found !')
				}
			}
		});

	});


	function check_weight() {
		var weight = $('table tr:last-child .weight_cbwtf').val();
		if (weight == '') {
			alert('Weight Field Is Required');
			return false;
		}
		return true;
	}
</script>