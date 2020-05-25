<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error page</title>

    <!-- website icon -->
    <link rel="icon" href="../img/favicon.png">

    <?php
    include('../includes/tools.php');

    if (!isset($_SESSION['User'])) {
        echo "You should not be here. Only follow links!";
        die();
    }
    ?>
</head>
<body>
    <div>Hello, this is an error page, you probably put something wrong in your input fields.</div>
    <div>Uh... this is awkward...</div>
    <a href="index.php">Click here to go back to the manage page</a>
</body>
</html>