<?php
if (!isset($_SESSION['bmw_org_id'])) {
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
            <div class="col-md-10">

                <div class="row adm-cont p-t-40">

                    <form class="orgisation-m-frm"
                        action="<?php echo base_url() ?>index.php/organization/update_staff_access/<?php echo $get_staff_access_data['id']?>"
                        method="post">
                        <h5>Employee Access</h5>
                        <div class="row float-md-right">
                            <div> <a href="#"><img class="org-rset" src="img/reset.png"></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               


                                <div class="row mt-2">
                                    <div class="col-md-3"><label for="Statename">UserName:</label></div>
                                    <div class="col-md-9"><input type="name" name="username" class="form-control"
                                            placeholder="Enter username" id="username"
                                            value="<?php echo $get_staff_access_data['Username'] ?>" required></div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3"><label for="Statename">Status:</label></div>
                                    <div class="col-md-9">

                                        <div class="form-group row">

                                            <div class="col-md-9">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="status" value="Active"
                                                        class="custom-control-input" checked="checked">
                                                    <label class="custom-control-label"
                                                        for="customRadio1">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="status" value="Inactive"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="customRadio2">Inactive</label>
                                                </div>

                                            </div>
                                        </div>

                                        <input type="hidden" value=" <?php echo $get_staff_access_data['id'] ?>">

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                               

                                <div class="row mt-2">
                                    <div class="col-md-3"><label for="password">Password:</label></div>
                                    <div class="col-md-9"><input type="text" name="password" class="form-control"
                                            placeholder="Enter Password" id="password" required></div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3"><label for="text">Confirm Password:</label></div>
                                    <div class="col-md-9"><input type="password" name="Cpassword" class="form-control"
                                            placeholder="Enter Password" id="Cpassword" required></div>
                                </div>
                                <div>

                                    <p class="text-info"> <?php  echo  "Password must be  8 Characters and should Contain Capital Letter,
                                        Small Letter  & Number with a special Character[@,%,#]"; ?></p>



                                </div>

                                <div class="row  p-t-40">
                                    <div class="col text-right">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary org-btn rounded">Update</button>

                                    </div>
                                </div>
                            </div>
                    </form>


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


<script>
function validatePassword() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("Cpassword").value;
    pass1 != pass2 ? document.getElementById("Cpassword").setCustomValidity("Passwords don't Match") : document
        .getElementById("Cpassword").setCustomValidity('');
    //pass1.length > 7 ? document.getElementById("password").setCustomValidity("") : document.getElementById("password").setCustomValidity(' Minimun 8 character');

    pass1.match(/[a-z]/g) && pass1.match(/[A-Z]/g) && pass1.match(/[0-9]/g) && pass1.length > 7 ? document
        .getElementById("password").setCustomValidity("") : document.getElementById("password").setCustomValidity(
            'Enter a valid a password ');

}
document.getElementsByName("submit")[0].onclick = validatePassword;
</script>