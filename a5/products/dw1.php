<?php
	$images = array();
	array_push($images, 
	"../img/watches/dw1.jpg", 
	"../img/watches/dw1-1.png", 
	"../img/watches/dw1-2.png", 
	"../img/watches/dw1-3.png", 
	"../img/watches/dw1-4.png");

	$name = "CLASSIC DOVER";
	$price = "179";
	$caseSize = "36mm";
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