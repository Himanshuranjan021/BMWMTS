<?php
if (!isset($_SESSION['bmw_user_id'])) {
	return redirect('index.php/user');
 } else {
	$admin_session = $_SESSION['bmw_user_id'];
 	$random = rand(102548, 984675);
 	$date = date('Y-m-d');
?>

<?php
echo $error = isset($error)? $error :'';
?>



	<?php include('public/includes/user/headernav.php') ?>

	<section>
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-md-2" style="min-height:100vh;">
					<?php include('public/includes/user/sidenav.php') ?>
				</div>
				<div class="col-md-10">

					<div class="row adm-cont p-t-40">

						<form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="<?php echo base_url()?>index.php/user/change_password2" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
							<h5> Change User Password</h5>

							<div class="row">
							

								<div class="col-md-6">

									<div class="form-group">
										<div class="row">
											 <div class="col-md-3">
                         <label for="Plant_name">Old Password:</label>
                        </div>
											<div class="col-md-9">
                      <input type="text" class="form-control" placeholder="Old Password" name="old_password" id="oldpassword">
												
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="name">Password:</label></div>
											<div class="col-md-9"><input type="text" class="form-control" placeholder="New Password" name="new_password" id="password"></div>
										</div>
									</div>
								

									
								</div>
								<div class="col-md-6">


							
									

									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label for="name">Confirm Password:</label></div>
											<div class="col-md-9"><input type="text" class="form-control" placeholder=" Confirm Password" name="Cpassword" id="Cpassword"></div>
											<p class="text-warning"> <?php  echo  "Password must be  8 Characters and should Contain Capital Letter,
                                             Small Letter  and a Number with a special Character[@,%,#]"; ?></p>

										</div>
									</div>

									



								</div>
							</div>


							<div class="row  p-t-20" style="float: right;">
								<div class="col text-right">
								<a href="<?php echo base_url()?>index.php/user/dashboard"> 
                    <input type="button" value="Cancel" class="btn btn-warning" />
                    </a>
									<button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
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
		<?php include('public/includes/user/footer.php'); ?>
	</footer>


	<!-- wrapper Ends -->

 <?php } ?> 
<script>
	function validatePassword() {
		var pass1 = document.getElementById("password").value;
		var pass2 = document.getElementById("Cpassword").value;
		pass1 != pass2 ? document.getElementById("Cpassword").setCustomValidity("Password doesn't Match") : document.getElementById("Cpassword").setCustomValidity('');
		//pass1.length > 7 ? document.getElementById("password").setCustomValidity("") : document.getElementById("password").setCustomValidity('Enter a valid a password Minimun length 8 character');

		pass1.match(/[a-z]/g) && pass1.match(/[A-Z]/g) && pass1.match(/[0-9]/g) && pass1.length > 7 ? document.getElementById("password").setCustomValidity("") : document.getElementById("password").setCustomValidity('Enter a valid a password ');

	}

	document.getElementsByName("submit")[0].onclick = validatePassword;
</script>