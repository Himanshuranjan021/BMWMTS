<?php
 if(!isset($_SESSION['bmw_org_id'])){
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
			<div class="col-md-3">
				<?php include('public/includes/organization/sidenav.php') ?>
			</div>
			<div class="col-md-9" style="height:120vh;">
				<div class="row adm-cont p-t-40">
					 <form class="orgisation-m-frm" action="<?php echo base_url()?>index.php/organization/department_edit/<?php echo $get_department_data['id'] ;?>" method="post">
						<h5>Department Master Edit</h5>
						
						<div class="row">
							

							<div class="col-md-6">

								<div class="form-group">
									<div class="row">
										<div class="col-md-4"><span class="text-danger">*</span><label for="Distname">Department:</label></div>
										<div class="col-md-8"><input type="name" class="form-control"  id="Statename" name="dept_name" value="<?php echo $get_department_data['dept_name'] ;?>" autocomplete="off" required></div>
										<div class="text-danger ml-3">
										<?php echo form_error('dept_name') ?>
										</div>
									</div>
								</div>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<div class="row">
										<div class="col-md-4"><label for="Statename">Description:</label></div>
										<div class="col-md-8"><input type="name" class="form-control" placeholder="Enter Desc..." id="Statename" name="desc" value="<?php echo $get_department_data['desc'] ;?>" autocomplete="off" required></div>
									</div>
								</div>

							</div>

							 <div class="col-md-6">
                  
              
                    
                    
                 </div> 
						</div>

						<div class="row  p-t-40">
							<div class="col text-right">
							<a href="<?php echo base_url()?>index.php/organization/department"> 
                    <input type="button" value="Cancel" class="btn btn-warning" />
                    </a>
								<button type="submit" class="btn btn-primary org-btn rounded">Update</button>
								
							</div>
						</div>

						
						<?php    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash());?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

					</form> 
				</div> 

				<!-- <div class="row p-t-40 ">
					<div class="col">

						<table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
							<thead>
								<tr role="row">
									<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 101.602px;">ID</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label=" Name: activate to sort column ascending" style="width: 136.113px;" > Name</th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Description : activate to sort column ascending" style="width: 211.855px;">Designation </th>
									<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action : activate to sort column ascending" style="width: 314.18px;">Action </th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($get_department_data as $row){
										//var_dump($row);
									?>
								
								<tr class="odd">
									<th scope="row" class="sorting_1"><?php echo $row['id'] ?></th>
									<td ><?php echo $row['dept_name'] ?></td>
									<td ><?php echo $row['designation'] ?></td>
									<td >
										<a href="<?php echo base_url('index.php/organization/department_edit/').$row['id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">Edit</button></a>

										<a href="<?php echo base_url('index.php/organization/department_delete/').$row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded">Delete</button></a>
										
									</td>
								</tr>
								<?php } 
									?>
							</tbody>
						</table>
					</div>
				</div> -->

			</div>
		</div>
	</div>
</section>
<footer class="footer">
	<?php include('public/includes/organization/footer.php'); ?>
</footer>

<?php } ?>