<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name= "name">
        <p><span class="error">* <?php echo $nameErr; ?></span></p
        <br><br>
        Email: <input type="text" name="email">
        <p><span class="error">* <?php echo $emailErr; ?></span></p
        <br><br>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        echo "<h2> Your Input: </h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
    ?>
</body>
</html>