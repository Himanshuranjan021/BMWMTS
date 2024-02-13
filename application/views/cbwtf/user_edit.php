<?php
if (!isset($_SESSION['bmw_plant_id'])) {
	return redirect('index.php/Cbwtf');
} else {
	$admin_session = $_SESSION['bmw_plant_id'];
	$random = rand(102548, 984675);
	$date = date('Y-m-d');
?>



	<?php include('public/includes/cbwtf/headernav.php') ?>

	<style>
		input {
			border-top-style: hidden;
			border-right-style: hidden;
			border-left-style: hidden;
			border-bottom-style: hidden;
			background-color: #eee;
		}

		.no-outline:focus {
			outline: none;
		}
	</style>

	<section>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/cbwtf/sidenav.php') ?>
				</div>
				<div class="col-md-10" style="min-height:100vh;">

					<div class="row adm-cont p-t-40">

						<!-- <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/insert_register_staff" method="post" enctype="multipart/form-data"> -->
						<form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/cbwtf/cbwtf_user_edit/<?php echo $get_user_data['Id'] ?>" method="post" enctype="multipart/form-data" name="myform" onsubmit="return validation();">

							<h5>Register Staff Master</h5>

							<div class="row">
								<div class="col-md-6">

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="name">Name :</label></div>
											<div class="col-md-8">
												<input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $get_user_data['Name'] ?>" id="name" required>

											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('name'); ?>
											</div>

										</div>
									</div>




									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="email">Email:</label></div>
											<div class="col-md-8">
												<input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo $get_user_data['Email'] ?>" rows="2" required>
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('email'); ?>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="address">Address:</label></div>
											<div class="col-md-8">
												<input type="text" name="address" placeholder="Address" class="form-control" value="<?php echo $get_user_data['Address'] ?>" required>
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('address'); ?>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="image">Photo:</label></div>
											<div class="col-md-8">
												<input type="file" name="image" id="image" class="form-control" >
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('image'); ?>
											</div>

										</div>
									</div>




								</div>



								<div class="col-md-6">

								<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">*</span><label for="mobile">Mobile No:</label></div>
											<div class="col-md-8">
												<input type="number" class="form-control" name="mobile" placeholder="Mobile" id="mob" value="<?php echo $get_user_data['Mobile'] ?>" required>
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('mobile'); ?>
											</div>
										</div>
									</div>


								
									<div class="form-group">
										<div class="row">

											<div class="col-md-4"><span style="color:red">* </span><label for="designation">Designation:</label></div>
											<div class="col-md-8">
											 <input type="text" class="form-control" name="designation" required placeholder="Designation" value="<?php echo $get_user_data['Designation'] ?>">
												<!-- <select class="form-control" name="designation" required>
													<option value="">-Select-</option>
													<?php foreach ($get_designation_data as $row3) {

														if ($row3['remove'] == 1) {
														} else {


													?>

															<option value="<?php echo $row3['designation']; ?>">
														<?php
															echo $row3['designation'];
														}
													}

														?>
															</option>
												</select> -->
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('designation'); ?>
											</div>
										</div>
									</div>

									
									<!-- <div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="dob">DOB:</label></div>
											<div class="col-md-8"><input type="date" name="dob" class="form-control" id="dob" value="<?php echo set_value('dob'); ?>" required></div>
											<div class="text-danger ml-3">
												<?php echo form_error('dob'); ?>
											</div>
										</div>
									</div>



									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="doj">DOJ:</label></div>
											<div class="col-md-8"><input type="date" name="doj" class="form-control" placeholder="doj" id="doj" value="<?php echo set_value('doj'); ?>" required></div>
											<div class="text-danger ml-3">
												<?php echo form_error('doj'); ?>
											</div>
										</div>
									</div> -->


									<!-- <div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">*</span><label for="mobile">Vaccine:</label></div>
											<div class="col-md-8">
												<select class="form-control" name="Vaccine" required>
													<option value="">-Select-</option>
													<option value="Covishield">Covishield</option>
													<option value="Covaxin">Covaxin</option>
													<option value="Sputnik V">Sputnik V</option>
												</select>
											</div>
											<div class="text-danger ml-3">
												<?php echo form_error('Vaccine'); ?>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="doj">1st Dose:</label></div>
											<div class="col-md-8"><input type="date" name="1st_dose" class="form-control" placeholder="1st_dose" id="1st_dose" value="<?php echo set_value('1st_dose'); ?>" required></div>
											<div class="text-danger ml-3">
												<?php echo form_error('1st_dose'); ?>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><span style="color:red">* </span><label for="doj">2nd Dose:</label></div>
											<div class="col-md-8"><input type="date" name="2nd_dose" class="form-control" placeholder="2nd_dose" id="2nd_dose" value="<?php echo set_value('2nd_dose'); ?>" required></div>
											<div class="text-danger ml-3">
												<?php echo form_error('2nd_dose'); ?>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><label for="doj">Booster Dose:</label></div>
											<div class="col-md-8"><input type="date" name="booster" class="form-control" placeholder="booster" id="booster" value="<?php echo set_value('booster'); ?>"></div>
											<div class="text-danger ml-3">
												<?php echo form_error('booster'); ?>
											</div>
										</div>
									</div>


 -->



									<div class="form-group">
										<div class="row">
											<div class="col-md-4"><label for="remarks">Remarks:</label></div>
											<div class="col-md-8"><input type="remarks" class="form-control" placeholder="Remarks" id="remarks" name="remarks" value="<?php echo $get_user_data['Remark'] ?>"></div>
										</div>
									</div>




								</div>
							</div>

							<div class="row  p-t-40">
								<div class="col text-right">
									<button type="submit" class="btn btn-primary org-btn rounded">Submit</button>

								</div>
							</div>

							<?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							); ?>
							<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

						</form>
					</div>


			</div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>

   //Photograph Validation
    var img = document.forms['myform']['image'];
   
  //  var validExt = ["jpeg", "png", "jpg"];

    function validation() {
     
        if (img.value != '') {
       
            var img_ext = img.value.substring(img.value.lastIndexOf('.') + 1);
            
            if (img_ext === "jpg" || img_ext === "png"||img_ext === "jpeg" ){

              if (parseFloat(img.files[0].size/1024) > 200  || parseFloat(img.files[0].size/1024) < 10 ) {
                 
                 alert('Photograph file size should be between 10 to 200 kb.');
                 return false;
                 
               }
                
               
                   
            } else {
              
               alert('Photograph should be in JPG/PNG/JPEG.');
                    return false;
                
            }

        }
         else {

            //alert('No Candidate image Selected');
            return true;
         }

         return true;
    }
</script>
