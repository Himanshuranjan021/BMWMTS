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
				<form class="orgisation-m-frm" action="<?php echo base_url()?>index.php/organization/designation" method="post">
               <h5>Designation Master</h5>
              
              <div class="row">
                <div class="col-md-6">
                
                  

                    
                    <div class="form-group">
                      <div class="row">
                      <div class="col-md-4"><span class="text-danger">*</span>
                        <label for="Designation">Designation:</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" placeholder="Enter Designation..." id="designation" name="designation" required ></div>
                        <div class="text-danger ml-3">
										<?php echo form_error('designation') ?>
										</div>
                      </div>
                    </div>
                    

                    
                 </div>
                 
                  <div class="col-md-6">
                  
                   <div class="form-group">
                      <div class="row">
                      <div class="col-md-4"><label for="Description">Description:</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" placeholder="Enter Desc..." id="description" name="description" ></div>
                       
                      </div>
                    </div>
                    
                 </div>
                 
                 
              </div>  
             
             <div class="row  p-t-40">      
                <div class="col text-right">
                 <button type="submit" class="btn btn-primary org-btn rounded">Submit</button>
                
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
                <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label=" Name: activate to sort column ascending" style="width: 136.113px;"> Designation</th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Description : activate to sort column ascending" style="width: 211.855px;">Description </th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action : activate to sort column ascending" style="width: 314.18px;">Action </th></tr>
              </thead>
              <tbody>
              <?php
               $i = 1;
									foreach($get_designation_data as $row){
                    if($row['remove']==1)
									{

									}
									else{
										
									?>
               
                <tr class="odd"><th scope="row" class="sorting_1"><?php echo $i ?></th>
                  <td ><?php echo $row['designation'] ?></td>
                  <td ><?php echo $row['description'] ?></td>
                  <td>
                  <a href="<?php echo base_url('index.php/organization/designation_edit/').$row['id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">&#9998;</button></a>

                  <a href="<?php echo base_url('index.php/organization/designation_delete/').$row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style="display:none">Delete</button></a>
                  <a href="<?php echo base_url('index.php/organization/designation_remove/').$row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>
                   
                  </td>
                </tr>
                <?php $i++; }
                 } 
									?>
            </tbody>
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