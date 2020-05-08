<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
<?php
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    if ($_SERVER["required_method"] == "POST"){
        if (empty($_POST["name"])){
            $nameErr = "Name is required";
        }    else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z]*$/ ",$name )) {
                $nameErr = "Only letters and white space are allowed.";
            }
        }
        if (emty($_POST["email"])){
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email format";
            }
        }
    }
?>


    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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