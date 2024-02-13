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
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-md-2">
          <?php include('public/includes/sidenav.php') ?>
        </div>
        <div class="col-md-10" style="min-height:100vh;">

          <div class="row adm-cont p-t-40">
            <!-- <?php echo validation_errors(); ?> -->

            <form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="<?php echo base_url() ?>index.php/admin/treatment_plant_master_edit/<?php echo $get_treatment_data['id']; ?>" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
              <h5>Edit CBWTF Master</h5>

              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">CBWTF:</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" require="require" name="name" id="name" value="<?php echo $get_treatment_data['Plant_name']; ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('name') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="district">District :</label></div>
                      <div class="col-md-9">
                        <select class="form-control" name="district" require="require" id="district">
                          <option value=" <?php echo $get_treatment_data['district']; ?>"> <?php echo $get_treatment_data['district']; ?></option>
                          <option value="">--Select--</option>
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
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="areatype">Division Name:</label></div>
                      <div class="col-md-9">

                        <select class="form-control" id="department" require="require" name="department">
                          <option value=" <?php echo $get_treatment_data['department']; ?>"> <?php echo $get_treatment_data['department']; ?></option>
                          <option value="">--Select--</option>
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
                      <div class="col-md-3"><label for="name"> Area:</label></div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="area" require="require" name="area" placeholder="Enter CBWTF Area" value=" <?php echo $get_treatment_data['area']; ?>">
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('area') ?></div>
                    </div>
                  </div>

                 

                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Authorized Mobile :</label></div>
                      <div class="col-md-9"><input type="text" name="authorized_mobile" require="require" class="form-control" value="<?php echo $get_treatment_data['authorise_mobile']; ?>" id="authorized_mobile"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('authorized_mobile') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="date">Date:</label></div>
                      <div class="col-md-9"><input type="date" class="form-control" require="require" placeholder="Pin No." id="date" name="date" value="<?php echo $get_treatment_data['date']; ?>" readonly></div>
                      <div class="ml-3 text-danger"><?php echo form_error('date') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="date">Address:</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" require="require" placeholder="Address" id="address" name="address" value="<?php echo $get_treatment_data['address']; ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('address') ?></div>
                    </div>
                  </div>



                </div>
              </div>


              <div class="row  p-t-20" style="float: right;">
                <div class="col text-right">
                  <a href="<?php echo base_url() ?>index.php/admin/treatment_plant_master">
                    <input type="button" value="Cancel" class="btn btn-warning" />
                  </a>
                  <input type="hidden" id="random_number" name="random_number" value="<?php echo rand(100, 9999); ?>" />
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
  // var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
  //   csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

  // $('#district').on('change', function() {
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
  //       //alert(data);
  //       $('#area').html(data);
  //     }
  //   });
  // });
</script>