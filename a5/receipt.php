<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>

    <!-- website icon -->
    <link rel="icon" href="img/favicon.png">

    <link id='stylecss' type="text/css" rel="stylesheet" href="css/receiptstyle.php">
    <link href="https://fonts.googleapis.com/css2?family=Petrona&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    include('includes/tools.php');

    // no customer cookie (or no checkout has been made)
    if (!isset($_SESSION['receipt'])) {
        // redirect page to home page
        header("Location: index.php");
        exit();
    }

    $receiptHeight = 297;
    ?>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <img id="logo" src="img/Bold_Black_and_Yellow_Logo.png" style="width: 30%; height: 90%; position: relative; left: 40px">
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <div style="text-align: center"><h3>Thanks For Shopping At Zael</h3></div>
                </td>
            </tr>
        </table>
            
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td> Customer Information </td>
                <td> Value </td>
            </tr>
            
            <tr class="item">
                <td>Name</td>
                <td>
                    <?php echo $_SESSION['receipt']['fname'] . " " . $_SESSION['receipt']['lname'] ?>
                </td>
            </tr>
            <tr class="item">
                <td>Address</td>
                <td>
                    <?php echo $_SESSION['receipt']["address"] ?>
                </td>
            </tr>
            <tr class="item">
                <td>Email</td>
                <td>
                    <?php echo $_SESSION['receipt']["email"] ?>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td> Products </td>
                <td> Quantity </td>
            </tr>

            <?php
            // make array that only has names of items
            $itemNames = array_keys($_SESSION['receipt']['items']);
            $subTotal = $totalPrice = $shipping = 0;
            $tax = 10;

            if (sizeof($_SESSION['receipt']['items']) < 1) {
                $shipping = 0;
            } else {
                $shipping = 10;
            }

            for ($i = 0; $i < sizeof($_SESSION['receipt']['items']); $i++) {
                // assign these long code chunks to easy-to-read variables
                $name = strtoupper($itemNames[$i]);
                $qty = $_SESSION['receipt']['items'][$itemNames[$i]];
                $price = getValueFromName("price", "$name") * $qty;

                echo "
                <tr class='item'>
                    <td>
                        $name <br>
                    </td>
                    <td>
                        $qty
                    </td>
                </tr>";
                $subTotal += $price;
                if ($i == 3) {
                    $receiptHeight += 3;
                }
            }
            $totalPrice = $subTotal + $subTotal*$tax/100;
            ?>
        </table>
            
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td> Payment </td>
                <td> Value </td>
            </tr>

            <tr class="item">
                <td> Sub Total </td>
                <td>
                    $<?php echo number_format(sprintf('%.2f', $subTotal), 2) ?>
                </td>
            </tr>
            
            <tr class="item">
                <td> Tax </td>
                <td>$<?php echo number_format(sprintf('%.2f', $subTotal*$tax/100), 2) ?></td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td>Final Price: $<?php echo number_format(sprintf('%.2f', $totalPrice + $shipping), 2) ?><br></td>
            </tr>
        </table>
    </div>

</body>
</html>