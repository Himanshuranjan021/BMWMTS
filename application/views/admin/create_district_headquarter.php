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
            <form id="templatemo-preferences-form" class="orgisation-m-frm" accept-charset="utf-8" method="post" action="create_district_headquarter" name="vehicleform" enctype="multipart/form-data" onsubmit="return checkForm()">
              <h5>Create District H.Q Master</h5>
              <div class="row">
                <div class="col-md-6">
                  <!-- <?php echo validation_errors(); ?> -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="district">District :</label></div>
                      <div class="col-md-8">
                        <select class="form-control" name="district" required="required" id="district">
                          <option value="">-Select District-</option>
                          <?php


                          foreach ($get_district_data as $row) {

                          ?>

                            <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="ml-3 text-danger"><?php echo form_error('district') ?></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">Authorized Person:</label></div>
                      <div class="col-md-8"><input type="text" name="auth_person" required="required" class="form-control" placeholder="Enter Authorized Person Name" value="<?php echo set_value('auth_person'); ?>" id="manager_name"></div>
                    </div>
                    <div class="ml-3 text-danger"><?php echo form_error('auth_person') ?></div>
                  </div>



                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">Contact:</label></div>
                      <div class="col-md-8"><input type="text" name="mobile" class="form-control" placeholder="Enter Contact No." required="required" id="mobile" value="<?php echo set_value('mobile'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('mobile') ?></div>
                    </div>
                  </div>




                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="name">Email:</label></div>
                      <div class="col-md-8"><input type="email" name="email" class="form-control" placeholder="Enter Email Address" required="required" id="email" value="<?php echo set_value('email'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('email') ?></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4"><label for="designation">Designation:</label></div>
                      <div class="col-md-8"><input type="text" name="designation" class="form-control" placeholder="Enter Designation" required="required" id="designation" value="<?php echo set_value('designation'); ?>"></div>
                      <div class="ml-3 text-danger"><?php echo form_error('designation') ?></div>
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

            <h5>Records</h5>
            <table class="table table-striped table-responsive table-bordered" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Sl</th>
                  <th scope="col">District</th>
                  <th scope="col">Auth. Person</th>
                  <th scope="col">Designation</th>
                  <th scope="col">Mobile</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($get_district_hq_data as $row) {

                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['district']; ?></td>
                    <td><?php echo $row['auth_person']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                      <a href="<?php echo site_url('index.php/admin/district_headquarter_edit/') . $row['id']; ?>" class="btn btn-primary org-btn rounded">&#9998; </a>
                      <a href="<?php echo base_url('index.php/admin/delete_create_organisation/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" Style="display:none">Delete</a>
                      <div class="pt-1">
                        <a href="<?php echo base_url('index.php/admin/delete_district_hq/') . $row['id']; ?>" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</a>
                      </div>
                    </td>
                  </tr>
                <?php
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
  //   $.ajax({
  //     type: 'POST',
  //     url: '<?php echo base_url('index.php/admin/ajax_get_area') ?>',
  //     data: {
  //       [csrfName]: csrfHash,
  //       'department': department
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

<script>
  $(".close").click(function() {
    $(this).parent().fadeOut();
  })
</script>