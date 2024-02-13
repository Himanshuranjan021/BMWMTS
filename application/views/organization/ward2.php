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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 pl-0">
				<?php include('public/includes/organization/sidenav.php') ?>
			</div>
			<div class="col-md-10" style="height:120vh;">
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

				<div class="row adm-cont p-t-40">
				<form class="orgisation-m-frm" action="<?php echo base_url()?>index.php/organization/ward" method="post">
               <h5>Ward Master</h5>
              <div class="row">
                  <div class="col-md-6">
                   <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="department"> Department:</label>
                        </div>
                        <div class="col-md-9">
                       
                          <select class="form-control" name="department" required>
                          <option value="">-Select Department-</option>
                          <?php foreach($get_department_data as $row2) { 
                             if($row2['remove']==1)
                             {
           
                             }
                             else{
                            
                            
                            
                            
                            ?>
                          <option value="<?php echo $row2['dept_name']; ?>">
                          <?php
                            echo $row2['dept_name'];
                             }
                          }
                          
                          ?>
                          </option>
                        
                        </select>
                        <div class="text-danger ml-3">
										<?php echo form_error('department') ?>
										</div>
                      
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3"><label for="name">Ward Name:</label></div>
                        <div class="col-md-9"><input type="text" class="form-control" placeholder="Ward Name" id="wordname" name="ward_name" required ></div>

                        <div class="text-danger ml-3">
										<?php echo form_error('ward_name') ?>
										</div>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="row">
                        <div class="col-md-3"><label for="name">Remarks :</label></div>
                        <div class="col-md-9"><input type="text"  class="form-control" placeholder="Remarks" id="remarks" name="remarks"></div>
                      </div>
                    </div>
                 </div>
              </div>  
             
             <div class="row  p-t-40">      
                <div class="col text-right">
                 <button type="submit" class="btn btn-primary org-btn">Submit</button>
                 
                </div>
             </div> 
             	
						<?php    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash());?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
              
           </form>

		   <div class="row p-t-40 ">
          <div class="col">
           
           <table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
           <thead>
                <tr role="row"><th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 101.602px;">ID</th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label=" Name: activate to sort column ascending" style="width: 136.113px;"> Department</th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Description : activate to sort column ascending" style="width: 211.855px;">Ward Name </th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Description : activate to sort column ascending" style="width: 211.855px;">Remarks </th>

                <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action : activate to sort column ascending" style="width: 314.18px;">Action </th>
              </tr>
              </thead>
              <tbody>
                <?php 
                $i=1;
                foreach($get_ward_data as $row1){
                  if($row1['remove']==1)
									{

									}
									else{

               ?>
                <tr class="odd"><th scope="row" class="sorting_1"> <?php echo $i; ?></th>
                  <td ><?php echo $row1['department'] ?></td>
                  <td ><?php echo $row1['ward_name'] ?></td>
                  <td ><?php echo $row1['remarks'] ?></td>
                  <td>
                  <a href="<?php echo base_url('index.php/organization/ward_edit/').$row1['id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">&#9998;</button></a>

                  <a href="<?php echo base_url('index.php/organization/ward_delete/').$row1['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style='display:none'>Delete</button></a>

                  <a href="<?php echo base_url('index.php/organization/ward_remove/').$row1['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>



          
                  </td>
                </tr>
            </tbody>
                <?php  $i++; }
              } ?>

           </table>
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