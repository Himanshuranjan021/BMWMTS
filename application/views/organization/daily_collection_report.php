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
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-2 pl-0" style="min-height:120vh;">
					<?php include('public/includes/organization/sidenav.php') ?>
				</div>
				<div class="col-md-10 pt-4">

					<form class="orgisation-m-frm" action="<?php echo base_url('index.php/organization/print_waste_collection_report') ?>" method="post">



						<h5>Collection Report</h5>
						<div class="row adm-cont p-t-40">
							<div class="col-md-6">
								<label for="start">Enter Start Date</label>
								<input type="date" name="start" id="start" class=" form-control" required>
							</div>
							<div class="col-md-6">
								<label for="start">Enter Last Date</label>
								<input type="date" name="end" id="end" value="<?php echo date('Y-m-d') ?>" class=" form-control" required>
							</div>

							<div class="col-md-6" style="margin-top:10px;">
								<label for="name">Select Department:</label>
									<select class="form-control" name="department" id="department" onChange="getWards(this.value);" >
										<option value="">--Select--</option>
										<?php foreach ($get_department_data as $row2) { ?>
										<option value="<?php echo $row2['dept_name']; ?>">
										<?php
										echo $row2['dept_name'];
										}

										?>
									</option>
								</select>
							</div>
							<div class="col-md-6" style="margin-top:10px;">
								<label for="name"> Select Ward:</label>
									<select class="form-control" name="ward" id="ward" >
										<option value="">--Select--</option>
										<?php foreach ($get_ward_data as $row2) { ?>
										<option value="<?php echo $row2['ward_name']; ?>">
										<?php
										echo $row2['ward_name'];
										}

										?>
									</option>
								</select>
							</div> 

							<div class="col-md-6" style="margin-top:10px;">
								<label for="name"> Select Category:</label>
									<select class="form-control" name="category" id="category" >
										<option value="">--Select--</option>
										<?php foreach ($get_waste_category_data as $row2) { ?>
										<option value="<?php echo $row2['category']; ?>">
										<?php
										echo $row2['category'];
										}

										?>
									</option>
								</select>
							</div> 

						   </div>
						<div>
							<button class="btn btn-primary org-btn rounded" type="submit" id="submit">Get Report</button>
						</div>

						<?php $csrf = array(
							'name' => $this->security->get_csrf_token_name(),
							'hash' => $this->security->get_csrf_hash()
						); ?>
						<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
					</form>
					<div class="row p-t-40">
						<div class="col">
							<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
								<div class="row">
									<div class="col-sm-12 col-md-6">

										<div class="col-sm-12 col-md-6">
										</div>
									</div>
									<div class="row">

										<div class="col-sm-12">

										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<h1>Today's Report</h1>
											<table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
												<thead>
													<tr role="row">
														<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sl No.: activate to sort column descending" style="width: 155.371px;">Sl No.</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Collection Code</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">HCF Code</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Category</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Department</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Ward</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Weight</th>
														<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Date Time</th>

														<!-- <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Action</th> -->
													</tr>
												</thead>
												<tbody>

													<?php
													$i = 1;
													foreach ($get_report as $row) {
													?>
														<tr class="odd">
															<th scope="row" class="sorting_1"><?php echo $i; ?></th>
															<td><?php echo $row['barcode'] ?> </td>
															<td><?php echo $row['organization_spl_code'] ?> </td>
															<td><?php echo $row['category'] ?> </td>
															<td><?php echo $row['department'] ?> </td>
															<td><?php echo $row['ward'] ?> </td>
															<td><?php echo $row['weight'] ?> </td>
															<td><?php echo $row['date_time'] ?> </td>

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

<script>
    function getWards() {
        var department = $("#department").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('index.php/Organization/fetch_ward') ?>',
            data: {
                [csrfName]: csrfHash,
                ['dept']: department
            },
            success: function(data) {
                $('#ward').html(data);
            }
        });
    }
</script>
