<?php
	$images = array();
	array_push($images, 
	"../img/watches/movado8.png", 
	"../img/watches/movado8-1.png", 
	"../img/watches/movado8-2.png");

	$name = "MOVADO BOLD CERAMIC";
	$price = "550";
	$caseSize = "30.8mm";
	$caseThickness = "34mm";
	$glass = "Crystal K1";
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