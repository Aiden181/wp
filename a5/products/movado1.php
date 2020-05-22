<?php
	$images = array();
	array_push($images, 
	"../img/watches/movado1.png", 
	"../img/watches/movado1-1.png", 
	"../img/watches/movado1-2.png");

	$name = "MOVADO BOLD EVOLUTION";
	$price = "650";
	$caseSize = "34mm";
	$caseThickness = "10mm";
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