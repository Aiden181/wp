<?php
	$images = array();
	array_push($images, 
	"../img/watches/movado2.png", 
	"../img/watches/movado2-2.png", 
	"../img/watches/movado2-2.png");

	$name = "MODERN 47";
	$price = "695";
	$caseSize = "40mm";
	$caseThickness = "6.30mm";
	$glass = "Crystal SAPPHIRE";
	$movement = "SWISS QUARTZ MOVEMENT";
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