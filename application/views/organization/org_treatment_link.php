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
        <div class="col-md-10" style="height:120vh;">
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

          <div class="row adm-cont p-t-40">
            <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/org_treatment_link" method="post">
              <h5>Link CBWTF</h5>
              <!-- <div class="row float-md-right">
                   <div><a href="#"><img class="org-rset" src="img/reset.png"></a></div>
               </div> -->
              <div class="row">


                <div class="col-md-6">

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3"><label for="email">HCF Name:</label></div>
                      <div class="col-md-9">
                        <input type="text" id="email" class="form-control" name="" placeholder="HCF Name" rows="2" value="<?php $org_name = $this->session->userdata('bmw_org_name'); echo $org_name; ?>" readonly required>
                        <input type="hidden"   name="hcf_name" value="<?php $org_name = $this->session->userdata('bmw_org_id'); echo $org_name; ?>" readonly required>
                      </div>
                      <div class="text-danger ml-2"><?php echo form_error('hcf_name'); ?></div>
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                        <label for="department">Select CBWTF:</label>
                      </div>
                      <div class="col-md-9">

                        <select class="form-control" name="plant_name" required>
                          <option value="">-Select-</option>
                          <?php

                          foreach ($get_treatment_plant_data as $row2) {

                          ?>
                            <option value="<?php echo $row2['id']; ?>">
                            <?php
                            echo $row2['Plant_name'];
                          }

                            ?>
                            </option>

                        </select>
                      </div>
                      <div class="text-danger ml-2"><?php echo form_error('plant_name'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">


                  <div class="row  p-t-40">
                    <div class="col text-right">
                      <button type="submit" class="btn btn-primary org-btn">Submit</button>

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
        <div class="row p-t-40 ">
          <div class="col">

            <table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
              <thead>
                <tr role="row">
                  <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 101.602px;">ID</th>
                  <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label=" Name: activate to sort column ascending" style="width: 136.113px;"> Department</th>


                  <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Action : activate to sort column ascending" style="width: 314.18px;">Action </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($get_treatment_data as $row1) {
                  if ($row1['remove'] == 1) {
                  } else {

                ?>
                    <tr class="odd">
                      <th scope="row" class="sorting_1"> <?php echo $i; ?></th>
                      <td><?php echo $row1['plant_name'] ?></td>

                      <td>


                        <a href="<?php echo base_url('index.php/organization/org_treatment_link_delete/') . $row1['link_id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" Style='display:none'>Delete</button></a>

                        <a href="<?php echo base_url('index.php/organization/org_treatment_link_remove/') . $row1['link_id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>




                      </td>
                    </tr>
              </tbody>
          <?php }
                  $i++;
                } ?>

            </table>
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