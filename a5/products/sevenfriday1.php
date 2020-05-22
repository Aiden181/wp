<?php
	$images = array();
	array_push($images, 
	"../img/watches/sevenfriday1.png", 
	"../img/watches/sevenfriday1-1.png", 
	"../img/watches/sevenfriday1-2.png", 
	"../img/watches/sevenfriday1-3.png", 
	"../img/watches/sevenfriday1-4.png");

	$name = "P3B/06 RACING TEAM RED";
	$price = "1150";
	$caseSize = "47mm";
	$caseThickness = "15mm";
	$glass = "Hardened K1 mineral glass";
	$movement = "Automatic Movement, Miyota 82S7";
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