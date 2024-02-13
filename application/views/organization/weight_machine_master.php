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
                            <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/weight_machine_master" method="post" enctype="multipart/form-data">
                                <h5>Weight Machine Master</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3"><label for="name">Machine ID:</label></div>
                                                <div class="col-md-9">
                                                    <input type="text" name="machine_no" class="form-control" placeholder="Mac ID" id="Vehicle_number" required>

                                                </div>
                                                <div class="text-danger ml-2"><?php echo form_error('machine_no'); ?></div>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3"><label for="email">Machine Serial No.:</label></div>
                                                <div class="col-md-9">
                                                    <input type="text" id="email" class="form-control" name="machine_ip" placeholder="Machine Serial No" rows="2" required>
                                                </div>

                                                <div class="text-danger ml-2"><?php echo form_error('machine_ip'); ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3"><label for="email">HCF Name:</label></div>
                                                <div class="col-md-9">
                                                    <input type="text" id="email" class="form-control" name="hcf_name" placeholder="HCF Name" rows="2" value="<?php $org_name = $this->session->userdata('bmw_org_name');
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

                        <!-- <div class="row p-t-40 ">
                           
                                <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="dataTables_length" id="myTable_length"><label>Show <select name="myTable_length" aria-controls="myTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="myTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="myTable"></label>
                                            </div>
                                        </div>
                                    </div> -->
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 12.5px;">Id</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Machine IP</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Machine NO.</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">Date</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">HCF</th>

                                            <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Function: activate to sort column ascending" style="width: 55.8984px;">Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        foreach ($get_machine_data as $row) { ?>

                                            <tr class="odd">
                                                <!-- <th scope="row" class="sorting_1">1</th> -->
                                                <td align="center"> <?php echo $i; ?> </td>
                                                <td align="center"><?php echo $row['machine_no']; ?></td>
                                                <td align="center"><?php echo $row['machine_ip']; ?></td>

                                                <td align="center"><?php echo $row['create_date']; ?></td>
                                                <td align="center"><?php echo $row['org_master_name']; ?></td>



                                                <td class="d-flex">
                                                    <!-- <a href="<?php echo base_url('index.php/organization/weight_machine_master_edit/') . $row['master_id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">&#9998;</button></a> -->

                                                    <a href="<?php echo base_url('index.php/organization/weight_machine_master_delete/') . $row['master_id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style="display:none">Delete</button></a>
                                                    <div class="pl-2">
                                                        <a href="<?php echo base_url('index.php/organization/weight_machine_master_delete/') . $row['master_id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>
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
<?php }
?>