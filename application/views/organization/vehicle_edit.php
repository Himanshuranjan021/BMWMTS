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
                <div class="col-md-2" style="height:120vh;">
                    <?php include('public/includes/organization/sidenav.php') ?>
                </div>
                <div class="col-md-10">

                    <div class="row adm-cont p-t-40">

                        <form class="orgisation-m-frm" name="myform" action="<?php echo base_url() ?>index.php/organization/edit_vehicel_master/<?php echo $get_vehicle_data['id'] ?>" method="post" enctype="multipart/form-data" onsubmit="return validation();">
                            <h5>Vehicle Master</h5>
                            <!-- <div class="row float-md-right">
                                <div><a href="#"><img class="org-rset" src="img/reset.png"></a></div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="name">Vehicle No.:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" name="Vehicle_number" class="form-control" placeholder="Vehicle Number" id="Vehicle_number" value="<?php echo $get_vehicle_data['vc_no'] ?>" required readonly>

                                            </div>
                                            <div class="text-danger"><?php echo form_error('Vehicle_number') ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="owner_name">Owner Name:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" id="owner_name" class="form-control" name="owner_name" placeholder="Owner Name" rows="2" value="<?php echo $get_vehicle_data['owner_name'] ?>" required>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('owner_name') ?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="vc_type">Vehicle Type</label></div>
                                            <div class="col-md-9">
                                                <select class="form-control" name="vc_type" required>
                                                    <option value="<?php echo $get_vehicle_data['vc_type'] ?>"><?php echo $get_vehicle_data['vc_type'] ?></option>
                                                    <option value="">--Select--</option>
                                                    <?php foreach ($get_vehicle_type_data as $row2) { ?>

                                                        <option value="<?php echo $row2['vc_type_name']; ?>">
                                                        <?php
                                                        echo $row2['vc_type_name'];
                                                    }  ?>
                                                </select>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('vc_type') ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="Chassis_no">Engine No.:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" name="Engine_no" placeholder="Engine No" class="form-control" value="<?php echo $get_vehicle_data['Engine_no'] ?>" required></input>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('Engine_no') ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="fit_exp_date">Fitness Exp. Date:</label></div>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" name="fit_exp_date" placeholder="Fitness Expire Date" id="fit_exp_date" value="<?php echo $get_vehicle_data['fit_exp_date'] ?>" required>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('fit_exp_date') ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="mobile">Documents:</label></div>
                                            <div class="col-md-9">
                                                <input type="file" class="form-control" name="Documents" id="Documents">
                                                <input type="hidden" class="form-control" name="Documents2" value="<?php echo $get_vehicle_data['doc'] ?>">
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="vc_type">CBWTF</label></div>
                                            <div class="col-md-9">
                                                <select class="form-control" name="cbwtf" required>
                                                    <option value="<?php echo $get_vehicle_data['cbwtf_id'] ?>"><?php echo $get_vehicle_data['cbwtf'] ?></option>
                                                    <option value="">--Choose CBWTF--</option>
                                                    <?php foreach ($get_cbwtf_data as $row2) { ?>

                                                        <option value="<?php echo $row2['id']; ?>">
                                                        <?php
                                                        echo $row2['Plant_name'];
                                                    }

                                                        ?>
                                                </select>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('cbwtf') ?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="mobile">Owner Mobile:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="mobile" placeholder="Mobile" id="mob" value="<?php echo $get_vehicle_data['owner_mobile'] ?>" required>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('mobile') ?></div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="Chassis_no">Chassis No.:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" name="Chassis_no" placeholder="Chassis No" class="form-control" value="<?php echo $get_vehicle_data['chassis_no'] ?>" required></input>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('Chassis_no') ?></div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="mobile">Insurance Exp. Date:</label></div>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" name="Insuran_exp_dt" placeholder="Insurance Expire Date" id="Insuran_exp_dt" value="<?php echo $get_vehicle_data['Insuran_exp_dt'] ?>" required>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('Insuran_exp_dt') ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="mobile">Pollution Exp. Date:</label></div>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" name="pollution_exp_date" placeholder="Pollution Expire Date" id="Pollution _exp_data" value="<?php echo $get_vehicle_data['pollution_exp_date'] ?>" required>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('pollution_exp_date') ?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="Chassis_no">Asset Id.:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" name="asset_id" placeholder="Asset Id" class="form-control" value="<?php echo $get_vehicle_data['assetUid'] ?>" required></input>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('Chassis_no') ?></div>
                                        </div>
                                    </div>




                                </div>
                            </div>

                            <div class="row  p-t-40">
                                <div class="col text-right">
                                    <!-- <a href="<?php echo base_url() ?>index.php/organization/vehicle_master">
                                        <input type="button" value="Cancel" class="btn btn-warning" />
                                    </a> -->
                                    <button type="submit" class="btn btn-primary org-btn rounded">Update</button>

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
    var img = document.forms['myform']['Documents'];

    //  var validExt = ["jpeg", "png", "jpg"];

    function validation() {

        if (img.value != '') {

            var img_ext = img.value.substring(img.value.lastIndexOf('.') + 1);

            if (img_ext === "pdf" || img_ext === "PDF") {

                if (parseFloat(img.files[0].size / 1024) > 400 || parseFloat(img.files[0].size / 1024) < 50) {

                    alert('Document  size should be between 50 to 400 kb.');
                    return false;

                }



            } else {

                alert('Document Should Be a PDF');
                return false;

            }

        } else {

            // alert('No Document  Selected');
            return true;
        }

        return true;
    }
</script>