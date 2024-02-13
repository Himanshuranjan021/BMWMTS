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
            <div class="row adm-cont p-t-40">
            <form class="orgisation-m-frm" action="<?php echo base_url()?>index.php/organization/designation_edit/<?php echo $get_designation_data['id'];?>" method="post">
               <h5>Designation Master</h5>
              
              <div class="row">
                <div class="col-md-6">
                
                  

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4"><span class="text-danger">*</span>
                          <label for="Distname">Designation:</label></div>
                        <div class="col-md-8"><input type="text" class="form-control"  id="designation" name="designation" value="<?php echo $get_designation_data['designation'] ?>" required></div>
                        <div class="text-danger ml-3">
										<?php echo form_error('designation') ?>
										</div>
                      </div>
                    </div>

                    
                   
                    

                    
                 </div>
                 
                  <div class="col-md-6">
                  
                  <div class="form-group">
                      <div class="row">
                        <div class="col-md-4"><label for="Statename">Description:</label></div>
                        <div class="col-md-8"><input type="text" class="form-control"  id="description" name="description" value="<?php echo $get_designation_data['description'] ?>" required></div>
                      </div>
                    </div>
                    
                 </div>
                 
                 
              </div>  
             
             <div class="row  p-t-40">      
                <div class="col text-right">
                <a href="<?php echo base_url()?>index.php/organization/designation"> 
                    <input type="button" value="Cancel" class="btn btn-warning" />
                    </a>
                 <button type="submit" class="btn btn-primary org-btn rounded">Update</button>
                 <!-- <button type="submit" class="btn btn-danger org-btn rounded">Cancel</button> -->
                </div>
             </div> 

             	
						<?php    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash());?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
             
           </form>
          </div>

          
           
          
    </div>
        </div>
    </div>
</section>
<footer class="footer">
	<?php include('public/includes/organization/footer.php'); ?>
</footer>

<?php } ?>