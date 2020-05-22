<?php
	$images = array();
	array_push($images, 
	"../img/watches/movado6.png", 
	"../img/watches/movado6-1.png", 
	"../img/watches/movado6-2.png");

	$name = "MUSEUM SPORT";
	$price = "995";
	$caseSize = "43mm";
	$caseThickness = "9mm";
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