<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday2.png", 
	"../img/watches/sevenfriday2-1.png", 
	"../img/watches/sevenfriday2-2.png", 
	"../img/watches/sevenfriday2-3.png", 
	"../img/watches/sevenfriday2-4.png");

	$name = "M1B/01M URBAN EXPLORER";
	$price = "1355";
	$caseSize = "47mm";
	$caseThickness = "15mm";
	$glass = "Hardened K1 Mineral Glass";
	$movement = "Automatic Movement - Customized Miyota 8215";
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