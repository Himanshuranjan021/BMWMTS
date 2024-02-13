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

                        <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/weight_machine_master_edit/<?php echo $get_machine_data[0]['id'] ?>" method="post" enctype="multipart/form-data">
                            <h5>Weight Machine Master</h5>
                            <!-- <div class="row float-md-right">
                                <div><a href="#"><img class="org-rset" src="img/reset.png"></a></div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="name">Machine Name:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" name="machine_no" class="form-control" placeholder="Machine Number" id="Vehicle_number" value="<?php echo $get_machine_data[0]['machine_no'] ?>" require>

                                            </div>
                                            <div class="text-danger ml-2"><?php echo form_error('machine_no'); ?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="email">Machine ID:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" id="email" class="form-control" name="machine_ip" placeholder="Machine IP" rows="2" value="<?php echo $get_machine_data[0]['machine_ip'] ?>" require>
                                            </div>
                                            <div class="text-danger ml-2"><?php echo form_error('machine_ip'); ?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="email">HCF Name:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" id="email" class="form-control" name="hcf_name" placeholder="HCF Name" rows="2" value="<?php  $org_name = $this->session->userdata('bmw_org_name'); echo $org_name;?>" readonly >
                                            </div>
                                            <div class="text-danger ml-2"><?php echo form_error('hcf_name'); ?></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row  p-t-40">
                                <div class="col text-right">
                                <a href="<?php echo base_url()?>index.php/organization/weight_machine_master"> 
                    <input type="button" value="Cancel" class="btn btn-warning" />
                    </a>
                                    <button type="submit" class="btn btn-primary org-btn rounded">Update</button>

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