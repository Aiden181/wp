<?php
	$images = array();
	array_push($images, 
	"../img/watches/mvmt2.jpg", 
	"../img/watches/mvmt2-1.png",
	"../img/watches/mvmt2-2.png", 
    "../img/watches/mvmt2-3.png",
    "../img/watches/mvmt1-4.png");

	$name = "CLASSIC BRONZE AGE";
	$price = "82.50";
	$caseSize = "45mm";
	$caseThickness = "9mm";
	$glass = "Hardened Mineral Crystal";
	$movement = "Miyota Quart";
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