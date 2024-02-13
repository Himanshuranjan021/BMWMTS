<?php
if (!isset($_SESSION['bmw_email'])) {
  return redirect('index.php/admin');
} else {
  $admin_session = $_SESSION['bmw_email'];
  $random = rand(102548, 984675);
  $date = date('Y-m-d');
  // extract($get_org_data);
?>
  <?php include('public/includes/headernav.php') ?>

  <section>
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-md-2">
          <?php include('public/includes/sidenav.php') ?>
        </div>
        <div class="col-md-10" style="min-height:120vh;">

          <div class="row adm-cont p-t-40">

            <form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action=" <?php echo base_url() ?>index.php/admin/edit_create_organisation/<?php echo $get_org_data['id']; ?>" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
              <h5>Edit Organization Master</h5>

              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">HCF Name :</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" placeholder="Name" required="required" name="cat_name" id="cat_name" value="<?php echo $get_org_data['org_name']; ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('cat_name') ?></div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="hcf_category">HCF Type:</label></div>
                      <div class="col-md-9">
                        <select class="form-control" name="hcf_category" id="hcf_category" required="required">
                          <option value="<?php echo $get_org_data['hcf_category']; ?>"><?php echo $get_org_data['hcf_category']; ?></option>
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
                      <div class="col-md-3"><label for="name">Contact:</label></div>
                      <div class="col-md-9"><input type="text" name="mobile" class="form-control" placeholder="Phone No." required="required" id="mobile" value="<?php echo $get_org_data['mobile']; ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('mobile') ?></div>

                    </div>
                  </div>

                  <!-- <div class="form-group">
                      <div class="row">
                        <div class="col-md-3"><label for="name">Email:</label></div>
                        <div class="col-md-9"><input type="email" name="email" class="form-control"  required="required"  id="email"  value="<?php echo $get_org_data['email']; ?>"></div>
                        <div class="ml-3 text-danger"><?php echo form_error('email') ?></div>
                      </div>
                    </div> -->




                <!-- <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="district">District:</label></div>
                      <div class="col-md-9">
                        <select class="form-control" name="district" required="required" id="district">
                          <option value="<?php echo $get_org_data['district']; ?>"><?php echo $get_org_data['district']; ?></option>
                          <option value="">--Select--</option>
                          <?php
                          foreach ($get_district_data as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('district') ?></div>
                    </div>
                  </div>  -->

                   <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="district">District:</label></div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="district" required="required" id="district" value="<?php echo $get_org_data['district']; ?>" readonly>
                         
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('district') ?></div>
                    </div>
                  </div>  


                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="areatype">Adminstrative Unit:</label></div>
                      <div class="col-md-9">
                        <select class="form-control" id="department" required="required" name="department">
                          <option value="<?php echo $get_org_data['department']; ?>"><?php echo $get_org_data['department']; ?></option>
                          <option value="">-Select-</option>
                          <?php
                          foreach ($adv_unit as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('department') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Choose Area:</label></div>
                      <div class="col-md-9">
                  
                        <input type="text" class="form-control" id="area" required="required" name="area" value="<?php echo $get_org_data['area']; ?>" placeholder="Enter Area Here">

                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('area') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">HCF Code:</label></div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="hcf_code" require="require" name="hcf_code" placeholder="Enter HCF Code" value="<?php echo $get_org_data['random_number'];  ?>" readonly>
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('hcf_code') ?></div>
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="date">Pincode:</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" required="required" placeholder="Enter Pin No." id="Pincode" name="Pincode" value="<?php echo $get_org_data['Pincode']; ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('Pincode') ?></div>
                  </div>


                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="date">HCF Short Name</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" required="required" placeholder="Enter short Name" id="org_short_name" name="org_short_name" value="<?php echo $get_org_data['short_name']; ?>" style="text-transform:uppercase" readonly></div>
                      <div class="ml-3 text-danger"><?php echo form_error('org_short_name') ?></div>
                    </div>
                  </div>




                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">HCF Category:</label></div>
                      <div class="col-md-9">
                        <select class="form-control" name="mediacl_type" id="mediacl_type" required="required">

                          <option value="<?php echo $get_org_data['medical_type']; ?>"><?php echo $get_org_data['medical_type']; ?></option>
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
                      <div class="col-md-3"><label for="date">Date:</label></div>
                      <div class="col-md-9"><input type="date" class="form-control" required="required" placeholder="Pin No." id="date" name="date" value="<?php echo $get_org_data['date']; ?>" readonly></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('date') ?></div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Authorized Person :</label></div>
                      <div class="col-md-9"><input type="text" name="manager_name" required="required" class="form-control" placeholder="Authorized Person" id="manager_name" value="<?php echo $get_org_data['manager_name']; ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('manager_name') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Auth.Person Mobile:</label></div>
                      <div class="col-md-9"><input type="text" name="manager_mobile" required="required" class="form-control" placeholder="Authorized Person mobile" id="manager_mobile" value="<?php echo $get_org_data['manager_mobile']; ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('manager_mobile') ?></div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="address">Address :</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" name="address" placeholder="address" required="required" id="address" value="<?php echo $get_org_data['address']; ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('address') ?></div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="date">Latitude:</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" required="required" placeholder="Enter Latitude" id="latitude" name="latitude" value="<?php echo $get_org_data['latitude']; ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('latitude') ?></div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="date">Longitude:</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" required="required" placeholder="Enter Longitude" id="longitude" name="longitude" value="<?php echo $get_org_data['longitude']; ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('longitude') ?></div>
                  </div>


                </div>
              </div>


              <div class="row  p-t-20" style="float: right;">
                <div class="col text-right">
                  <input type="hidden" id="random_number" name="random_number" value="<?php echo rand(100, 9999); ?>" />
                  <a href="<?php echo base_url() ?>index.php/admin/create_organisation">
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
  </section>

  <footer class="footer">
    <?php include('public/includes/footer.php'); ?>
  </footer>


  <!-- wrapper Ends -->

<?php } ?>

<script>

var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

  // //$('#district').on('change', function() {
  // $(document).ready(function() {
  //   var district = $("#district").val();
  //   //alert(district);
  //   $.ajax({
  //     type: 'POST',
  //     url: '<?php echo base_url('index.php/admin/ajax_get_department') ?>',
  //     data: {
  //       [csrfName]: csrfHash,
  //       'district': district
  //     },
  //     success: function(data) {
  //       alert('');
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
  //       //alert(data);
  //       $('#area').html(data);
  //     }
  //   });
  // });
</script>