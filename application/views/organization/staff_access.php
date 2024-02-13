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

                <div class="row adm-cont p-t-40">

                    <form class="orgisation-m-frm"
                        action="<?php echo base_url()?>index.php/organization/insert_staff_access" method="post">
                        <h5>Employee Access</h5>
                        <div class="row float-md-right">
                            <div> <a href="#"><img class="org-rset" src="img/reset.png"></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="row mt-2">
                                   <div class="col-md-3">
                                        <label for="name"> Select Name:</label>
                                    </div>
                                    <div class="col-md-9">

                                        <select class="form-control" name="name" required>
                                            <option value="">--Select--</option>
                                            <?php foreach ($get_register_staff_data as $row2) { ?>
                                            <option value="<?php echo $row2['name']; ?>">
                                                <?php
                                             echo $row2['name']."  M:- ".$row2['mobile'];
                                              }

                                              ?>
                                            </option>
                                        </select>
                                    </div> 
                                </div>
 				<div class="row mt-2">
                                    <div class="col-md-3"><label for="password">Password :</label></div>
                                    <div class="col-md-9"><input type="text" name="password" class="form-control"
                                            placeholder="Enter Password" id="password" required></div>
                                </div>



                               

                                <div class="row mt-2">
                                    <div class="col-md-3"><label for="Statename">Status:</label></div>
                                    <div class="col-md-6">

                                        <div class="form-group row">

                                            <div class="col-md-9">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="status" value="Active"
                                                        class="custom-control-input" checked="checked">
                                                    <label class="custom-control-label"
                                                        for="customRadio1">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="status" value="Inactive"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="customRadio2">Inactive</label>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- <input type="hidden"
                                            value="<?php echo $get_staff_access_data['department'] ?>"> -->

                                    </div>
                                </div>

                            </div>


                            <div class="col-md-6">
                                 <div class="row mt-2">
                                   
                                </div>


 				<div class="row mt-2">
                                    <div class="col-md-3"><label for="Statename">UserName:</label></div>
                                    <div class="col-md-9"><input type="name" name="username" class="form-control"
                                            placeholder="Enter username" id="DESC" required></div>
                                </div>

                               
                                <div class="row mt-2">
                                    <div class="col-md-3"><label for="password">Confirm Password :</label></div>
                                    <div class="col-md-9"><input type="text" name="Cpassword" class="form-control"
                                            placeholder="Confirm Password" id="Cpassword" required></div>
                                            <p class="text-info"> <?php  echo  "Password must be  8 Characters and should Contain Capital Letter,
                                             Small Letter  and a Number with a special Character[@,%,#]"; ?></p>
                                </div>
                            </div>
                        </div>
                                                    
                

                <div class="row  p-t-40">
                    <div class="col text-right">
                        <button type="submit" name="submit" class="btn btn-primary org-btn rounded">Submit</button>

                    </div>
                </div>

                </div>
                </form>



                <div class="row p-t-40 ">
                    <div class="col">
                        <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">

                                    <div class="col-sm-12 col-md-6">
                                        <div id="myTable_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="myTable"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered dataTable no-footer"
                                            id="myTable" role="grid" aria-describedby="myTable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th scope="col" class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="myTable" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="ID: activate to sort column descending"
                                                        style="width: 77.6367px;">ID</th>
                                                    <!-- <th scope="col" class="sorting" tabindex="0" aria-controls="myTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Department: activate to sort column ascending"
                                                        style="width: 170.898px;">Department</th>
                                                    <th scope="col" class="sorting" tabindex="0" aria-controls="myTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Ward: activate to sort column ascending"
                                                        style="width: 99.5312px;">Ward</th> -->
                                                    <th scope="col" class="sorting" tabindex="0" aria-controls="myTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Ward: activate to sort column ascending"
                                                        style="width: 99.5312px;">UserName</th>
                                                    <th scope="col" class="sorting" tabindex="0" aria-controls="myTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Status: activate to sort column ascending"
                                                        style="width: 107.949px;">Status</th>
                                                    <th scope="col" class="sorting" tabindex="0" aria-controls="myTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action : activate to sort column ascending"
                                                        style="width: 266.484px;">Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                                <?php  
                                                     $i=1;
                                                     foreach($get_staff_access_data as $row) { 
                                                        
                                                        if($row['remove']==1)
                                                        {
                    
                                                        }
                                                        else{
                                                          ?>

                                                <tr class="odd">
                                                    <th scope="row" class="sorting_1"><?php echo $i; ?></th>
                                                    <!-- <td><?php echo $row['department']; ?></td>
                                                    <td><?php echo $row['ward']; ?></td> -->

                                                    <td><?php echo $row['Username']; ?></td>
                                                    <td><?php echo $row['Status']; ?></td>
                                                    <td>
                                                        <a
                                                            href="<?php echo base_url('index.php/organization/edit_staff_access/').$row['id']; ?>"><button
                                                                type="submit"
                                                                class="btn btn-primary org-btn rounded">&#9998;</button></a>

                                                        <a
                                                            href="<?php echo base_url('index.php/organization/delete_staff_access/').$row['id']; ?>"><button
                                                                type="submit"
                                                                class="btn btn-danger org-btn rounded" Style="display:none">Delete</button></a>

                                                                <a
                                                            href="<?php echo base_url('index.php/organization/remove_staff_access/').$row['id']; ?>"><button
                                                                type="submit"
                                                                class="btn btn-danger org-btn rounded">&#10060;</button></a>

                                                    </td>

                                                </tr>
                                                <?php  $i++; }
                                            
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
function validatePassword() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("Cpassword").value;
    pass1 != pass2 ? document.getElementById("Cpassword").setCustomValidity("Password doesn't Match") : document
        .getElementById("Cpassword").setCustomValidity('');
    //pass1.length > 7 ? document.getElementById("password").setCustomValidity("") : document.getElementById("password").setCustomValidity('Enter a valid a password Minimun length 8 character');

    pass1.match(/[a-z]/g) && pass1.match(/[A-Z]/g) && pass1.match(/[0-9]/g) && pass1.length > 7 ? document
        .getElementById("password").setCustomValidity("") : document.getElementById("password").setCustomValidity(
            'Enter a valid a password ');

}

document.getElementsByName("submit")[0].onclick = validatePassword;
</script>