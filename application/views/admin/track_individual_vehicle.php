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
			<div class="row" style="min-height:100vh; ">
				<div class="col-md-2 pl-0">
					<?php include('public/includes/sidenav.php') ?>
				</div>

				<div class="col-md-10">
					<!-- <iframe src="https://aertrak-india.aeris.com/live-location-sharing/<?php echo $id; ?>" frameborder="0" height="900px" width="100%"></iframe> -->
					<object data="https://aertrak-india.aeris.com/live-location-sharing/<?php echo $id; ?>" title="Track Vehicle" height="900px" width="100%"></object>
				</div>


			</div>
		</div>
	</section>

	<footer class="footer">
		<?php include('public/includes/footer.php'); ?>
	</footer>

<?php } ?>