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

                    <div class="row adm-cont p-t-40">

                        <form class="orgisation-m-frm" action="<?php echo base_url() ?>index.php/organization/occupancy" method="post" enctype="multipart/form-data">
                            <h5>Register Occupancy</h5>
                            <table class="table table1 table-bordered table-hover">
                            <div class="text-danger ml-2"> <?php echo validation_errors(); ?></div>
                           
          <thead>
            <tr>
              <td width="2%"><input id="check_all" class="formcontrol" type="checkbox"></th>
              <td width="9%">Date</td>   
              <td width="12%">Department</td>  
              <td width="12%">Word</td>         
              <td width="12%">Occupancy</td>
             
            </tr>
          </thead>
          <tbody>
                        <tr>
              <td><input class="case" type="checkbox"></td>

               <td>
                <input type="date" data-type="date" name="date[]" id="date_1" class="form-control" require="require">
              </td>
                   

               

			
              <td>
             
              <select class="form-control" name="dept_name[]" id="dept_1" require>
                <option value="">-Select-</option>
                <?php foreach ($get_department_data as $row2) {
					if($row2['remove']==1)
					{
								  
					}
						else{
													
													
													
													
						?>
					<option value="<?php echo $row2['dept_name']; ?>">
					<?php
							echo $row2['dept_name'];
								}
								}

					?>


                </option>
             </select>
              </td>
               
                <td width="8%">
               
                <select class="form-control" name="ward_name[]" id="ward_1" require>
                <option value="">-Select-</option>
                <?php foreach ($get_ward_data as $row2) { ?>
                <option value="<?php echo $row2['ward_name']; ?>">                              
                <?php   echo $row2['ward_name'];} ?>                          
                </option>
                </select>
                </td>

               <td>
              <input type="number"  name="occupancy[]" id="occupancy_1" class="form-control autocomplete_txt" require="require">
              
              </td>

             
            </tr>
           
           
          </tbody>
        </table> 

        <div class="btn-action float-clear pt-3">
             <button class="btn btn-danger delete" type="button"> Delete</button>
             <button class="btn btn-primary addmore" type="button"> Add More</button>
          </div>
                            
                               

                            
                            <div class="row  p-t-40">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-primary org-btn rounded">Submit</button>

                                </div>
                            </div>
                            </div>    
                            
                            <?php    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash());?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

                        </form>

                        <div class="row p-t-40 ">
                            <div class="col">
                                <div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <!-- <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="myTable_length"><label>Show <select name="myTable_length" aria-controls="myTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="myTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="myTable"></label></div>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 12.5px;">Id</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Department Name</th>

                                                         <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">Ward Name</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">Occupancy</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 55.1758px;">date</th>
                                                        <th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Function: activate to sort column ascending" style="width: 55.8984px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $i = 1;
                                                    foreach ($get_table_data as $row) {
                                                        
                                                        if($row['remove']==1)
                                                        {

                                                        }
                                                        else{
                                                                            
                                                        
                                                        ?>

                                                        <tr class="odd">
                                                            <!-- <th scope="row" class="sorting_1">1</th> -->
                                                            <td align="center"> <?php echo $i; ?> </td>
                                                            <td align="center"><?php echo $row['department']; ?></td>
                                                            <td align="center"><?php echo $row['ward']; ?></td>
                        
                                                            <td align="center"><?php echo $row['occupancy']; ?></td>
                                                            <td align="center"><?php echo $row['date']; ?></td>
                                                          

                                                            <th class="d-flex">
                                                               

                                                                
                                                                <div class="pl-2">
                                                                <a href="<?php echo base_url('index.php/organization/remove_occupancy/') . $row['id']; ?>"><button type="submit" class="btn btn-danger org-btn rounded" onclick="return confirm('Are you sure you want to delete this item?');">&#10060;</button></a>
                                                                </div>
                                                               

                                                            </th>
                                                        </tr>
                                                    <?php   $i++; }
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
//adds extra table rows
var i=$('.table1 tr').length;
$(".addmore").on('click',function(){ 
	 html = '<tr>';
	 html += '<td><input class="case" type="checkbox"/></td>';
	 html += '<td><input type="date" name="date[]" id="date'+i+'" class="form-control changesNo"  autocomplete="off" ondrop="return false;" onpaste="return false;" require></td>';
	  html += '<td><select name="dept_name[]" id="dept_'+i+'" class="form-control"><option value="">-Select-</option>'+i+ 
      '<?php foreach ($get_department_data as $row) { if($row['remove']==1){}else{ ?><option value="<?php echo $row['dept_name']; ?>"><?php echo $row['dept_name'];}}?></select></td>';
    
    

     html += '<td><select name="ward_name[]" id="ward_'+i+'"class="form-control"><option value="">-Select-</option>'+i+ 
     '<?php foreach ($get_ward_data as $row) { if($row['remove']==1){}else{ ?><option value="<?php echo $row['ward_name']; ?>"><?php echo $row['ward_name'];}}?></select></td>';
	
	 html += '<td><input type="number"  name="occupancy[]" id="occupancy_'+i+'" class="form-control" require></td>';
	
	
   html += '</tr>';

  $('.table1').append(html);
});

$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
});

</script>