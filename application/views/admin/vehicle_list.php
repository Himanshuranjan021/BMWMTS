<?php
if (!isset($_SESSION['bmw_email'])) {

	return redirect('index.php/admin');
} else {

	if (isset($get_district_dataa)) {
		extract($get_district_dataa);
	}

	$admin_session = $_SESSION['bmw_email'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>


	<?php include('public/includes/headernav.php') ?>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/sidenav.php') ?>
				</div>
				<div class="col-md-10" style="min-height:120vh;">

					<div class="row p-t-40">
						<div class="col">
							<h5>Records</h5>
							<table class="table table-striped table-bordered  " id="myTable">
								<thead>
									<tr>
										<th scope="col">Sl</th>
										<th scope="col">Vehicle Number</th>
										<th scope="col">Unique Id</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($get_vehicle_data as $row) { ?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $row['assetId']; ?></td>
											<td><?php echo $row['assetUid']; ?></td>

										</tr>
									<?php } ?>
								</tbody>
							</table>
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

<?php } ?>