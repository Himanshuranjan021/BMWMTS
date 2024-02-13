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
    <h1><?php echo $this->session->userdata('bmw_org_name'); ?></h1>
    <h3>Verify Table Report</h3>


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
                                    <th>Barcode</th>
                                    <th>Category</th>
                                    <th>Weight</th>
                                    <th>Collection Date</th>
                                    <th>Issue Date</th>
                                    <th>Status</th>
                                </tr>
                                <?php $temp = '';
                                $i = 1;
                                foreach ($get_pdf_data as $row) { ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['collection_code']; ?></td>
                                        <td><?php echo $row['waste_category']; ?></td>
                                        <td><?php echo $row['code_weight']; ?></td>
                                        <td><?php echo $row['collection_date']; ?></td>
                                        <td><?php $row['issue_date'] == 0 ? $a = '' : $a = $row['issue_date'];
                                            echo $a; ?>
                                        </td>
                                        <td><?php $row['issue_date'] == 0 ? $a = 'Pending' : $a = 'Issued';
                                            echo $a; ?>
                                        </td>

                                    </tr>
                                <?php $i++;
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