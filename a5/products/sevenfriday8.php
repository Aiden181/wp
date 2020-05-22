<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday8.png", 
	"../img/watches/sevenfriday8-1.png", 
	"../img/watches/sevenfriday8-2.png", 
	"../img/watches/sevenfriday8-3.png", 
	"../img/watches/sevenfriday8-4.png");

	$name = "P1C/01";
	$price = "1150";
	$caseSize = "47mm";
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