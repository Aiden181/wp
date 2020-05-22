<?php
	$images = array();
	array_push($images, 
	"../img/watches/movado7.png", 
	"../img/watches/movado7-1.png", 
	"../img/watches/movado7-2.png",
	"../img/watches/movado7-3.png");

	$name = "SERIES 800";
	$price = "1495";
	$caseSize = "42mm";
	$caseThickness = "11mm";
	$glass = "Crystal SAPPHIRE";
	$movement = "SWISS QUARTZ CHRONOGRAPH MOVEMENT";
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