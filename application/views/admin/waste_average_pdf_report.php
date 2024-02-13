<?php

require_once  'vendor/autoload.php';
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <style>
    table {
      border-collapse: collapse;
      border: 1px solid black;
    }

    tr {
      border: 1px solid black;
    }

    td {
      border: 1px solid black;

      text-align: center;
    }
  </style>



</head>

<body>
  <h1>Transaction Report</h1>

  <h5>From:<?php echo $input['start']; ?>- To:<?php echo $input['end']; ?></h5>
  <h5>District:<?php echo $input['district']; ?></h5>
  <h5>HCF:<?php echo $input['hcf']; ?></h5>


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
                  <th>Date</th>
                  <th>Department</th>
                  <th>Occupancy</th>
                  <th>Total Waste(in k.g)</th>
                  <th>Average(per Person)</th>
                </tr>
                <?php $temp = '';
                $i = 1;
                foreach ($get_pdf_data as $row) { ?>
                  <?php if ($temp == $row['organization']) {
                  } else {
                    echo  '<tr><td colspan="12"><b>' . $row['organization'] . '-' . $row['hcf_category'] . '</b></td></tr>';
                  } ?>
                  <tr>

                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['dept']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
                    <td><?php echo $row['weight']; ?></td>
                    <td>
                      <?php if ($row['remarks'] != 0) {
                        echo round($row['weight'] / $row['remarks'], 2);
                      } else echo '---' ?>
                    </td>
                  </tr>
                <?php $i++;
                  $temp = $row['organization'];
                } ?>
              </table>
            </div>
          </div>
        </div>
      </div>




</body>

</html>






<?php
$Output = ob_get_contents();
ob_end_clean();

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->WriteHTML($Output);

$mpdf->SetWatermarkText("Bio Medical Waste Management");
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->Output('report.pdf', 'D');


?>