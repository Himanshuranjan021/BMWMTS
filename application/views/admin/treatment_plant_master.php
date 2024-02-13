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
        <div class="col-md-10" style="min-height:120vh;">

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

            <form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="treatment_plant_master" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
              <h5>Create CBWTF Master</h5>

              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">CBWTF:</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" placeholder="Name" required="required" name="name" id="name" value="<?php echo set_value('name'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('name') ?></div>
                    </div>
                  </div>




                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="district">District :</label></div>
                      <div class="col-md-9">
                        <select class="form-control" name="district" required="required" id="district">
                          <option value="">-Select-</option>
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
                      <div class="col-md-3"><label for="areatype">Adminstrative Unit:</label></div>
                      <div class="col-md-9">
                        <select class="form-control" id="department" required="required" name="department">
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
                        <!-- <select class="form-control" id="area" required="required" name="area">
                          <option value="">-Select-</option>
                        </select> -->
                        <input type="text" class="form-control" id="area" required="required" name="area" placeholder="Enter CBWTF Area">

                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('area') ?></div>
                    </div>
                  </div>


                </div>

                <div class="col-md-6">




                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Authorized Mobile :</label></div>
                      <div class="col-md-9"><input type="text" name="authorized_mobile" required="required" class="form-control" placeholder="Mobile Number" id="manager_mobile" value="<?php echo set_value('authorized_mobile'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('authorized_mobile') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="name">Email:</label></div>
                      <div class="col-md-9"><input type="email" name="email" required="required" class="form-control" placeholder="Email Id" id="email" value="<?php echo set_value('email'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('email') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="date">Date:</label></div>
                      <div class="col-md-9"><input type="date" class="form-control" required="required" id="date" name="date" value="<?php echo date('Y-m-d') ?>"></div>

                      <div class="ml-3 text-danger"><?php echo form_error('date') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="date">Address:</label></div>
                      <div class="col-md-9"><input type="text" class="form-control" required="required" placeholder="Address" id="address" name="address" value="<?php echo set_value('address'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('address') ?></div>
                    </div>
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
            <div class="col">
              <h5>Records</h5>
              <table class="table table-striped table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">CBWTF Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">District</th>
                    <!-- <th scope="col">Department Name</th> -->
                    <th scope="col">Area</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($get_treatment_data as $row) {

                    if ($row['remove'] == 1) {
                    } else {
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['Plant_name']; ?></td>
                        <td><?php echo $row['authorise_mobile']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['district']; ?></td>
                        <!-- <td><?php echo $row['department']; ?></td> -->
                        <td><?php echo $row['area']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                          <a href="<?php echo site_url('index.php/admin/treatment_plant_master_edit/') . $row['id']; ?>" class="btn btn-primary org-btn rounded">&#9998; </a>
                          <a href="<?php echo base_url('index.php/admin/treatment_plant_master_delete/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" style="display:none">Delete</a>
                          <div class="pt-1">
                            <a href="<?php echo base_url('index.php/admin/treatment_plant_master_remove/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</a>
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
  //       'district' : district
  //     },
  //     success: function(data) {
  //       //alert(data);
  //       $('#area').html(data);
  //     }
  //   });
  // });
</script>