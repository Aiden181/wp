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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Contact</title>
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
               <li class="items odd">
                  <!-- Cart Item -->
                  <div class="infoWrap">
                     <div class="cartSection">
                        <img src="" alt="" class="itemImg" />
                        <h3>Item Name</h3>
                        <p> <input type="text"  class="qty" placeholder=""/></p>
                     </div>
                     <div class="prodTotal cartSection">
                        <p>$15.00</p>
                     </div>
                     <div class="cartSection removeWrap">
                        <a href="#" class="remove">x</a>
                     </div>
                  </div>
               </li>
               <li class="items even">
                  <div class="infoWrap">
                     <div class="cartSection">
                        <img src="" alt="" class="itemImg" />
                        <h3>Item Name 1</h3>
                        <p> <input type="text"  class="qty" placeholder=""/></p>
                     </div>
                     <div class="prodTotal cartSection">
                        <p>$15.00</p>
                     </div>
                     <div class="cartSection removeWrap">
                        <a href="#" class="remove">x</a>
                     </div>
                  </div>
               </li>
               <li class="items odd">
                  <div class="infoWrap">
                     <div class="cartSection">
                        <img src="" alt="" class="itemImg" />
                        <h3>Item Name</h3>
                        <p> <input type="text"  class="qty" placeholder=""/></p>
                     </div>
                     <div class="prodTotal cartSection">
                        <p>$15.00</p>
                     </div>
                     <div class="cartSection removeWrap">
                        <a href="#" class="remove">x</a>
                     </div>
                  </div>
               </li>
               <li class="items even">
                  <div class="infoWrap">
                     <div class="cartSection info">
                        <img src="" alt="" class="itemImg" />
                        <h3>Item Name</h3>
                        <p> <input type="text"  class="qty" placeholder=""/></p>
                     </div>
                     <div class="prodTotal cartSection">
                        <p>$15.00</p>
                     </div>
                     <div class="cartSection removeWrap">
                        <a href="#" class="remove">x</a>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <!-- Subtotal -->
         <div class="subtotal">
            <ul>
               <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>
               <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>
               <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li>
               <li class="totalRow final"><span class="label">Total</span><span class="value">$44.00</span></li>
               <li class="totalRow"><a href="#" class="btn continue">Checkout</a></li>
            </ul>
         </div>
      </div>

  <?php
      include('includes/footer.php');
      include('includes/javascript.php');
  ?>
</body>
</html>