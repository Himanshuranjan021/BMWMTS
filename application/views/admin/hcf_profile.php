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

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/sidenav.php') ?>
				</div>
				<div class="col-md-10 pt-5" style="min-height:100vh;">

					<div class="row" style="overflow-x:auto;">

						<table class="table table-striped table-bordered table-responsive dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
							<thead>
								<tr role="row">
									<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 12.5px;">HCF</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">CTO Valid Upto</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 50.0273px;">CTO Applied On</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 35.1172px;">CTO Document</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 44.9414px;">Authorization Valid Upto</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 77.4219px;">Authorization Applied On</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 76.6211px;">Authorization Document</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Dob: activate to sort column ascending" style="width: 26.6992px;">Aggrement With Cbwtf/OS Valid Upto</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">Aggrement Details</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Dob: activate to sort column ascending" style="width: 26.6992px;">Bed Strength</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of Deep burials</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Dob: activate to sort column ascending" style="width: 26.6992px;">No. of Sharp Pits</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of Autoclaves</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of Shredder</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of NST/HUB</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of ETP</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of STP</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">No. of LMW</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">Remarks</th>
									
								</tr>
							</thead>
							<tbody>

								<?php
								$i = 1;
								foreach ($get_profile_data as $row) { ?>

									<tr class="odd">
										<td align="center"> <?php echo $row['organization_name']; ?> </td>
										<td align="center"> <?php echo $row['cto']; ?> </td>
										<td align="center"> <?php echo $row['cto_applied']; ?> </td>
										<td align="center"> <a href="<?php echo base_url(); ?>public/uploads/HCF_DOC/<?php echo $row['cto_details']; ?>" style="width:100%;"> view</a> </td>
										<td align="center"><?php echo $row['authorization']; ?></td>
										<td align="center"><?php echo $row['auth_applied']; ?></td>
										<td align="center"> <a href="<?php echo base_url(); ?>public/uploads/HCF_DOC/<?php echo $row['auth_details']; ?>" style="width:100%;"> view</a> </td>
										<td align="center"><?php echo $row['aggrement']; ?></td>
										<td align="center"> <a href="<?php echo base_url(); ?>public/uploads/HCF_DOC/<?php echo $row['aggrement_details']; ?>" style="width:100%;"> view</a> </td>
										<td align="center"><?php echo $row['strength']; ?></td>
										<td align="center"><?php echo $row['deep_burial']; ?></td>
										<td align="center"><?php echo $row['sharp_pit']; ?></td>
										<td align="center"><?php echo $row['autoclave']; ?></td>
										<td align="center"><?php echo $row['shredder']; ?></td>
										<td align="center"><?php echo $row['nst']; ?></td>
										<td align="center"><?php echo $row['etp']; ?></td>
										<td align="center"><?php echo $row['stp']; ?></td>
										<td align="center"><?php echo $row['lmw']; ?></td>
										<td align="center"><?php echo $row['remarks']; ?></td>

										
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

	</section>

	<footer class="footer">
		<?php include('public/includes/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->

<?php } ?>