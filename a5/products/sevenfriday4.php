<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday4.png", 
	"../img/watches/sevenfriday4-1.png", 
	"../img/watches/sevenfriday4-2.png", 
	"../img/watches/sevenfriday4-3.png", 
	"../img/watches/sevenfriday4-4.png");

	$name = "M1B/01 URBAN EXPLORER";
	$price = "1250";
	$caseSize = "47mm";
	$caseThickness = "15mm";
	$glass = "Hardened K1 Mineral Glass";
	$movement = "Automatic Movement - Customized Miyota 8215";
?>
<?php
	include('includes/header.php');
?>

<div class="container">
	<div class="row">
		<?php
			include('includes/productdetails.php')
		?>
	</div>
</div>

<div id="blankspace"></div>

<?php
	include('includes/footer.php');
?>