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
                <div class="col-md-10" style="min-height:120vh;">

                    <div class="row adm-cont p-t-40">

                        <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/edit_register_staff/<?php echo $get_staff_data['id'] ?>" method="post" enctype="multipart/form-data" name="myform" onsubmit="return validation();">
                            <h5>Staff Master Edit</h5>
                            <!-- <div class="row float-md-right">
                            <div><a href="#"><img class="org-rset" src="img/reset.png"></a></div>
                        </div> -->
                            <?php if ($this->session->flashdata('error')) { ?>

                                <div class="alert alert-danger alert-white rounded alertrsize">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <div class="icon"><i class="fa fa-check"></i></div>
                                    <p><?php echo $data1 = $this->session->flashdata('error');  ?></p>
                                </div>
                            <?php } else {
                            } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="name">Employee Name:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" name="name" class="form-control" placeholder="Name" id="name" value="<?php echo $get_staff_data['name']; ?>" required>

                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('name'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="email">Email:</label></div>
                                            <div class="col-md-9">
                                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" rows="2" value="<?php echo $get_staff_data['email']; ?>" required>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('email'); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="address">Address:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" name="address" placeholder="Address" class="form-control" value="<?php echo $get_staff_data['address']; ?>"></input>

                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('address'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="mobile">Mobile No:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="mobile" placeholder="Mobile" id="mob" value="<?php echo $get_staff_data['mobile']; ?>" required>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('mobile'); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="department">Department:</label></div>
                                            <div class="col-md-9">
                                                <select class="form-control" name="department" required>

                                                    <option value="<?php echo $get_staff_data['department']; ?>">
                                                        <?php echo $get_staff_data['department']; ?></option>
                                                    <option value="">--select--</option>
                                                    <?php foreach ($get_department_data as $row2) {

                                                        if ($row2['remove'] == 1) {
                                                        } else {



                                                    ?>

                                                            <option value="<?php echo $row2['dept_name']; ?>">
                                                        <?php
                                                            echo $row2['dept_name'];
                                                        }
                                                    }

                                                        ?>
                                                </select>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('department'); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="designation">Designation:</label></div>
                                            <div class="col-md-9">
                                                <select class="form-control" name="designation" required>

                                                    <option value="<?php echo $get_staff_data['designation']; ?>">
                                                        <?php echo $get_staff_data['designation']; ?></option>
                                                    <option value="">--select--</option>
                                                    <?php foreach ($get_designation_data as $row2) {

                                                        if ($row2['remove'] == 1) {
                                                        } else {



                                                    ?>

                                                            <option value="<?php echo $row2['designation']; ?>">
                                                        <?php
                                                            echo $row2['designation'];
                                                        }
                                                    }

                                                        ?>
                                                </select>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('designation'); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="image">Photo:</label></div>
                                            <div class="col-md-9">

                                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                                <input type="hidden" name="image2" id="image2" class="form-control" value="<?php echo $get_staff_data['image']; ?>">
                                            </div>


                                        </div>
                                    </div>



                                </div>

                                <div class="col-md-6">




                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="dob">DOB:</label></div>
                                            <div class="col-md-9"><input type="date" name="dob" class="form-control" id="dob" value="<?php echo $get_staff_data['dob']; ?>" required>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('dob'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="doj">DOJ:</label></div>
                                            <div class="col-md-9"><input type="date" name="doj" class="form-control" placeholder="doj" id="doj" value="<?php echo $get_staff_data['doj']; ?>" required></div>
                                        </div>
                                        <div class="text-danger ml-3">
                                            <?php echo form_error('doj'); ?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><span style="color:red">*</span><label for="mobile">Vaccine:</label></div>
                                            <div class="col-md-9">
                                                <select class="form-control" name="Vaccine" required>
                                                    <option value="<?php echo $get_staff_data['Vaccine']; ?>">
                                                        <?php echo $get_staff_data['Vaccine']; ?></option>
                                                    <option value="">-Select-</option>
                                                    <option value="Hepatitis B">Hepatitis B</option>
                                                    <!-- <option value="Covaxin">Covaxin</option>
                                                        <option value="Sputnik V">Sputnik V</option>           -->
                                                </select>
                                            </div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('Vaccine'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><span style="color:red">* </span><label for="doj">1st Dose:</label></div>
                                            <div class="col-md-9"><input type="date" name="1st_dose" class="form-control" placeholder="1st_dose" id="1st_dose" value="<?php echo $get_staff_data['1st_dose']; ?>" required></div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('1st_dose'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><span style="color:red">* </span><label for="doj">2nd Dose:</label></div>
                                            <div class="col-md-9"><input type="date" name="2nd_dose" class="form-control" placeholder="2nd_dose" id="2nd_dose" value="<?php echo $get_staff_data['2nd_dose']; ?>" required></div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('2nd_dose'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="doj">Booster Dose:</label></div>
                                            <div class="col-md-9"><input type="date" name="booster" class="form-control" placeholder="booster" id="booster" value="<?php echo $get_staff_data['booster']; ?>"></div>
                                            <div class="text-danger ml-3">
                                                <?php echo form_error('booster'); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="remarks">Remarks:</label></div>
                                            <div class="col-md-9"><input type="remarks" class="form-control" placeholder="Remarks" id="remarks" name="remarks" value="<?php echo $get_staff_data['remarks']; ?>"></div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="row  p-t-40">
                                <div class="col text-right">
                                    <a href="<?php echo base_url() ?>index.php/organization/register_staff">
                                        <input type="button" value="Cancel" class="btn btn-warning" />
                                    </a>
                                    <button type="submit" class="btn btn-primary">Update</button>

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
    var img = document.forms['myform']['image'];

    //  var validExt = ["jpeg", "png", "jpg"];

    function validation() {

        if (img.value != '') {

            var img_ext = img.value.substring(img.value.lastIndexOf('.') + 1);

            if (img_ext === "jpg" || img_ext === "png" || img_ext === "jpeg") {

                if (parseFloat(img.files[0].size / 1024) > 300 || parseFloat(img.files[0].size / 1024) < 30) {

                    alert('Photograph file size should be between 30 to 300 kb.');
                    return false;

                }



            } else {

                alert('Photograph should be in JPG/PNG/JPEG.');
                return false;

            }

        } else {

            //alert('No Candidate image Selected');
            return true;
        }

        return true;
    }

    document.getElementById('email').readOnly = true;
</script>