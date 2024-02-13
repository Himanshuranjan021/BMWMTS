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
                <div class="col-md-10 pt-5" style="min-height:100vh;">
                    <div class="alertback">
                        <?php if ($this->session->flashdata('success')) { ?>

                            <div class="alert alert-success alert-white rounded alertrsize">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <div class="icon"><i class="fa fa-check"></i></div>
                                <p><?php echo $data1 = $this->session->flashdata('success');  ?></p>
                            </div>

                        <?php } else {
                        } ?>

                        <?php if ($this->session->flashdata('error')) { ?>

                            <div class="alert alert-danger alert-white rounded alertrsize">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <div class="icon"><i class="fa fa-check"></i></div>
                                <p><?php echo $data1 = $this->session->flashdata('error');  ?></p>
                            </div>
                        <?php } else {
                        } ?>
                    </div>

                    <?php
                    if ($get_profile_data == []) { ?>

                        <div class="row adm-cont p-t-40 pt-5">

                            <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/profile" method="post" enctype="multipart/form-data" name="myform" onsubmit="return !!(validation() & validation2() & validation3());">

                                <h5>HCF Profile Details</h5>


                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="mobile">Authorization Valid Upto:</label></div>
                                                <div class="col-md-8">
                                                    <input type="date" class="form-control" name="authorization" placeholder="Mobile" id="authorization" value="<?php echo set_value('authorization'); ?>">
                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('authorization'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="mobile">If Not Valid, Date of application:</label></div>
                                                <div class="col-md-8">
                                                    <input type="date" class="form-control" name="auth_applied" placeholder="Mobile" id="mob" value="<?php echo set_value('auth_applied'); ?>">
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
                                                    <input type="file" name="auth_details" id="authorization" class="form-control" required>
                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('auth_details'); ?>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="mobile">CTO Valid Upto:</label></div>
                                                <div class="col-md-8">
                                                    <input type="date" class="form-control" name="cto" placeholder="Mobile" id="mob" value="<?php echo set_value('cto'); ?>" required>
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
                                                    <input type="date" class="form-control" name="cto_applied" placeholder="Mobile" id="mob" value="<?php echo set_value('cto_applied'); ?>">
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
                                                <div class="col-md-4"><label for="mobile">Aggrement With CBWTF/OS Valid Upto:</label></div>
                                                <div class="col-md-8">
                                                    <input type="date" class="form-control" name="aggrement" placeholder="Mobile" id="aggrement" value="<?php echo set_value('aggrement'); ?>">
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
                                                    <input type="file" name="aggrement_details" id="authorization" class="form-control" required>
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
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">Bed Strength :</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" name="strength" class="form-control" placeholder="Bed Strength" value="<?php echo set_value('strength'); ?>" id="strength" required>

                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('strength'); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">No. of Deep Burial Pits:</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" name="deep_burial" class="form-control" placeholder="No. of Deep Burial Pits available" value="<?php echo set_value('deep_burial'); ?>" id="strength" required>

                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('deep_burial'); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">No. of Sharp Pits:</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" name="sharp_pit" class="form-control" placeholder="No. of Sharp Pits available" value="<?php echo set_value('sharp_pit'); ?>" id="strength" required>

                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('sharp_pit'); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">No. of Autoclave:</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" name="autoclave" class="form-control" placeholder="No. of Autoclave available" value="<?php echo set_value('autoclave'); ?>" id="strength" required>

                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('autoclave'); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">No. of Shredder:</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" name="shredder" class="form-control" placeholder="No. of Shredder available" value="<?php echo set_value('shredder'); ?>" id="strength" required>

                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('shredder'); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">No. of NST/Hub Cutter:</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" name="nst" class="form-control" placeholder="No. of NST/Hub Cutter available" value="<?php echo set_value('nst'); ?>" id="strength" required>

                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('nst'); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">No. of ETP(With Capacity):</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" name="etp" class="form-control" placeholder="No. of ETP available" id="strength" required>
                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('etp'); ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">No. of STP(With Capacity):</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" name="stp" class="form-control" placeholder="No. of STP available" id="strength" required>
                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('stp'); ?>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><span style="color:red">* </span><label for="name">No. of LWM:</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" name="lmw" class="form-control" placeholder="No. of LMW available" value="<?php echo set_value('lmw'); ?>" id="strength" required>

                                                </div>
                                                <div class="text-danger ml-3">
                                                    <?php echo form_error('lmw'); ?>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"><label for="remarks">Remarks:</label></div>
                                                <div class="col-md-7"><input type="remarks" class="form-control" placeholder="Remarks" id="remarks" name="remarks" value="<?php echo set_value('remarks'); ?>"></div>
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
                    <?php } else { ?>

                        <div class="row" style="overflow-x:auto;">

                            <table class="table table-striped table-bordered table-responsive dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 12.5px;">SI</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">CTO Valid Upto</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 50.0273px;">CTO Applied On</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 35.1172px;">CTO Document</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 44.9414px;">Authorization Valid Upto</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 77.4219px;">Authorization Applied On</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 76.6211px;">Authorization Document</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Dob: activate to sort column ascending" style="width: 26.6992px;">Aggrement With Cbwtf/OS Valid Upto</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">Aggrement Details</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Dob: activate to sort column ascending" style="width: 26.6992px;">Bed Strength</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of Deep burials</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Dob: activate to sort column ascending" style="width: 26.6992px;">No. of Sharp Pits</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of Autoclaves</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of Shredder</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of NST/HUB</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of ETP</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Doj: activate to sort column ascending" style="width: 28.1445px;">No. of STP</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">No. of LMW</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">Remarks</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Function: activate to sort column ascending" style="width: 55.8984px;">Function</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($get_profile_data as $row) { ?>

                                        <tr class="odd">
                                            <td align="center"> <?php echo $i; ?> </td>
                                            <td align="center"> <?php echo $row['cto']; ?> </td>
                                            <td align="center"> <?php echo $row['cto_applied']; ?> </td>
                                            <td align="center"> <a href="<?php echo base_url(); ?>public/uploads/HCF_DOC/<?php echo $row['cto_details']; ?>" style="width:100%;"> view</a> </td>
                                            <td align="center"><?php echo $row['authorization']; ?></td>
                                            <td align="center"><?php echo $row['auth_applied']; ?></td>
                                            <td align="center"> <a href="<?php echo base_url(); ?>public/uploads/HCF_DOC/<?php echo $row['auth_details']; ?>" style="width:100%;"> view</a> </td>
                                            <td align="center"><?php echo $row['aggrement']; ?></td>
                                            <td align="center"> <a href="<?php echo base_url(); ?>public/uploads/HCF_DOC/<?php echo $row['aggrement_details']; ?>" style="width:100%;"> view</a> </td>
                                            <td align="center"><?php echo $row['strength']; ?></td>
                                            <td align="center"><?php echo $row['deep_burial']; ?></td>
                                            <td align="center"><?php echo $row['sharp_pit']; ?></td>
                                            <td align="center"><?php echo $row['autoclave']; ?></td>
                                            <td align="center"><?php echo $row['shredder']; ?></td>
                                            <td align="center"><?php echo $row['nst']; ?></td>
                                            <td align="center"><?php echo $row['etp']; ?></td>
                                            <td align="center"><?php echo $row['stp']; ?></td>
                                            <td align="center"><?php echo $row['lmw']; ?></td>
                                            <td align="center"><?php echo $row['remarks']; ?></td>

                                            <td>
                                                <a href="<?php echo base_url('index.php/organization/edit_profile/') . $row['id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">&#9998;</button></a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                    <?php } ?>
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

            alert('Please upload CTO Details');
            return false;
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

            alert('Please upload Authorization Details');
            return false;
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

            alert('Please upload Aggrement Details');
            return false;
        }

        return true;
    }



    //     var img2 = document.forms['myform']['auto_details'];

    // function validation() {

    //     if (img.value != '') {

    //         var img_ext = img.value.substring(img.value.lastIndexOf('.') + 1);

    //         if (img_ext === "pdf" || img_ext === "PDF" ) {

    //             if (parseFloat(img.files[0].size / 1024) > 20 || parseFloat(img.files[0].size / 1024) < 10) {

    //                 alert('File size should be between 10KB to 2 MB.');
    //                 return false;

    //             }



    //         } else {

    //             alert('Photograph should be in JPG/PNG/JPEG.');
    //             return false;

    //         }

    //     } else {

    //         alert('No Candidate image Selected');
    //         return false;
    //     }

    //     return true;
    // }
</script>