<?php
	$images = array();
	array_push($images, 
	"../img/watches/dw7.jpg", 
	"../img/watches/dw7-1.png", 
	"../img/watches/dw7-2.png", 
	"../img/watches/dw7-3.png", 
	"../img/watches/dw7-4.png");

	$name = "CLASSIC CANTERBURY";
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