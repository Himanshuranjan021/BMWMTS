<?php
header("Content-type: application/vnd-ms-excel");
$fileName = "report";
header("Content-Disposition: attachment; filename=" . $fileName . ".xls");
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

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 pl-0">

			</div>
			<div class="col-md-10 pt-5" style="min-height:100vh;">

				<div class="row" style="overflow-x:auto;">

					<table class="table table-striped table-bordered table-responsive dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
						<thead>
							<tr role="row">
								<th>SI</th>
								<th>HCF</th>
								<th>CTO Valid Upto</th>
								<th>CTO Applied On</th>
								<th>Authorization Valid Upto</th>
								<th>Authorization Applied On</th>
								<th>Aggrement With Cbwtf/OS Valid Upto</th>
								<th>Bed Strength</th>
								<th>No. of Deep burials</th>
								<th>No. of Sharp Pits</th>
								<th>No. of Autoclaves</th>
								<th>No. of Shredder</th>
								<th>No. of NST/HUB</th>
								<th>No. of ETP</th>
								<th>No. of STP</th>
								<th>No. of LMW</th>
								<th>Remarks</th>

							</tr>
						</thead>
						<tbody>

							<?php
							$i = 1;
							foreach ($get_profile_data as $row) { ?>

								<tr class="odd">
									<td><?php echo $i; ?></td>
									<td> <?php echo $row['organization_name']; ?> </td>
									<td> <?php echo $row['cto']; ?> </td>
									<td> <?php echo $row['cto_applied']; ?> </td>
									<td><?php echo $row['authorization']; ?></td>
									<td><?php echo $row['auth_applied']; ?></td>
									<td><?php echo $row['aggrement']; ?></td>
									<td><?php echo $row['strength']; ?></td>
									<td><?php echo $row['deep_burial']; ?></td>
									<td><?php echo $row['sharp_pit']; ?></td>
									<td><?php echo $row['autoclave']; ?></td>
									<td><?php echo $row['shredder']; ?></td>
									<td><?php echo $row['nst']; ?></td>
									<td><?php echo $row['etp']; ?></td>
									<td><?php echo $row['stp']; ?></td>
									<td><?php echo $row['lmw']; ?></td>
									<td><?php echo $row['remarks']; ?></td>


								</tr>
							<?php $i++;
							} ?>
						</tbody>
					</table>
				</div>


			</div>
		</div>
	</div>
	</div>

</body>

</html>