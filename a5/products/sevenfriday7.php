<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday7.png", 
	"../img/watches/sevenfriday7-1.png", 
	"../img/watches/sevenfriday7-2.png", 
	"../img/watches/sevenfriday7-3.png", 
	"../img/watches/sevenfriday7-4.png");

	$name = "M2/02";
	$price = "1474";
	$caseSize = "47mm";
	$caseThickness = "15mm";
	$glass = "Hardened Anti-Reflective Mineral Glass";
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