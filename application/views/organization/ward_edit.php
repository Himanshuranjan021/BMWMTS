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
			<div class="col-md-2">
				<?php include('public/includes/organization/sidenav.php') ?>
			</div>
			<div class="col-md-10" style="height:120vh;">
            <div class="row adm-cont p-t-40">
           

               <form class="orgisation-m-frm" action="<?php echo base_url()?>index.php/organization/ward_edit/<?php echo $get_ward_data['id'] ;?>" method="post">
               <h5>Ward Master</h5>
              
              <div class="row">
              
                 
                  <div class="col-md-6">
              
                

                   <div class="form-group">
                      <div class="row">
                        <div class="col-md-3"><label for="department">Select Department:</label></div>
                        <div class="col-md-9">
                        
                          <select class="form-control" name="department" required>
                          <option value="<?php echo $get_ward_data['department'] ;?>"> <?php echo $get_ward_data['department'] ;?></option>
                          <option value="">-Select-</option>
                          <?php foreach($get_department_data as $row2) { 
                             if($row2['remove']==1)
                             {
           
                             }
                             else{
                            
                            
                            
                            ?>
                          <option value="<?php echo $row2['dept_name']; ?>">
                          <?php
                            echo $row2['dept_name']; }
                          }
                          
                          ?>

                          </option>
                        
                        </select></div>
                        <div class="text-danger ml-3">
										<?php echo form_error('department') ?>
										</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3"><label for="name">Ward Name:</label></div>
                        <div class="col-md-9"><input type="text" class="form-control"  id="wardname" name="ward_name" value = "<?php echo $get_ward_data['ward_name'] ;?>" required ></div>
                        <div class="text-danger ml-3">
										<?php echo form_error('ward_name') ?>
										</div>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="row">
                        <div class="col-md-3"><label for="name">Remarks :</label></div>
                        <div class="col-md-9"><input type="text"  class="form-control"  id="ph" name="remarks" value = "<?php echo $get_ward_data['remarks'] ;?>" ></div>
                      </div>
                    </div>
                 </div>
              </div>  
             
             <div class="row  p-t-40">      
                <div class="col text-right">
                <a href="<?php echo base_url()?>index.php/organization/ward"> 
                    <input type="button" value="Cancel" class="btn btn-warning" />
                    </a>
                 <button type="submit" class="btn btn-primary org-btn">Update</button>
                
                </div>
             </div> 


             <?php    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash());?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
              
           </form>

           <footer class="footer">
	<?php include('public/includes/organization/footer.php'); ?>
</footer>
            

           
          </div>
          </div>
           
    </div>
        </div>
    </div>
</section>

<?php } ?>