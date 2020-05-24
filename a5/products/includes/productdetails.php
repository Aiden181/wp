<?php
	$images = array();
	array_push($images, 
	"../img/watches/dw1.jpg", 
	"../img/watches/dw1-1.png", 
	"../img/watches/dw1-2.png", 
	"../img/watches/dw1-3.png", 
	"../img/watches/dw1-4.png");

	$name = "CLASSIC DOVER";
	$price = "179";
	$caseSize = "36mm";
	$caseThickness = "6mm";
	$glass = "Hardened Mineral Glass";
	$movement = "Japanese Quartz Movement";
?>

<?php include('includes/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="product-gallery">
                <div class="product-image">
                    <img class="active" src=<?php echo $images[0]?>>
                </div>
                <ul class="image-list">
                    <?php
                        foreach ($images as $image) {
                            if ($image != "") {
                                echo "<li class=\"image-item\"><img src=$image></li>";
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>

        <!-- variables are from each -->
        <div class="col-sm-6">
            <h2><?php echo $name ?></h2>
            <h3>TECHNICAL SPECIFICATIONS</h3>
            <br>
            <br>
            <table class="table">
                <tbody>
                <tr>
                    <td>CASE SIZE</td>
                    <td><?php echo $caseSize ?></td>
                </tr>
                <tr>
                    <td>CASE THICKNESS</td>
                    <td><?php echo $caseThickness ?></td>
                </tr>
                <tr>
                    <td>GLASS</td>
                    <td><?php echo $glass ?></td>
                </tr>
                <tr>
                    <td>MOVEMENT</td>
                    <td><?php echo $movement ?></td>
                </tr>
                </tbody>
            </table>

            <div class="qtySelector text-center">
                <i class="fa fa-minus decreaseQty" id="decrease-qty" onclick="updateQty(this.id)"></i>
                <input type="text" class="qtyValue" id="qty-value" value="1">
                <i class="fa fa-plus increaseQty" id="increase-qty" onclick="updateQty(this.id)"></i>
            </div>
            
            <h3 style="position: relative;  display: inline;"><b class="w3-text-red">$<?php echo number_format(sprintf("%.2f", $price), 2) ?></b>
                <h5 style="display: inline">incl. VAT</h5>
            </h3>

            <br>
            <br>

            <form action="<?php echo $currentPage ?>" method="GET" onsubmit="checkSubmission(event)">
                <!-- uncomment reset button for debug -->
                <!-- <button type="hidden" name='session-reset' value='Reset the session' onclick="this.form.submit()">Reset the session</button> -->
                <button id="addToCart" type="hidden" class="add-to-cart" name="item" value='<?php echo "$name,1" ?>'>Add To Cart</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="blankspace"></div>

<?php include('includes/footer.php'); ?>