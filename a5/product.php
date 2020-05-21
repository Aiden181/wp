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
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/productpagestyle.php">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Product</title>
</head>
<body>
  <?php
      include('includes/header.php');
  ?>

    <div class="container">
            <div class="row">
                <div class="col-sm-6"><img src="img/watches/mvmt1.jpg" alt=""></div>
                <div class="col-sm-6">
                    <h2>CLASSIC BLACK LEATHER</h2>
                    <h3>TECHNICAL SPECIFICATIONS</h3>
                    <br>
                    <br>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>CASE SIZE</td>
                            <td>45mm</td>
                        </tr>
                        <tr>
                            <td>CASE THICKNESS</td>
                            <td>9mm</td>
                        </tr>
                        <tr>
                            <td>GLASS</td>
                            <td>Hardened Mineral Crystal</td>
                        </tr>
                        <tr>
                            <td>MOVEMENT</td>
                            <td>Miyota Quartz</td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="add-to-cart" st>Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>

    <div id="blankspace"></div>

  <?php
      include('includes/footer.php');
      include('includes/javascript.php');
  ?>
</body>
</html>