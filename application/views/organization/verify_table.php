<?php
if (!isset($_SESSION['bmw_org_id'])) {
	return redirect('index.php/organization');
} else {
	$admin_session = $_SESSION['bmw_org_id'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>


	<?php include('public/includes/organization/headernav.php') ?>

	<section>
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-md-2" style="height:120vh;">
					<?php include('public/includes/organization/sidenav.php') ?>
				</div>
				<div class="col-md-10">

				 <!-- <form action="<?php echo base_url('index.php/user/print_waste_collection_report') ?>" method="post"> -->
			
					<div class=" adm-cont p-t-40">
					<h2>Verify Table</h2>
					
				<!-- </form> -->
					<div class="row p-t-40">
						<div class="col">
							<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
								<div class="row">
									<div class="col-sm-12 col-md-6">

										<div class="col-sm-12 col-md-6">
											<!-- <div id="myTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="myTable"></label></div> -->
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
												<thead>
													<tr role="row">
														<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sl No.: activate to sort column descending" style="width: 155.371px;">Sl No.</th>

														<!-- <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Organization</th> -->
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Collection Code</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Category</th>

														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Weight</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Collection Date</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Issue Date</th>
														
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Status</th>
													</tr>
												</thead>
												<tbody>

													<?php
													$i = 1;
													foreach ($get_report as $row) {
														


													?>
															<tr class="odd">
																<th scope="row" class="sorting_1"><?php echo $i; ?></th>

																<td ><img src="<?php echo base_url()?>barcode/<?php echo $row['collection_code'] ?>.png" alt="" height='100' width='400' /> </td>
																
																<td><?php echo $row['waste_category'] ?> </td>

																<td><?php echo $row['code_weight'] ?> </td>
																<td ><?php echo $row['collection_date'] ?> </td>
																<td ><?php if($row['issue_date']==0){
																	echo " ";
																		}
																	else{
																		echo $row['issue_date'];
																	}
																 ?> </td>
																
																<td ><?php
																if($row['issue_date']==0){
																
																	echo '<div class="text-danger">';
																	echo "Pending";
																	echo '</div>';
																	
																}
																else{
																	echo '<div class="text-success">';
																	echo "Complete";
																	echo '</div>';
																}
																
																?> </td>

																							</tr>

													<?php $i++;
														
													} ?>
												</tbody>
											</table>
										</div>
									</div>
									<!-- <div class="row">
									<div class="col-sm-12 col-md-5">
										<div class="dataTables_info" id="myTable_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
									</div>
									<div class="col-sm-12 col-md-7">
										<div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate">
											<ul class="pagination">
												<li class="paginate_button page-item previous disabled" id="myTable_previous"><a href="#" aria-controls="myTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
												<li class="paginate_button page-item active"><a href="#" aria-controls="myTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
												<li class="paginate_button page-item next disabled" id="myTable_next"><a href="#" aria-controls="myTable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
											</ul>
										</div>
									</div>
								</div> -->
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
		<?php include('public/includes/organization/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->
<?php }
?>

  <!-- <script>
$('#submit').on('click', function () {
		   var start = $("#start").val();
		   var end = $("#end").val();
		  // alert(start);
		   	$.ajax({
            type:'POST',
            url:'<?php echo base_url('index.php/user/print_waste_collection_report') ?>',
            data:{'start':start},
			data:{'end':end},
            success:function(data){
            	alert('success');
            	//$('#plant_name').html(data);
            }
        });
		});

</script>  -->
