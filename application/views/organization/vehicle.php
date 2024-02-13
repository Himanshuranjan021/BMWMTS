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
                <div class="col-md-10" style="min-height:120vh;">
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
                        <div class="row adm-cont p-t-40">

                            <form class="orgisation-m-frm" name="myform" action="<?php echo base_url() ?>index.php/organization/vehicle_master" method="post" enctype="multipart/form-data" onsubmit="return validation();">
                                <h5>Vehicle Master</h5>

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="name">Vehicle No.:</label></div>
                                                <div class="col-md-8">
                                                    <input type="text" name="Vehicle_number" class="form-control" placeholder="Vehicle Number" id="Vehicle_number" value="<?php echo set_value('Vehicle_number'); ?>" required>

                                                </div>
                                                <div class="text-danger"><?php echo form_error('Vehicle_number') ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="email">Owner Name:</label></div>
                                                <div class="col-md-8">
                                                    <input type="text" id="owner_name" class="form-control" name="owner_name" placeholder="Owner Name" rows="2" value="<?php echo set_value('owner_name'); ?>" required>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('owner_name') ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="vc_type">Vehicle Type</label></div>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="vc_type" value="<?php echo set_value('vc_type'); ?>" required>
                                                        <option value="">-Select-</option>
                                                        <?php foreach ($get_vehicle_type_data as $row2) {

                                                            if ($row2['remove'] == 1) {
                                                            } else {




                                                        ?>

                                                                <option value="<?php echo $row2['vc_type_name']; ?>">
                                                            <?php
                                                                echo $row2['vc_type_name'];
                                                            }
                                                        }

                                                            ?>
                                                    </select>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('vc_type') ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="Chassis_no">Engine No.:</label></div>
                                                <div class="col-md-8">
                                                    <input type="text" name="Engine_no" placeholder="Engine No" class="form-control" value="<?php echo set_value('Engine_no'); ?>" required>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('Engine_no') ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="fit_exp_date">Fitness Exp. Date:</label></div>
                                                <div class="col-md-8">
                                                    <input type="date" class="form-control" name="fit_exp_date" placeholder="Fitness Expire Date" id="fit_exp_date" value="<?php echo set_value('fit_exp_date'); ?>" required>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('fit_exp_date') ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="mobile">Documents:</label></div>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" name="Documents" id="Documents">
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="cbwtf">CBWTF</label></div>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="cbwtf" required>
                                                        <option value="">-Choose CBWTF-</option>
                                                        <?php foreach ($get_cbwtf_data as $row2) {

                                                            if ($row2['remove'] == 1) {
                                                            } else {




                                                        ?>

                                                                <option value="<?php echo $row2['id']; ?>">
                                                            <?php
                                                                echo $row2['Plant_name'];
                                                            }
                                                        }

                                                            ?>
                                                    </select>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('cbwtf') ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="mobile">Owner Mobile:</label></div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile" id="mob" value="<?php echo set_value('mobile'); ?>" required>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('mobile') ?></div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="Chassis_no">Chassis No.:</label></div>
                                                <div class="col-md-8">
                                                    <input type="text" name="Chassis_no" placeholder="Chassis No" class="form-control" value="<?php echo set_value('Chassis_no'); ?>" required>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('Chassis_no') ?></div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="mobile">Insurance Exp. Date:</label></div>
                                                <div class="col-md-8">
                                                    <input type="date" class="form-control" name="insurance_exp_date" placeholder="Insurance Expire Date" id="insurance_exp_data" value="<?php echo set_value('insurance_exp_date'); ?>" required>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('insurance_exp_date') ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="mobile">Pollution Exp. Date:</label></div>
                                                <div class="col-md-8">
                                                    <input type="date" class="form-control" name="pollution_exp_date" placeholder="Pollution Expire Date" id="Pollution _exp_data" value="<?php echo set_value('pollution_exp_date'); ?>" required>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('pollution_exp_date') ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label for="Chassis_no">Asset Id:</label></div>
                                                <div class="col-md-8">
                                                    <input type="text" name="asset_id" placeholder="Asset Id" class="form-control" value="<?php echo set_value('asset_id'); ?>" required></input>
                                                </div>
                                                <div class="text-danger"><?php echo form_error('Chassis_no') ?></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <?php $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                                ); ?>

                                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />


                                <div class="row  p-t-40">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-primary org-btn rounded">Submit</button>

                                    </div>
                                </div>

                            </form>

                        </div>


                        <!--  <div class="row p-t-40 ">
                             <div class="col">
                                <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"> -->
                        <!-- <div class="dataTables_length col-md-2" id="myTable_length">
                                            <label>Show entries</label> 
                                            <select name="myTable_length" aria-controls="myTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> 
                                        </div> -->

                        <!-- <div class="col-md-7"></div>

                                            <div id="myTable_filter" class="dataTables_filter col-md-3">
                                            <label>Search:</label>
                                            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="myTable">
                                            </div>
                                      
                                    </div>-->

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-responsive dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 12.5px;">Id</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Vehicle No.</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 76.6211px;">CBWTF</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Vehicle Type</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 35.1172px;">Chasis No.</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 35.1172px;">Engine No.</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 44.9414px;">Owner Name</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 77.4219px;">Owner No.</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 80.6211px;">Insurance Exp. Date</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 90.6211px;">Fitness Exp. Date</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 76.6211px;">Pollution Exp. Date</th>

                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">Date</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">District</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">Files</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Function: activate to sort column ascending" style="width: 55.8984px;">Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        foreach ($get_vehicle_data as $row) {

                                            if ($row['remove'] == 1) {
                                            } else {

                                        ?>

                                                <tr class="odd">
                                                    <!-- <th scope="row" class="sorting_1">1</th> -->
                                                    <td align="center"> <?php echo $i; ?> </td>
                                                    <td align="center"><?php echo $row['vc_no']; ?></td>
                                                    <td align="center"><?php echo $row['cbwtf']; ?></td>
                                                    <td align="center"><?php echo $row['vc_type']; ?></td>

                                                    <td align="center"><?php echo $row['chassis_no']; ?></td>
                                                    <td align="center"><?php echo $row['Engine_no']; ?></td>
                                                    <td align="center"> <?php echo $row['owner_name']; ?> </td>

                                                    <td align="center"> <?php echo $row['owner_mobile']; ?> </td>

                                                    <td align="center"><?php echo $row['Insuran_exp_dt']; ?></td>
                                                    <td align="center"><?php echo $row['fit_exp_date']; ?></td>
                                                    <td align="center"><?php echo $row['pollution_exp_date']; ?></td>

                                                    <td align="center"><?php echo $row['create_dt']; ?></td>
                                                    <td align="center"><?php echo $row['org_master_dist']; ?></td>
                                                    <td align="center"> <a href="<?php echo base_url() ?>public/uploads/<?php echo $row['doc']; ?>" download> View</a></td>




                                                    <td class="d-flex">
                                                        <a href="<?php echo base_url('index.php/organization/edit_vehicel_master/') . $row['id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">&#9998;</button></a>


                                                        <a href="<?php echo base_url('index.php/organization/vehicle_master_delete/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style="display:none">Delete</button></a>

                                                        <div class="pl-2">
                                                            <a href="<?php echo base_url('index.php/organization/vehicle_master_remove/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>
                                                        </div>

                                                    </td>
                                                </tr>
                                        <?php $i++;
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- </div>
                            </div> -->
                        <!-- </div>
                    </div>
                </div>
            </div>
 -->
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

                if (parseFloat(img.files[0].size / 1024) > 400 || parseFloat(img.files[0].size / 1024) < 10) {

                    alert('Document  size should be between 10 to 400 kb.');
                    return false;

                }



            } else {

                alert('Document Should Be a PDF');
                return false;

            }

        } else {

            alert('No Document  Selected');
            return false;
        }

        return true;
    }
</script>