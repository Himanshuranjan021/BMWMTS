<?php

if (!isset($_SESSION['bmw_email'])) {

	return redirect('index.php/admin');
} else {
	$admin_session = $_SESSION['bmw_email'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>

	<style>
		table {
			border-collapse: collapse;
			border: 1px solid black;
		}

		tr {
			border: 1px solid black;
		}

		td {
			border: 1px solid black;
		}
	</style>


	<?php include('public/includes/headernav.php') ?>

	<section>
		<div class="container-fluid">
			<div class="row" style="min-height: 100vh;">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/sidenav.php') ?>
				</div>
				<div class="col-md-9">

					<div class="adm-cont p-t-40">
						<h2>Today Report</h2>
						<div class="row p-t-40" style="overflow-x:auto;">

							<table class="table table-bordered table-responsive" width="100%" id="myTable">
								<!-- <thead> -->
								<tr style="background: #193d73;color: #fff;">
									<td width="4%">
										<p>S.No</p>
									</td>
									<td width="5%">
										<p>HCF With Address</p>
									</td>
									<td width="4%">
										<p>Type Of HCf</p>
									</td>
									<td colspan="9" width="38%">
										Details Of Bio Medical Generated By HCF (Qty. Of BMW in K.g)
									</td>
									<td colspan="9" width="39%">
										Details Of Bio Medical Received By CBWTF (Qty. Of BMW in K.g)
									</td>
									<td width="7%">
										<p>Difference(Qty. in K.g)</p>
									</td>
								</tr>
								<tr>
									<td width="4%">

									</td>
									<td width="5%">

									</td>
									<td width="4%">

									</td>
									<td rowspan="2" width="8%">
										Date Time
									</td>
									<td colspan="2" width="9%">
										<p>Yellow</p>
									</td>
									<td colspan="2" width="9%">
										<p>Red</p>
									</td>
									<td colspan="2" width="9%">
										<p>White</p>
									</td>
									<td colspan="2" width="9%">
										<p>Blue</p>
									</td>
									<td width="8%">
										Date Time
									</td>
									<td colspan="2" width="7%">
										<p>Yellow</p>
									</td>
									<td colspan="2" width="7%">
										<p>Red</p>
									</td>
									<td colspan="2" width="7%">
										<p>White</p>
									</td>
									<td colspan="2" width="8%">
										<p>Blue</p>
									</td>
									<td width="7%">

									</td>
								</tr>
								<tr>
									<td width="4%">

									</td>
									<td width="5%">

									</td>
									<td width="4%">

									</td>
									<td width="4%">
										<p>No. of Bags</p>
									</td>
									<td width="3%">
										<p>Qnt.</p>
									</td>
									<td width="4%">
										<p>No. of Bags</p>
									</td>
									<td width="3%">
										<p>Qnt</p>
									</td>
									<td width="4%">
										<p>No. of Bags</p>
									</td>
									<td width="3%">
										<p>Qnt</p>
									</td>
									<td width="4%">
										<p>No. of Bags</p>
									</td>
									<td width="3%">
										<p>Qnt</p>
									</td>
									<td width="4%">
										<p>&nbsp;</p>
									</td>

									<td width="4%">
										<p>No. of Bags</p>
									</td>
									<td width="3%">
										<p>Qnt</p>
									</td>
									<td width="4%">
										<p>No. of Bags</p>
									</td>
									<td width="3%">
										<p>Qnt</p>
									</td>
									<td width="4%">
										<p>No. of Bags</p>
									</td>
									<td width="3%">
										<p>Qnt</p>
									</td>
									<td width="4%">
										<p>No. of Bags</p>
									</td>
									<td width="4%">
										<p>Qnt</p>
									</td>

								</tr>
								<!-- </thead> -->


								<!-- <tbody> -->
								<?php
								$i = 1;
								foreach ($get_pdf_data as $row) {
								?>
									<tr>
										<td width="4%">
											<?php echo $i; ?>
										</td>
										<td width="5%">
											<p><?php echo $row['org_name'] . ',<br>' . $row['address']; ?></p>
										</td>
										<td width="4%">
											<p><?php echo $row['medical_type']; ?></p>
										</td>
										<td width="4%">
											<?php echo $row['collection_date']; ?>
										</td>
										<?php  ?>
										<td width="4%">
											<?php
											echo $row['yellow_count'];
											?>
										</td>
										<td width="4%">
											<?php
											echo round($row['yellow_weight'], 2);
											?>
										</td>
										<td width="3%">
											<?php
											echo $row['red_count'];
											?>
										</td>
										<td width="4%">
											<?php
											echo round($row['red_weight'], 2);
											?>
										</td>

										<td width="3%">
											<?php
											echo $row['white_count'];
											?>
											<!-- <td width="4%"> -->

										</td>
										<td width="3%">
											<?php
											echo round($row['white_weight'], 2);
											?>
										</td>
										<td width="4%">
											<?php
											echo $row['blue_count'];
											?>
										</td>
										<td width="3%">
											<?php
											echo round($row['blue_weight'], 2);
											?>
										</td>
										<td width="4%">
											<?php
											if ($row['treatment_date'] == 0) {
												echo "Pending";
											} else {
												echo $row['treatment_date'];
											}

											?>
										</td>
										<td width="4%">
											<?php
											echo $row['yellow_count2'];
											?>
										</td>
										<td width="4%">
											<?php
											echo round($row['yellow_weight2'], 2);
											?>
										</td>
										<td width="3%">
											<?php
											echo $row['red_count2'];
											?>
										</td>
										<td width="4%">
											<?php
											echo round($row['red_weight2'], 2);
											?>
										</td>
										<td width="3%">
											<?php
											echo $row['white_count2'];
											?>
										</td>
										<td width="4%">
											<?php
											echo round($row['white_weight2'], 2);
											?>
										</td>
										<td width="3%">
											<?php
											echo $row['blue_count2'];
											?>
										</td>
										<td width="4%">
											<?php
											echo $row['blue_weight2'];
											?>
										</td>
										<td width="4%">
											<?php
											echo round($row['weight1'] - $row['weight2'], 2);
											?>
										</td>

									</tr>


								<?php
									$i++;
								}
								?>
								<!-- </tbody> -->
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

	</section>

	<footer class="footer">
		<?php include('public/includes/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->
<?php }
?>