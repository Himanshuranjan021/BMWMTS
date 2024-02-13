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

                        <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/register_machine" method="post" enctype="multipart/form-data">
                            <h5>Register Machine</h5>
                            <!-- <div class="row float-md-right">
                                <div><a href="#"><img class="org-rset" src="img/reset.png"></a></div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label for="name">Machine ID:</label></div>
                                            <div class="col-md-9">

                                                <select class="form-control" name="machine_no" id="machine_no" required>
                                                    <option value="">-Select-</option>
                                                    <?php foreach ($get_machine_data as $row2) { ?>
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
                                            <div class="col-md-3"><label for="email">Serial No:</label></div>
                                            <div class="col-md-9">

                                                <select class="form-control" name="machine_ip" id="machine_ip" required>
                                                    <option value="">-Select-</option>
                                                    <?php foreach ($get_machine_data as $row2) { ?>
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

                                                <select class="form-control" name="name" required>
                                                    <option value="">-Select-</option>
                                                    <?php foreach ($get_register_staff_data as $row2) { ?>
                                                        <option value="<?php echo $row2['id']; ?>">
                                                        <?php
                                                        echo $row2['name'] . "  M:- " . $row2['mobile'];
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


                    <div class="row p-t-40 ">
                        <div class="col">
                            <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 12.5px;">Id</th>
                                                    <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Machine ID</th>
                                                    <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Machine NO.</th>
                                                    <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">User Name</th>
                                                    <!--  <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">HCF</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">Pincode</th> -->
                                                    <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Function: activate to sort column ascending" style="width: 55.8984px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                foreach ($get_link_data as $row) { ?>

                                                    <tr class="odd">
                                                        <!-- <th scope="row" class="sorting_1">1</th> -->
                                                        <td align="center"> <?php echo $i; ?> </td>
                                                        <td align="center"><?php echo $row['machine_name']; ?></td>
                                                        <td align="center"><?php echo $row['machine_id']; ?></td>

                                                        <td align="center"><?php echo $row['user_name']; ?></td>



                                                        <th class="d-flex">
                                                            <!-- <a href="<?php echo base_url('index.php/organization/register_machine_edit/') . $row['link_id']; ?>"><button type="submit" class="btn btn-primary org-btn rounded">&#9998;</button></a></br></br>  -->


                                                            <div class="pl-2">
                                                                <a href="<?php echo base_url('index.php/organization/register_machine_delete/') . $row['link_id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>
                                                            </div>


                                                        </th>
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


<script>
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $('#machine_no').on('change', function() {

        var scan = $("#machine_no").val();
        //alert(scan);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/organization/machine_ajax',
            data: {
                [csrfName]: csrfHash,
                'mc_no': scan
            },
            success: function(data) {


                //alert("success");
                // alert(data);

                $('#machine_ip').html(data);
            }
        });
    });




    // $('#vehicle_number').on('change', function () {
    // 	   var vehicle_number = $("#vehicle_number").val();
    // 	  // alert(vehicle_number);
    // 	   	$.ajax({
    //         type:'POST',
    //         url:'<?php echo base_url('index.php/user/fetch_cbwtf_ajax_data') ?>',
    //         data:{[csrfName]: csrfHash,'vehicle_number':vehicle_number},
    //         success:function(data){
    //         	//alert('success');
    //         	$('#plant_name').html(data);
    //         }
    //     });
    // 	});
</script>