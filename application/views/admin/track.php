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
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-2 pl-0 " style="height:120vh;">
					<?php include('public/includes/sidenav.php') ?>
				</div>
				<div class="col-md-10 pt-4">
						<h3>Track Waste</h3>
						<div class="row adm-cont">
							 <div class="col-md-6">
								<label for="start"> QRcode</label>
								<input type="text" name="scan" id="scan" class="form-control" required>
							</div> 
						</div>
						<div class="mt-4">
							 <button class="btn btn-primary org-btn rounded" type="submit" id="submit">Track</button> 
						</div>

						<?php $csrf = array(
							'name' => $this->security->get_csrf_token_name(),
							'hash' => $this->security->get_csrf_hash()
						); ?>
						<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
		
					<div class="row p-t-40">
						<div class="col">
							<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
								<div class="row">
									<div id="data" style="overflow-x:auto;">

									</div>
									<div class="row">
										<div class="col-sm-12">
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
		<?php include('public/includes/footer.php'); ?>
	</footer>

	<!-- wrapper Ends -->
<?php }
?>

<script>

	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
		csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	$('#submit').on('click', function() {
		var scan = $("#scan").val();
		$.ajax({
			type: "POST",
			url: '<?php echo base_url() ?>index.php/admin/fetch_track_data',
			data: {
				[csrfName]: csrfHash,
				'scan': scan
			},
			success: function(data) {

				$('#scan').val('');
				barcode = JSON.parse(data);
				if(barcode!=null)
				{
					$("#data").html("");	
						html='<table class="table table-bordered table-responsive" width="100%">'; 
						html+='<tr>';
						html+='<th>Collection Code</th>'; 
						html+='<th>Collection Date</th>'; 
						html+='<th>Collected By</th>'; 
						html+='<th>Department</th>'; 
						html+='<th>Ward</th>'; 
						html+='<th>Weight At HCF</th>'; 
						html+='<th>Category</th>'; 
						html+='<th>Issue Date</th>'; 
					//	html+='<th>Issued By</th>'; 
						html+='<th>Vehicle Number</th>'; 
						html+='<th>CBWTF</th>'; 
						html+='<th>Receive Date</th>'; 
						html+='<th>Weight At CBWTF</th>'; 
						html+='<th>Reason If Descrepancy in Weight</th>'; 
						html+='<th>Disposal Date</th>'; 
						html+='<th>Disposal Method</th>'; 
						html+='</tr>'; 
						html+='<tr>'; 
						html+='<td>'+barcode.collection_code+'</td>'; 
						html+='<td>'+barcode.collection_date+'</td>'; 
						html+='<td>'+barcode.emp_name+'</td>'; 
						html+='<td>'+barcode.waste_department+'</td>'; 
						html+='<td>'+barcode.ward+'</td>'; 
						html+='<td>'+barcode.code_weight+'</td>'; 
						html+='<td>'+barcode.waste_category+'</td>'; 
						html+='<td>'+ barcode.issue_date+ '</td>'; 
						//html+='<td>'+barcode.emp_name+'</td>'; 
						html+='<td>'+barcode.vehicle_number+'</td>'; 
						html+='<td>'+barcode.plant_name+'</td>'; 
						html+='<td>'+barcode.treatment_date+'</td>'; 
						html+='<td>'+barcode.weight_at_plant+'</td>'; 
						html+='<td>'+barcode.reason+'</td>'; 
						html+='<td>'+barcode.disposal_date+'</td>'; 
						html+='<td>'+barcode.disposal_method+'</td>'; 	
						html+='</tr>'; 
						html+='</table>'; 
						$('#data').append(html);

			}else{ alert('Invalid Input!');
			}

			}
		});
	});


</script>