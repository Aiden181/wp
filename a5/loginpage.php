<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <link rel="stylesheet" href="css/loginpagestyle.php">

    <title>Login</title>
</head>
<body>
    
    <div class="wrapper fadeInDown" id="bg-image">
        <div id="formContent">
          <!-- Tabs Titles -->
          <h2 class="active"> Sign In </h2>
      
          <!-- Icon -->
          <div class="fadeIn first">
            <img 
          </div>
      
          <!-- Login Form -->
          <form>
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="Login" pattern="^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$" required> <!-- Username is 8-20 characters long -->
            <input type="password" id="password" class="fadeIn third" name="login" placeholder="Password" pattern=""^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$ required> <!-- Minimum eight characters, at least one letter and one number -->
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#" style="color: #1e1e1e;">Forgot Password?</a>
          </div>
      
        </div>
      </div>

</body>
</html>