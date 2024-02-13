<?php 
require_once  'vendor/autoload.php';
 ob_start();

//include 'PHPExcel-master/PHPExcel/IOFactory.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
  
  table{
	  border-collapse: collapse;
	  border:1px solid black;
  }
  tr{
	  border:1px solid black;
  }
  td{
	  border:1px solid black;
    
      text-align:center;
  }
</style>



</head>
<body>
	<h1><?php echo $org =$this->session->userdata('bmw_org_name');?> </h1><br>
    <h3>Transaction  Report</h3>


<div class="row p-t-40">
				<div class="col">
					<div id="myTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
						<div class="row">
							<div class="col-sm-12 col-md-6">

								<div class="col-sm-12 col-md-6">
									<!-- <div id="myTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="myTable"></label></div> -->
								</div>
							</div>
							<div class="row">
						<div class="col-sm-12">
            
 <table class="table table-bordered table-responsive" width="100%">
  <tr>
    <th>SI</th>
	<th>Issue Code</th>
    <th>Issue Date and Time</th>
	<th>Weight</th>
	<th>Category</th>
	<th>Issued By</th>
    <th>Vehicle Number</th>
    <th>CBWTF</th>
	<!-- <th>Issue Date</th>
	<th>Issued By</th>
	<th>Vehicle Number</th>
	<th>CBWTF</th>
	<th>Receive Date</th>
	<th>Weight At CBWTF</th>
	<th>Reason If Descrepancy in Weight</th>
	<th>Disposal Date</th>
	<th>Disposal Method</th> -->
  </tr>
  <?php $count = 1;
  foreach($get_pdf_data as $row)
  { ?>

  <tr>
	  <td> <?php echo $count ;?></td>
	  <td><?php echo $row['issue_code'] ?></td>
    <td><?php echo $row['date_time'] ?></td>
    <td><?php echo $row['weight'] ?></td>
	<td><?php echo $row['waste_category'] ?></td>
	<td><?php echo $row['emp_name'] ?></td>
    <td><?php echo $row['vehicle_number'] ?></td>
    <td><?php echo $row['treatment_plant_name'] ?></td>

    <!-- <td><?php echo $row['issue_date'] ?></td>
    <td><?php echo $row['emp_name'] ?></td>
    <td><?php echo $row['vehicle_number'] ?></td>
	<td><?php echo $row['plant_name'] ?></td>
	<td><?php echo $row['treatment_date'] ?></td>
    <td><?php echo $row['weight_at_plant'] ?></td>
    <td><?php echo $row['reason'] ?></td>
	<td><?php echo $row['disposal_date'] ?></td>
    <td><?php echo $row['disposal_method'] ?></td> -->

	
  </tr>
<?php $count++; } ?>
</table> 
</div>
</div>




</body>
</html>






<?php

// $file_name = time().".xlsx";
//  $Output=ob_get_contents();
// $object_writer = PHPExcel_IOFactory::createWriter($Output, 'Excel2007');
// ob_end_clean();
// header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment;filename='.$file_name);
// $object_writer->save('php://output');


$Output=ob_get_contents();
ob_end_clean();

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->WriteHTML($Output);

$mpdf->SetWatermarkText("Bio Medical Waste Management");
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->Output('report.pdf','D');


?>