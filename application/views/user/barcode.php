<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 22px;}
</style>
</head>
<body onload="window.print();">
	<div style="width: 134px;">
	<!-- <img src="https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=<?php echo $barcode_img;?>" /> -->
	  <img src="<?php echo base_url()?>barcode/<?php echo $barcode_img; ?>" alt="" />  

	
	
	</div>
</body>
</html>