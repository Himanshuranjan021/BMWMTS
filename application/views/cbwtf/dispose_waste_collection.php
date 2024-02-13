<?php
if (!isset($_SESSION['bmw_plant_id'])) {
	return redirect('index.php/Cbwtf');
} else {
	$admin_session = $_SESSION['bmw_plant_id'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>


	<?php include('public/includes/cbwtf/headernav.php') ?>

	<section>
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-md-2" style="min-height:100vh;">
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
           
          <?php } else {} ?>

          <?php if ($this->session->flashdata('error')) { ?>
          
              <div class="alert alert-danger alert-white rounded alertrsize">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-check"></i></div>
                <p><?php echo $data1 = $this->session->flashdata('error');  ?></p>
              </div>
          <?php } else {} ?>
		  </div>
		        <div class=" adm-cont p-t-40">
					<form action="<?php echo base_url('index.php/cbwtf/dispose_waste_collection') ?>" method="post">
							<h2>Treatment & Disposal of Waste Collection</h2>
							<div class="text-danger">
								<?php echo validation_errors(); ?>
							</div>
							<div class="row p-t-40">
								<div class="col">
									<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
										<div class="row">
											<div class="form-group">
												<div class="row">
											


											<div class="col-sm-12 col-md-6">

												<div class="col-sm-12 col-md-6">

												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
														<thead>
															<tr role="row">
																<th width="2%"><input type="checkbox" id="checkAl"> Select All</th>
																<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sl No.: activate to sort column descending" style="width: 155.371px;">Sl No.</th>
																<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;"> Barcode</th>
																<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Category</th>

																<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Weight: activate to sort column ascending" style="width: 175.859px;">Weight</th>
																<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Date Time</th>

																<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">HCF</th>
																<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 215.938px;">Vehicle Number</th>
															</tr>
														</thead>
														<tbody>

															<?php
															$i = 1;
															foreach ($get_waste_data as $row) {



															?>
																<tr class="odd">
																	<td><input type="checkbox" name="dispose[]" id="checkItem" class="rowcheck" value="<?php echo $row['treatment_code']; ?>" /></td>
																	<th scope="row" class="sorting_1"><?php echo $i; ?></th>



																	<td onselectstart="return false"><?php echo $row['treatment_code'] ?> </td>

																	<td><?php echo $row['waste_category'] ?> </td>

																	<td><?php echo $row['weight'] ?> </td>
																	<td><?php echo $row['date_time'] ?> </td>
																	<td> <?php echo $row['org_name'] ?></td>

																	<td>
																		<?php echo $row['vc_no'] ?>

																	</td>
																</tr>

															<?php $i++;
															} ?>
														</tbody>
													</table>
													<?php $csrf = array(
														'name' => $this->security->get_csrf_token_name(),
														'hash' => $this->security->get_csrf_hash()
													); ?>
													<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />



												</div>
												<div class="col-md-12">
												<div class="col-md-3 pt-5">
														<label for="department">Disposal Method:</label>
													</div>
													<div class="col-md-9">

														<select class="form-control" name="method" required>
															<option value="">-Select-</option>
															<?php

															foreach ($methods as $row2) {  ?>
																<option value="<?php echo $row2['name']; ?>">
																<?php
																echo $row2['name'];
															}
																?>
																</option>

														</select>
													</div>
													<div class="text-danger ml-2"><?php echo form_error('plant_name'); ?></div>
												</div>
														</div>

													<div class="row  p-t-40">
														<div class="col text-right">
															<button type="submit" id="submit" class="btn btn-primary org-btn">Submit</button>

														</div>
													</div>
												</div>

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>

					</form>

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


<script type="text/javascript">
	$(document).ready(function() {
		$("#checkAl").click(function() {
			$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>