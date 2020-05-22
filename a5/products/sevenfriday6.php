<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday6.png", 
	"../img/watches/sevenfriday6-1.png", 
	"../img/watches/sevenfriday6-2.png",
	"../img/watches/sevenfriday6-3.png");

	$name = "M3/01 SPACESHIP";
	$price = "1100";
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