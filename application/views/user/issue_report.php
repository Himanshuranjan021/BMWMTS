<?php
if (!isset($_SESSION['bmw_user_id'])) {
	return redirect('index.php/user');
} else {
	$admin_session = $_SESSION['bmw_user_id'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>


	<?php include('public/includes/user/headernav.php') ?>

	<section>
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-2 pl-0" style="height:120vh;">
					<?php include('public/includes/user/sidenav.php') ?>
				</div>
				<div class="col-md-10 pt-4">

				<form class="orgisation-m-frm" action="<?php echo base_url('index.php/user/print_issue_collection_report') ?>" method="post">
				<h5>Issue Report</h5>
				
					<div class="row adm-cont p-t-40">
						<div class="col-md-6">
					<label for="start">Enter Start Date</label>
						<input type="date" name="start" id="start" class=" form-control" required>
						</div>
						<div class="col-md-6">
						<label for="start">Enter Last Date</label> 
						<input type="date" name="end" id="end" class=" form-control" required>
						</div>
					</div>
					<div>
						<button  class="btn btn-primary org-btn rounded" type="submit" id="submit">Get Report</button>
					</div>

					<?php    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash());?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
		</form>
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
											<!-- <table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
												<thead>
													<tr role="row">
														<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sl No.: activate to sort column descending" style="width: 155.371px;">Sl No.</th>

														
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Collection Code</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Category</th>

														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Weight</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">CBWTF</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Vehicle No.</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Date Time</th>
													</tr>
												</thead>
												<tbody>

													<?php
													$i = 1;
													foreach ($get_report as $row) {
														if ($row['remove'] == 1) {
														} else {


													?>
															<tr class="odd">
																<th scope="row" class="sorting_1"><?php echo $i; ?></th>



															
																<td ><img src="<?php echo base_url()?>barcode/<?php echo $row['issue_code'] ?>.png" alt="" height='100' width='400' /> </td>
																
																<td><?php echo $row['waste_category'] ?> </td>

																<td><?php echo $row['weight'] ?> </td>
																 <td><?php echo $row['treatment_plant_name'] ?> </td> 
																 <td><?php echo $row['vehicle_number'] ?> </td> 
																 <td><?php echo $row['date_time'] ?> </td> 

																<td class="">

																	<div>
																		<a href="<?php echo base_url('index.php/user/delete_waste_collection_report/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style="display:none">Delete</button></a>
																	</div>
																	<div>
																		<a href="<?php echo base_url('index.php/user/remove_waste_collection_report/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded">Remove</button></a>
																	</div>
																</td>
															</tr>

													<?php $i++;
														}
													} ?>
												</tbody>
											</table> -->
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
	function myform()
	{
		document.getElementById("myform").submit();
		//alert("Done");
	}
</script> -->