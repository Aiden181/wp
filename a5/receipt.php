<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>

    <link id='stylecss' type="text/css" rel="stylesheet" href="css/receiptstyle.php">
    <link href="https://fonts.googleapis.com/css2?family=Petrona&display=swap" rel="stylesheet">
</head>
<body>

<div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <img id="logo" src="img/Bold_Black_and_Yellow_Logo.png" style="width: 30%; height: 90%">
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                            <div style="text-align: center"><h3>Thanks For Shopping At Zael</h3></div>
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
                    <?php echo $movieInfo["id"] ?>
                </td>
            </tr>
            <tr class="item">
                <td>Address</td>
                <td>
                    <?php echo $movieInfo["day"] ?>
                </td>
            </tr>
            <tr class="item">
                <td>Email</td>
                <td>
                    <?php echo $movieInfo["hour"] ?>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td> Products </td>
                <td> Quantity </td>
            </tr>
                <tr class="item">
                    <td>
                        M3/04 - PINKY <br>
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        M1B/01M URBAN EXPLORER <br>
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        P3B/06 RACING TEAM RED <br>
                    </td>
                    <td>
                        1
                    </td>
                </tr>
            </tr>
        </table>
            
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td> Payment </td>
                <td> Value </td>
            </tr>

            <tr class="item">
                <td> Final Price </td>
                <td>
                    <?php countTotal() ?>
                    <?php echo "$" . round($totalPriceBeforeGST, 2) ?>
                </td>
            </tr>
            
            <tr class="item">
                <td> GST </td>
                <td><?php echo "$" . round($GST, 2) ?></td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td><?php echo "Final Price: " . "$" . round($totalPriceAfterGST, 2) . "</br>" ?></td>
            </tr>
        </table>
    </div>
    <form method="POST" action="receipt.php">
        <input type="submit" name="ticket" id="printTicketbutton" value="Print Group Ticket">
        <input type="submit" name="ticket" id="printTicketbutton" value="Print Individual Ticket(s)">
    </form>

</body>
</html>