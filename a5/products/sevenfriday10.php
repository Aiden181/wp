<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday10.png", 
	"../img/watches/sevenfriday10-1.png", 
	"../img/watches/sevenfriday10-2.png", 
	"../img/watches/sevenfriday10-3.png");

	$name = "Q3/05";
	$price = "1220";
	$caseSize = "49mm";
	$caseThickness = "15mm";
	$glass = "Specially Hardened Domed Mineral Glass";
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