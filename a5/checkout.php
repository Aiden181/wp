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
  <?php
      include('includes/header.php');
  ?>

<div class="container">
  <div class="py-5 text-center">
    
        <h2>Checkout</h2>
        <br>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
        <br>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <br>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
            </li>
        </ul>
        </div>
        <div class="col-md-8 order-md-1">
        <h3 class="mb-3">Billing address</h3>
        <form class="needs-validation">
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" value="<?php if (isset($_POST['cust']['fname'])) {echo $_POST['cust']['fname'];} ?>" pattern="^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*" required>
                <div class="invalid-feedback">
                Valid first name is required.
                </div>
                <br>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" value="<?php if (isset($_POST['cust']['lname'])) {echo $_POST['cust']['lname'];} ?>" pattern="^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*" required>
                <div class="invalid-feedback">
                Valid last name is required.
                </div>
            </div>
            </div>

            <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" value="<?php if (isset($_POST['cust']['email'])) {echo $_POST['cust']['email'];} ?>" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" placeholder="you@example.com">
            <br>
            </div>

            <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" value="<?php if (isset($_POST['cust']['address'])) {echo $_POST['cust']['address'];} ?>" placeholder="1234 Main St" patter="^[#.0-9a-zA-Z\s,-]+$" required>
            <div class="invalid-feedback">
                Please enter your shipping address.
            </div>
            <br>
            </div>

            <h3 class="mb-3">Payment</h3>
            <br>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cc-name">Card Holder Name</label>
                <input type="text" class="form-control" id="cc-name" value="<?php if (isset($_POST['cust']['cardholdername'])) {echo $_POST['cust']['cardholdername'];} ?>" patter="^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$" required>
                <small class="text-muted">Full name as displayed on card</small>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" value="<?php if (isset($_POST['cust']['card'])) echo $_POST['cust']['card']; ?>" pattern="[0-9]{14,19}" required>
                <div class="invalid-feedback">
                Credit card number is required
                </div>
                <br>
            </div>
            </div>
            <div class="row">
            <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="month" class="form-control" id="cc-expiration" value="<?php if (isset($_POST['cust']['expiry'])) echo $_POST['cust']['expiry']; ?>" required>
                <div class="invalid-feedback">
                Expiration date required
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" value="<?php if (isset($_POST['cust']['cvv'])) echo $_POST['cust']['cvv']; ?>" pattern="^[0-9]{3}$" required>
                <div class="invalid-feedback">
                Security code required
                </div>
            </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" style="background-color: #e04b11; border:none;">Checkout</button>
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