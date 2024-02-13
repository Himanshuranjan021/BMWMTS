<?php
echo $error_msg = isset($error_message) ? $error_message : '';
?>

<style>
.loginew {
    background: #ffffffbf;
    margin-top: 1%!important;
    border-radius: 8px;
    padding: 0!important;
}

</style>

<!-- <?php
      //session_start();
      if ($_POST["vercode"] != $_SESSION["vercode"] or $_SESSION["vercode"] == '') {
        echo "<script>alert('Incorrect verification code');</script>";
      } else {
        echo "<script>alert('Verification code match !');</script>";
      }
      ?> -->
<!DOCTYPE html>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bio-Medical Waste Management</title>
  <!-- Bootstrap CSS -->

	<link href="<?php echo base_url(); ?>public/assets/admin_new/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/assets/admin_new/css/style2.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/admin_new/css/datatable.bootstrap.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<?php include('application/views/header.php') ?>
<body style="background: linear-gradient(45deg, transparent,#99d5c3);  overflow:hidden;">
  <!-- <body style="background: linear-gradient(45deg, transparent,#99d5c3);"> -->

  <div class="container-fluid">
    <div class="row" >
      <!-- <div class="col-md-4 offset-4"> -->

      <div class="loginew col-md-10 col-12" style="margin: 0px auto;">
       
		<div class="row" style="padding: 20px;">
			<div class="col-md-12">
				<table  class="table table-striped table-bordered  " id="myTable" role="grid" aria-describedby="myTable_info">
					<thead>
						<tr role="row">
							<th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 12.5px;">Id</th>
							<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Machine IP</th>
							<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 38.0273px;">Machine NO.</th>
							<th scope="col" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 52.4219px;">Date</th>

						</tr>
					</thead>
					<tbody>

						<?php
						$i = 1;
						foreach ($get_table_data as $row) { ?>

							<tr class="odd">
								<!-- <th scope="row" class="sorting_1">1</th> -->
								<td align="center"> <?php echo $i; ?> </td>
								<td align="center"><?php echo $row['mac_id']; ?></td>
								<td align="center"><?php echo $row['id']; ?></td>
								<td align="center"><?php echo $row['date_time']; ?></td>
							</tr>
						<?php $i++;
						} ?>
					</tbody>
				</table>
			</div>
        </div>
      </div>
    </div>
    <div class="col-md-4"> </div>

  </div>
  </div>
</body>

<script src="<?php echo base_url();?>public/assets/admin_new/js/jquery-3.3.1.min.js"></script>
 <script src="<?php echo base_url();?>public/assets/admin_new/js/bootstrap.bundle.js"></script>

  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

 
<script>
$(document).ready( function () {
   $('#myTable').DataTable();
} );
</script>
</html>
<style>
  #refresh {
    float: right;
    margin-top: -10px;
    margin-right: 10px;
    margin-left: 20px;
    width: 30px;
    height: 30px;
  }
</style>