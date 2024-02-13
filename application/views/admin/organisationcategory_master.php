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
				<div class="col-md-10" style="height:120vh;">
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

						<div class="row adm-cont p-t-40">

							<form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="organisation" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
								<h5>HCF Category Master</h5>

								<div class="row">
									<div class="col-md-6">

										<div class="form-group">
											<div class="row">
												<div class="col-md-3"><label for="Statename">Name:</label></div>
												<div class="col-md-9">
													<input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Enter Category Name" required>
												</div>
												<div class="text-danger ml-4"> <?php echo form_error('cat_name'); ?> </div>
											</div>
										</div>



									</div>

									<div class="col-md-6">

										<div class="form-group">
											<div class="row">
												<div class="col-md-3"><label for="Category Name">Description:</label></div>
												<div class="col-md-9"><textarea type="textarea" class="form-control" placeholder="Put your notes Here...." id="note" name="note"></textarea></div>
											</div>
											<div class="text-danger ml-4"> <?php echo form_error('note'); ?> </div>
										</div>
									</div>
								</div>


								<div class="row  p-t-20" style="float: right;">
									<div class="col text-right">
										<button type="submit" class="btn btn-primary">Submit</button>
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
								<h5>Records</h5>
								<table class="table table-striped table-bordered  " id="myTable">
									<thead>
										<tr>
											<th scope="col">Sl</th>
											<th scope="col">Ctaegory Name</th>
											<th scope="col">Description</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										foreach ($get_org_cat as $row) {

											if ($row['remove'] == 1) {
											} else {
										?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $row['name']; ?></td>
													<td><?php echo $row['note']; ?></td>
													<td>
														<a href="<?php echo site_url('index.php/admin/org_cat_edit/') . $row['id']; ?>" class="btn btn-primary org-btn rounded">&#9998; </a>
														<a href="<?php echo site_url('index.php/admin/org_cat_delete/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" Style="display:none">Delete</a>
														<a href="<?php echo site_url('index.php/admin/org_cat_remove/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</a>
													</td>
												</tr>
										<?php $i++;
											}
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