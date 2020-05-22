<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday3.png", 
	"../img/watches/sevenfriday3-1.png", 
	"../img/watches/sevenfriday3-2.png");

	$name = "M3/04 – PINKY";
	$price = "1750";
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