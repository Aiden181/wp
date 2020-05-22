<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday9.png", 
	"../img/watches/sevenfriday9-1.png", 
	"../img/watches/sevenfriday9-2.png", 
	"../img/watches/sevenfriday9-3.png");

	$name = "W1/01 BLADE";
	$price = "1250";
	$caseSize = "49mm";
	$caseThickness = "15mm";
	$glass = "Hardened Anti-Reflective Mineral Glass";
	$movement = "Automatic Movement - Customized Miyota 82S7";
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