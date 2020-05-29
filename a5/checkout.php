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

    <title>Checkout</title>

    <!-- website icon -->
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <?php include('includes/header.php'); ?>

    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout</h2>
            <br>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo sizeof($_SESSION['cart']) ?></span>
                </h4>
                <br>
                <ul class="list-group mb-3">

                    <?php
                    // make array that only has names of items
                    $itemNames = array_keys($_SESSION['cart']);
                    $subTotal = $totalPrice = $shipping = 0;
                    $tax = 10;

                    if (sizeof($_SESSION['cart']) < 1) {
                        $shipping = 0;
                    } else {
                        $shipping = 10;
                    }

                    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                        // assign these long code chunks to easy-to-read variables
                        $name = strtoupper($itemNames[$i]);
                        $qty = $_SESSION['cart'][$itemNames[$i]];
                        $price = getValueFromName("price", "$name") * $qty;
                    
                        echo "
                        <li class='list-group-item d-flex justify-content-between lh-condensed'>
                            <div>
                                <h5 class='my-0'>Name: $name</h5>
                                <span class='text-muted'>Quantity: $qty</span>
                            </div>
                        </li>";
                        $subTotal += $price;
                    }
                    $totalPrice = $subTotal + $subTotal*$tax/100;

                    ?>

                    <li class="list-group-item d-flex justify-content-between">
                        <div>Total (USD)</div>
                        <strong>$<?php echo number_format(sprintf('%.2f', $totalPrice + $shipping), 2) ?></strong>
                    </li>
                </ul>
            </div>
            
            <div class="col-md-8 order-md-1">
                <h3 class="mb-3">Billing address</h3>
                <form action="checkout.php" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" name="cust[fname]" id="firstName" value="<?php echo (isset($_POST['cust']['fname'])) ? $_POST['cust']['fname'] : '' ?>" pattern="^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*" required>
                            <div class="invalid-feedback"> <?php echo $fnameError ?> </div>
                            <br>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" name="cust[lname]" id="lastName" value="<?php echo (isset($_POST['cust']['lname'])) ? $_POST['cust']['lname'] : '' ?>" pattern="^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*" required>
                            <div class="invalid-feedback"> <?php echo $lnameError ?> </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" name="cust[email]" id="email" value="<?php echo (isset($_POST['cust']['email'])) ? $_POST['cust']['email'] : '' ?>" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" placeholder="you@example.com">
                        <div class="invalid-feedback"> <?php echo $emailError ?> </div>
                    </div>
                    <br>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="cust[address]" id="address" value="<?php echo (isset($_POST['cust']['address'])) ? $_POST['cust']['address'] : '' ?>" placeholder="1234 Main St" pattern="^[#.0-9a-zA-Z\s,-]+$" required>
                        <div class="invalid-feedback"> <?php echo $addressError ?> </div>
                    </div>
                    <br>

                    <h3 class="mb-3">Payment</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Card Holder Name</label>
                            <input type="text" class="form-control" name="cust[cardname]" id="cc-name" value="<?php echo (isset($_POST['cust']['cardname'])) ? $_POST['cust']['cardname'] : '' ?>" pattern="^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$" required>
                            <div class="invalid-feedback"> <?php echo $cardNameError ?> </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" name="cust[card]" id="cc-number" value="<?php echo (isset($_POST['cust']['card'])) ? $_POST['cust']['card'] : '' ?>" pattern="[0-9]{14,19}" required>
                            <div class="invalid-feedback"> <?php echo $cardNumError ?> </div>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="month" class="form-control" name="cust[expiry]" id="cc-expiration" value="<?php echo (isset($_POST['cust']['expiry'])) ? $_POST['cust']['expiry'] : '' ?>" required>
                            <div class="invalid-feedback"> <?php echo $cardExpiryError ?> </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" name="cust[cvv]" id="cc-cvv" value="<?php echo (isset($_POST['cust']['cvv'])) ? $_POST['cust']['cvv'] : '' ?>" pattern="^[0-9]{3}$" required>
                            <div class="invalid-feedback"> <?php echo $cvvError ?> </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="checkout-submit" style="background-color: #e04b11; border:none;">Checkout</button>
                </form>
            </div>
        </div>
    </div>

    <div id="blankspace"></div>

    <?php
    include('includes/footer.php');
    include('includes/tools.php');
    ?>
</body>
</html>