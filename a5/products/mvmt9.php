<?php
	$images = array();
	array_push($images, 
	"../img/watches/mvmt9.jpg", 
	"../img/watches/mvmt9-1.png", 
	"../img/watches/mvmt9-2.png",
	"../img/watches/mvmt9-3.png",
    "../img/watches/mvmt1-4.png");

	$name = "CHRONO GUNMETAL SANDSTONE";
	$price = "135";
	$caseSize = "40mm - 45mm";
	$caseThickness = "12mm";
	$glass = "Hardened Mineral Crystal";
	$movement = "Battery Powered 6 Hand Chronograph With Date";
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