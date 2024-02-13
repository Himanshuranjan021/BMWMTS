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
                <div class="col-md-10" style="min-height:100vh;">

                    <div class="row adm-cont p-t-40">

                        <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/register_machine_edit/<?php echo $get_machine_data['id'] ?>" method="post" enctype="multipart/form-data">
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
                                              
                                                <select class="form-control" name="machine_no" required>
                                                <option value="<?php echo $get_machine_data['machine_name']?>"><?php echo $get_machine_data['machine_name']?></option>
                                            <option value="">-Select-</option>
                                            <?php foreach ($get_machine2_data as $row2) { ?>
                                            <option value="<?php echo $row2['machine_no']; ?>">
                                                <?php
                                             echo $row2['machine_no'];
                                              }

                                              ?>
                                            </option>
                                            </select>
                                            </div>
                                            <div class="text-danger ml-2"><?php echo form_error('machine_no'); ?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="email">Machine ID:</label></div>
                                            <div class="col-md-9">
                                            <select class="form-control" name="machine_ip" required>
                                            <option value="<?php echo $get_machine_data['machine_id']?>"><?php echo $get_machine_data['machine_id']?></option>
                                            <option value="">-Select-</option>
                                            <?php foreach ($get_machine2_data as $row2) { ?>
                                            <option value="<?php echo $row2['machine_ip']; ?>">
                                                <?php
                                             echo $row2['machine_ip'];
                                              }

                                              ?>
                                            </option>
                                            </select>
                                            </div>
                                            <div class="text-danger ml-2"><?php echo form_error('machine_ip'); ?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="email">User Name:</label></div>
                                            <div class="col-md-9">
                                                <!-- <input type="text" id="email" class="form-control" name="name"  rows="2" value="<?php echo $get_machine_data['user_name']?>" > -->
                                                <select class="form-control" name="name" required>
                                                <option value="<?php echo $get_machine_data['user_name']?>"><?php echo $get_machine_data['user_name']?></option>
                                            <option value="">-Select-</option>
                                            <?php foreach ($get_register_staff_data as $row) { ?>
                                            <option value="<?php echo $row['name']; ?>">
                                                <?php
                                             echo $row['name']."  M:- ".$row['mobile'];
                                              }

                                              ?>
                                            </option>
                                            </select>
                                            </div>
                                            <div class="text-danger ml-2"><?php echo form_error('name'); ?></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row  p-t-40">
                                <div class="col text-right">
                                <a href="<?php echo base_url()?>index.php/organization/register_machine"> 
                    <input type="button" value="Cancel" class="btn btn-warning" />
                    </a>
                                    <button type="submit" class="btn btn-primary">Update</button>

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