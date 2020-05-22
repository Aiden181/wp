<?php
	$images = array();
	array_push($images, 
	"../img/watches/movado3.png", 
	"../img/watches/movado3-1.png", 
	"../img/watches/movado3-2.png",
	"../img/watches/movado3-3.png");

	$name = "MOVADO FACE";
	$price = "350";
	$caseSize = "41mm";
	$caseThickness = "41mm";
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