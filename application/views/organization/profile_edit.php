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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 pl-0">
                    <?php include('public/includes/organization/sidenav.php') ?>
                </div>
                <div class="col-md-10" style="min-height:100vh;">



                    <div class="row adm-cont p-t-40 mt-5">

                        <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/edit_profile/<?php echo $get_profile_data['id'] ?>" method="post" enctype="multipart/form-data" name="myform" onsubmit="return !!(validation() & validation2() & validation3() );">

                            <h5>HCF Profile Details</h5>
                            <?php //echo validation_errors(); 
                            ?>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="mobile">CTO Valid Upto:</label></div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" name="cto" placeholder="Mobile" id="mob" value="<?php echo $get_profile_data['cto']; ?>" required>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('cto'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="mobile">If Not Valid, Date of application::</label></div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" name="cto_applied" placeholder="Mobile" id="mob" value="<?php echo $get_profile_data['cto_applied']; ?>">
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('cto_applied'); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><span style="color:red">* </span><label for="image">CTO Details:</label></div>
                                            <div class="col-md-8">
                                                <input type="file" name="cto_details" id="cto_details" class="form-control">
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('cto_details'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="mobile">Authorization Valid Upto:</label></div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" name="authorization" placeholder="Mobile" id="authorization" value="<?php echo $get_profile_data['authorization']; ?>">
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('authorization'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="mobile">If Not Valid, Date of application::</label></div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" name="auth_applied" placeholder="Mobile" id="mob" value="<?php echo $get_profile_data['auth_applied'];; ?>">
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('auth_applied'); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><span style="color:red">*</span><label for="authorization">Auth. Details:</label></div>
                                            <div class="col-md-8">
                                                <input type="file" name="auth_details" id="authorization" class="form-control">
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('auth_details'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="mobile">Aggrement With CBWTF/OS Valid Upto:</label></div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" name="aggrement" placeholder="Mobile" id="aggrement" value="<?php echo $get_profile_data['aggrement'];; ?>">
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('aggrement'); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><span style="color:red">*</span><label for="authorization">Aggre. Details:</label></div>
                                            <div class="col-md-8">
                                                <input type="file" name="aggrement_details" id="authorization" class="form-control">
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('aggrement_details'); ?>
                                            </div>

                                        </div>
                                    </div>


                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><span style="color:red">* </span><label for="name">Bed Strength :</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="strength" class="form-control" placeholder="Bed Strength" value="<?php echo $get_profile_data['strength']; ?>" id="strength" required>

                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('strength'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="name">No. of Deep Burial Pits:</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="deep_burial" class="form-control" placeholder="No. of Deep Burial Pits available" value="<?php echo $get_profile_data['deep_burial']; ?>" id="strength" required>

                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('deep_burial'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="name">No. of Sharp Pits:</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="sharp_pit" class="form-control" placeholder="No. of Sharp Pits available" value="<?php echo $get_profile_data['sharp_pit']; ?>" id="strength" required>

                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('sharp_pit'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="name">No. of Autoclave:</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="autoclave" class="form-control" placeholder="No. of Autoclave available" value="<?php echo $get_profile_data['autoclave']; ?>" id="strength" required>

                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('autoclave'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="name">No. of Shredder:</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="shredder" class="form-control" placeholder="No. of Shredder available" value="<?php echo $get_profile_data['shredder']; ?>" id="strength" required>

                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('shredder'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="name">No. of NST/Hub Cutter:</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="nst" class="form-control" placeholder="No. of NST/Hub Cutter available" value="<?php echo $get_profile_data['nst'];; ?>" id="strength" required>

                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('nst'); ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="name">No. of ETP(With Capacity):</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="etp" class="form-control" placeholder="No. of ETP available" value="<?php echo $get_profile_data['etp']; ?>" id="strength" required>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('etp'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="name">No. of STP(With Capacity):</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="stp" class="form-control" placeholder="No. of STP available" value="<?php echo $get_profile_data['stp']; ?>" id="strength" required>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('stp'); ?>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="name">No. of LWM:</label></div>
                                            <div class="col-md-8">
                                                <input type="number" name="lmw" class="form-control" placeholder="No. of LMW available" value="<?php echo $get_profile_data['lmw']; ?>" id="strength" required>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('lmw'); ?>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><label for="remarks">Remarks:</label></div>
                                            <div class="col-md-8"><input type="remarks" class="form-control" placeholder="Remarks" id="remarks" name="remarks" value="<?php echo $get_profile_data['remarks'];; ?>"></div>
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
        <?php include('public/includes/organization/footer.php'); ?>
    </footer>


    <!-- wrapper Ends -->
<?php }
?>


<script>
    //Photograph Validation

    var img = document.forms['myform']['cto_details'];

    function validation() {

        if (img.value != '') {

            var img_ext = img.value.substring(img.value.lastIndexOf('.') + 1);

            if (img_ext === "pdf" || img_ext === "PDF") {

                if (parseFloat(img.files[0].size / 1024) > 2000 || parseFloat(img.files[0].size / 1024) < 10) {

                    alert('CTO Details File size should be between 10KB to 2 MB.');
                    return false;

                }



            } else {

                alert('CTO Details File should be in PDF.');
                return false;

            }

        } else {

            // alert('Please upload CTO Details');
            return true;
        }

        return true;
    }



    //Photograph Validation

    var img2 = document.forms['myform']['auth_details'];

    function validation2() {

        if (img2.value != '') {

            var img_ext = img2.value.substring(img2.value.lastIndexOf('.') + 1);

            if (img_ext === "pdf" || img_ext === "PDF") {

                if (parseFloat(img2.files[0].size / 1024) > 2000 || parseFloat(img2.files[0].size / 1024) < 10) {

                    alert('Authorization Details File size should be between 10KB to 2 MB.');
                    return false;

                }



            } else {

                alert('Authorization Details File should be in PDF.');
                return false;

            }

        } else {

            // alert('Please upload Authorization Details');
            return true;
        }

        return true;
    }


    var img3 = document.forms['myform']['aggrement_details'];

    function validation3() {

        if (img3.value != '') {

            var img_ext = img3.value.substring(img3.value.lastIndexOf('.') + 1);

            if (img_ext === "pdf" || img_ext === "PDF") {

                if (parseFloat(img3.files[0].size / 1024) > 2000 || parseFloat(img3.files[0].size / 1024) < 10) {

                    alert('Aggrement Details File size should be between 10KB to 2 MB.');
                    return false;

                }



            } else {

                alert('Aggrement Details File should be in PDF.');
                return false;

            }

        } else {

            //alert('Please upload Aggrement Details');
            return true;
        }

        return true;
    }
</script>