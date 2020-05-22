<?php
	$images = array();
	array_push($images, 
	"../img/watches/mvmt5.jpg", 
	"../img/watches/mvmt5-1.png",
	"../img/watches/mvmt5-2.png", 
    "../img/watches/mvmt5-3.png",
    "../img/watches/mvmt1-4.png");

	$name = "THE 40 - ROSE GOLD BROWN";
	$price = "120";
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