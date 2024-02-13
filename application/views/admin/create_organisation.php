<?php
if (!isset($_SESSION['bmw_email'])) {

  return redirect('index.php/admin');
} else {
  $admin_session = $_SESSION['bmw_email'];
  $random = rand(102548, 984675);
  $date = date('Y-m-d');
?>
  <?php include('public/includes/headernav.php') ?>

  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 pl-0">
          <?php include('public/includes/sidenav.php') ?>
        </div>
        <div class="col-md-10">
        <div class="alertback">
          <?php if ($this->session->flashdata('success')) { ?>
            
              <div class="alert alert-success alert-white rounded alertrsize">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-check"></i></div>
                <p><?php echo $data1 = $this->session->flashdata('success');  ?></p>
              </div>
           
          <?php } else {} ?>

          <?php if ($this->session->flashdata('error')) { ?>
          
              <div class="alert alert-danger alert-white rounded alertrsize">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-check"></i></div>
                <p><?php echo $data1 = $this->session->flashdata('error');  ?></p>
              </div>
          <?php } else {} ?>
          </div>

          <div class="row adm-cont p-t-40">
            <form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="create_organisation" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
              <h5>Create HCF Master</h5>

              <div class="row">
                <div class="col-md-6">
                  <!-- <?php echo validation_errors(); ?> -->

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">HCF Name :</label></div>
                      <div class="col-md-8"><input type="text" class="form-control" placeholder="Enter HCF Name" required="required" name="cat_name" id="cat_name" value="<?php echo set_value('cat_name'); ?>"></div>

                      <div class="ml-3 text-danger"><?php echo form_error('cat_name') ?></div>
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="hcf_category">HCF Type:</label></div>
                      <div class="col-md-8">
                        <select class="form-control" name="hcf_category" id="hcf_category" required="required">
                          <option value="">-Select Type-</option>
                          <?php foreach ($get_hcf_data as $row2) {
                            if ($row2['remove'] == 1) {
                            } else {



                          ?> <option value="<?php echo $row2['Type']; ?>">
                            <?php
                              echo $row2['Type'];
                            }
                          }

                            ?>
                        </select>

                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('hcf_category') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">Contact:</label></div>
                      <div class="col-md-8"><input type="text" name="mobile" class="form-control" placeholder="Enter Contact No." required="required" id="mobile" value="<?php echo set_value('mobile'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('mobile') ?></div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">Email:</label></div>
                      <div class="col-md-8"><input type="email" name="email" class="form-control" placeholder="Enter Email Address" required="required" id="email" value="<?php echo set_value('email'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('email') ?></div>
                    </div>
                  </div>
<!-- 
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="district">District :</label></div>
                      <div class="col-md-8">
                        <select class="form-control" name="district" required="required" id="district">
                          <option value="">-Select District-</option>
                          <?php


                          foreach ($get_district_data as $row) {
                            if ($row['remove'] == 1) {
                            } else {
                          ?>

                              <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                          <?php }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('district') ?></div>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="district">District :</label></div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="district" required="required" id="district" value="<?php echo $district; ?>" readonly>
                      
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('district') ?></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="areatype">Adminstrative Unit:</label></div>
                      <div class="col-md-8">
                        <select class="form-control" id="department" required="required" name="department">
                          <option value="">-Select Adminstrative Division Unit-</option>
                          <?php  foreach($get_unit_data as $row) {   ?>

                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name'] ;?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('department') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">Choose Area:</label></div>
                      <div class="col-md-8">
                        <!-- <select class="form-control" id="area" required="required" name="area">
                          <option value="">-Select Area-</option>
                        </select> -->
                        <input type="text"  class="form-control" id="area" required="required" name="area" placeholder="Enter Area Of HCF" value="<?php echo set_value('area'); ?>" >

                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('area') ?></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">HCF Code:</label></div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" id="hcf_code" require="require" name="hcf_code" placeholder="Enter HCF Code" value="<?php echo set_value('hcf_code'); ?>">
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('hcf_code') ?></div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6">



                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="date">HCF Short Name:</label></div>
                      <div class="col-md-8"><input type="text" class="form-control" required="required" placeholder="Enter HCF short Name" id="org_short_name" name="org_short_name" value="<?php echo set_value('org_short_name'); ?>" style="text-transform:uppercase"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('org_short_name') ?></div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">HCF Category:</label></div>
                      <div class="col-md-8">
                        <select class="form-control" name="mediacl_type" id="mediacl_type" required="required">
                          <option value="">-Select Category-</option>
                          <?php

                          foreach ($get_org_cat as $row) {
                            if ($row['remove'] == 1) {
                            } else {
                          ?>

                              <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                          <?php }
                          }
                          ?>
                        </select>

                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('mediacl_type') ?></div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="date">Date:</label></div>
                      <div class="col-md-8"><input type="date" class="form-control" required="required" id="date" name="date" value="<?php echo date('Y-m-d'); ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('date') ?></div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">Authorized Person:</label></div>
                      <div class="col-md-8"><input type="text" name="manager_name" required="required" class="form-control" placeholder="Enter Authorized Person Name" value="<?php echo set_value('manager_name'); ?>" id="manager_name"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('manager_name') ?></div>
                  </div>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">Auth. Person Mobile:</label></div>
                      <div class="col-md-8"><input type="text" name="manager_mobile" required="required" class="form-control" placeholder="Enter Authorized Person Mobile No." id="manager_mobile" value="<?php echo set_value('manager_mobile'); ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('manager_mobile') ?></div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="address">Address:</label></div>
                      <div class="col-md-8"><input type="text" class="form-control" name="address" placeholder="Enter Address" required="required" id="address" value="<?php echo set_value('address'); ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('address') ?></div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="date">Pincode:</label></div>
                      <div class="col-md-8"><input type="text" class="form-control" required="required" placeholder="Enter Pin No." id="Pincode" name="Pincode" value="<?php echo set_value('Pincode'); ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('Pincode') ?></div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="date">Latitude:</label></div>
                      <div class="col-md-8"><input type="text" class="form-control" required="required" placeholder="Enter Latitude" id="latitude" name="latitude" value="<?php echo set_value('latitude'); ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('latitude') ?></div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="date">Longitude:</label></div>
                      <div class="col-md-8"><input type="text" class="form-control" required="required" placeholder="Enter Longitude" id="longitude" name="longitude" value="<?php echo set_value('longitude'); ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('longitude') ?></div>
                  </div>



                </div>
              </div>


              <div class="row  p-t-20" style="float: right;">
                <div class="col text-right">
                  <input type="hidden" id="random_number" name="random_number" value="<?php echo rand(100, 9999); ?>" />
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>



              <?php $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
              ); ?>
              <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

            </form>
          </div>

          <div class="row p-t-40">

            <h5>Records</h5>
            <table class="table table-striped table-responsieve table-bordered" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Sl</th>
                  <th scope="col">Name</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th> 
                  <!-- <th scope="col">Divison</th>
                  <th scope="col">Area</th> -->
                  <th scope="col">HCF Type</th> 
                  <th scope="col">Category</th>
                   <th scope="col">Manager Name</th>
								  <th scope="col">Manager Mobile</th> 
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($get_organization_data as $row) {

                  if ($row['remove'] == 1) {
                  } else {
                ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['org_name']; ?></td>
                      <td><?php echo $row['mobile']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <!-- <td><?php echo $row['district']; ?></td> -->
                      <!-- <td><?php echo $row['department']; ?></td> -->
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['medical_type']; ?></td>
                      <td><?php echo $row['hcf_category']; ?></td>
                       <td><?php echo $row['manager_name']; ?></td>
										  <td><?php echo $row['manager_mobile']; ?></td>
                      <td><?php echo $row['date']; ?></td>
                      <td>
                        <a href="<?php echo site_url('index.php/admin/edit_create_organisation/') . $row['id']; ?>" class="btn btn-primary org-btn rounded">&#9998; </a>
                        <a href="<?php echo base_url('index.php/admin/delete_create_organisation/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" Style="display:none">Delete</a>
                        <div class="pt-1">
                          <a href="<?php echo base_url('index.php/admin/remove_create_organisation/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</a>
                        </div>
                      </td>
                    </tr>
                <?php }
                  $i++;
                } ?>
              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <?php include('public/includes/footer.php'); ?>
  </footer>


<?php } ?>

<script>
  var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';




 // $('#district').on('click', function() {
  // $(document).ready(function() {
  //   var district = $("#district").val();
  //   $.ajax({
  //     type: 'POST',
  //     url: '<?php echo base_url('index.php/admin/ajax_get_department') ?>',
  //     data: {
  //       [csrfName]: csrfHash,
  //       'district': district
  //     },
  //     success: function(data) {

  //       $('#department').html(data);

  //     }
  //   });
  // });





  // $('#department').on('change', function() {
  //   var department = $("#department").val();
  //   var district = $("#district").val();
  //   $.ajax({
  //     type: 'POST',
  //     url: '<?php echo base_url('index.php/admin/ajax_get_area') ?>',
  //     data: {
  //       [csrfName]: csrfHash,
  //       'department': department,
  //       'district':district
  //     },
  //     success: function(data) {
  //       $('#area').html(data);
  //     }
  //   });
  // });


  //     document.querySelector("input").addEventListener("input", function(event) {
  //   var input = event.target;
  //   var start = input.selectionStart;
  //   var end = input.selectionEnd;
  //   input.value = input.value.toLocaleUpperCase();
  //   input.setSelectionRange(start, end);
  // })
</script>