<?php
if (!isset($_SESSION['bmw_plant_id'])) {
    return redirect('index.php/Cbwtf');
} else {
    $admin_session = $_SESSION['bmw_plant_id'];
    $random = rand(102548, 984675);
    $date = date('Y-m-d');
?>


    <?php include('public/includes/cbwtf/headernav.php') ?>

    <section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 pl-0">
                    <?php include('public/includes/cbwtf/sidenav.php') ?>
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
                    </div>

                    <div class="row adm-cont p-t-40">
                        <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/cbwtf/weight_machine_master" method="post" enctype="multipart/form-data">
                            <h5>Weight Machine Master</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="name">Machine ID:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" name="machine_no" class="form-control" placeholder="Machine ID" id="Vehicle_number" required>

                                            </div>
                                            <div class="text-danger ml-2"><?php echo form_error('machine_no'); ?></div>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="email">Machine serial no:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" id="email" class="form-control" name="machine_ip" placeholder="Machine serial Number" rows="2" required>
                                            </div>

                                            <div class="text-danger ml-2"><?php echo form_error('machine_ip'); ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="email">Plant Name:</label></div>
                                            <div class="col-md-9">
                                                <input type="text" id="email" class="form-control" name="hcf_name" placeholder="Plant Name" rows="2" value="<?php $org_name = $this->session->userdata('bmw_cbwtf_name');
                                                                                                                                                            echo $org_name; ?>" readonly>
                                            </div>
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


                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 2.5px;">SI no.</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Machine ID</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Machine Serial no.</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">Date</th>
                                        <!-- <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">CBWTF</th> -->

                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Function: activate to sort column ascending" style="width: 55.8984px;">Function</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($get_machine_data as $row) {

                                    ?>

                                        <tr class="odd">

                                            <td align="center"> <?php echo $i; ?> </td>
                                            <td align="center"><?php echo $row['machine_no']; ?></td>
                                            <td align="center"><?php echo $row['machine_ip']; ?></td>

                                            <td align="center"><?php echo $row['date']; ?></td>

                                            <td class="d-flex">
                                                <!-- <a href="<?php echo base_url('index.php/Cbwtf/weight_machine_master_edit/') . $row['id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">&#9998;</button></a> -->

                                                <!-- <a href="<?php echo base_url('index.php/Cbwtf/weight_machine_master_delete/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style="display:none">Delete</button></a> -->
                                                <div class="pl-2">
                                                    <a href="<?php echo base_url('index.php/Cbwtf/weight_machine_master_delete/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>
                                                </div>


                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

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
<?php } ?>