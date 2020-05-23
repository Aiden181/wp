<?php
	$images = array();
	array_push($images, 
	"../img/watches/dw6.jpg", 
	"../img/watches/dw6-1.png", 
	"../img/watches/dw6-2.png", 
	"../img/watches/dw6-3.png", 
	"../img/watches/dw6-4.png");

	$name = "CLASSIC GLASGOW";
	$price = "199";
	$caseSize = "36mm - 40mm";
	$caseThickness = "6mm";
	$glass = "Hardened Mineral Glass";
	$movement = "Japanese Quartz Movement";
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