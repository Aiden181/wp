<?php
	$images = array();
	array_push($images, 
	"../img/watches/movado4.png", 
	"../img/watches/movado4-1.png", 
	"../img/watches/movado4-2.png",
	"../img/watches/movado4-3.png",
	"../img/watches/movado4-4.png");

	$name = "MOVADO ULTRA SLIM";
	$price = "895";
	$caseSize = "40mm";
	$caseThickness = "6.3mm";
	$glass = "Crystal SAPPHIRE";
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