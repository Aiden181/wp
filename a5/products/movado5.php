<?php
	$images = array();
	array_push($images, 
	"../img/watches/movado5.png", 
	"../img/watches/movado5-1.png", 
	"../img/watches/movado5-2.png",
	"../img/watches/movado5-3.png",
	"../img/watches/movado5-4.png");

	$name = "MOVADO BOLD VERSO";
	$price = "595";
	$caseSize = "42mm";
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