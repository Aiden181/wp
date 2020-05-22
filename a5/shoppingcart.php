<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.php">
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/shoppingcartstyle.php">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Shopping Cart</title>

    <!-- website icon -->
    <link rel="icon" href="img/favicon.png">
</head>
<body>
   <?php
      include('includes/header.php');
   ?>

   <div class="wrap cf">
      <h1 class="shoppingcart">Shopping Cart</h1>
      <div class="heading cf">
         <h1>My Cart</h1>
         <a href="index.php" class="continue">Continue Shopping</a>
      </div>
      <div class="cart">
         <ul class="cartWrap">
            <?php
               // make array that only has names of items
               $itemNames = array_keys($_SESSION['cart']);
               $subTotal = $totalPrice = $shipping = 0;

               for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                  // assign these long code chunks to easy-to-read variables
                  $name = $itemNames[$i];
                  $qty = $_SESSION['cart'][$itemNames[$i]];
                  $price = getValueFromName("price", "$name") * $qty;

                  // debug
                  // echo "name: $name" . "<br>";
                  // echo "qty: $qty" . "<br>";
                  // echo "price: $price" . "<br>";

                  // print out each item
                  if ($i % 2 == 0) {
                     echo "            <li class=\"items even\">\n";
                  } else {
                     echo "            <li class=\"items odd\">\n";
                  }
                  echo "               <div class=\"infoWrap\">\n";
                  echo "                  <div class=\"cartSection\">\n";
                  echo "                     <img src=\"\" alt=\"\" class=\"itemImg\" />\n";
                  echo "                     <h3>" . "$name" . "</h3>\n";
                  echo "                     <p> <input type=\"text\" class=\"qty\" placeholder=\"\" value=\"$qty\"/></p>\n";
                  echo "                  </div>\n";
                  echo "                  <div class=\"prodTotal cartSection\">\n";
                  echo "                     <p>$" . number_format(sprintf('%.2f', $price), 2) . "</p>\n";
                  echo "                  </div>\n";
                  echo "                  <div class=\"cartSection removeWrap\">\n";
                  echo "                     <a href=\"#\" class=\"remove\">x</a>\n";
                  echo "                  </div>\n";
                  echo "               </div>\n";
                  echo "            </li>";
                  $subTotal += $price;
               }
               $tax = 10;
               $totalPrice = $subTotal + $subTotal*$tax/100;

               if (sizeof($_SESSION['cart']) < 1) {
                  $shipping = 0;
               } else {
                  $shipping = 10;
               }
            ?>
         </ul>
      </div>

      <!-- Subtotal -->
      <div class="subtotal">
         <ul>
            <li class="totalRow"><span class="label">Subtotal</span><span class="value"><?php echo number_format(sprintf('%.2f', $subTotal), 2) ?></span></li>
            <li class="totalRow"><span class="label">Shipping</span><span class="value"><?php echo number_format(sprintf('%.2f', $shipping), 2) ?></span></li>
            <li class="totalRow"><span class="label">Tax</span><span class="value"><?php echo number_format(sprintf('%.2f', $subTotal*$tax/100), 2) ?></span></li>
            <li class="totalRow final"><span class="label">Total</span><span class="value">$<?php echo number_format(sprintf('%.2f', $totalPrice), 2) ?></span></li>
            <li class="totalRow"><a href="checkout.php" class="btn continue">Checkout</a></li>
         </ul>
      </div>
   </div>

  <?php
      include('includes/footer.php');
  ?>
</body>
</html>