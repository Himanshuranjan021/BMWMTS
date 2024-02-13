<?php
if (!isset($_SESSION['bmw_email'])) {
  return redirect('index.php/admin');
} else {
  $admin_session = $_SESSION['bmw_email'];
  $random = rand(102548, 984675);
  $date = date('Y-m-d');
  // extract($get_district_hq_data);
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

            <form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action=" <?php echo base_url() ?>index.php/admin/district_headquarter_edit/<?php echo $get_district_hq_data['id']; ?>" name="vehicleform" enctype="multipart/form-data">
              <h5>Edit District Headquarter</h5>

              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="district">District:</label></div>
                      <div class="col-md-9">
                        <select class="form-control" name="district" required="required" id="district">
                          <option value="<?php echo $get_district_hq_data['district']; ?>"><?php echo $get_district_hq_data['district']; ?></option>
                          <!-- <option value="">--Select--</option> -->
                          <!-- <?php
                          foreach ($get_district_data as $row) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                          }
                          ?> -->
                        </select>
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('district') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Authorized Person :</label></div>
                      <div class="col-md-9"><input type="text" name="auth_person" required="required" class="form-control" placeholder="Authorized Person" id="auth_person" value="<?php echo $get_district_hq_data['auth_person']; ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('auth_person') ?></div>
                    </div>
                  </div>

                 

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Email:</label></div>
                      <div class="col-md-9"><input type="email" name="email" class="form-control" required="required" readonly id="email" value="<?php echo $get_district_hq_data['email']; ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('email') ?></div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6">

                <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="areatype">Designation :</label></div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" id="designation" required="required" name="designation" value="<?php echo $get_district_hq_data['designation']; ?>">
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('designation') ?></div>
                    </div>
                  </div>

                

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Contact:</label></div>
                      <div class="col-md-9"><input type="text" name="mobile" required="required" class="form-control" placeholder="Authorized Person mobile" id="mobile" value="<?php echo $get_district_hq_data['mobile']; ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('mobile') ?></div>
                  </div>
<!-- 
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="address">Address :</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" name="address" placeholder="address" required="required" id="address" value="<?php echo $get_district_hq_data['address']; ?>"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('address') ?></div>
                  </div> -->



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
