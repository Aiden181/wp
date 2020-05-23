<?php
	$images = array();
	array_push($images, 
	"../img/watches/mvmt8.jpg", 
	"../img/watches/mvmt8-1.png", 
	"../img/watches/mvmt8-2.png",
	"../img/watches/mvmt8-3.png",
    "../img/watches/mvmt1-4.png");

	$name = "THE 40 - GUNMETAL MESH";
	$price = "125";
	$caseSize = "40mm";
	$caseThickness = "7mm";
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