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
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/loginpagestyle.php" media="screen">

    <title>Login</title>

    <!-- website icon -->
    <link rel="icon" href="img/favicon.png">

    <?php
      include('includes/tools.php');
      include('includes/database.php');
    ?>
</head>
<body>
  <?php
    // admin account list (username and password)
    $login = array('admin1' => 'admin1', 'admin2' => 'admin2');

    if (isset($_POST['reset-login'])) {
      unset($_SESSION['User']);
    }

    // after user presses log in button
    if (isset($_POST['login'])) {
      // if username and password in $_POST are set then assign those values to the variable 
      $username = isset($_POST['username']) ? $_POST['username'] : '';
      $password = isset($_POST['password']) ? $_POST['password'] : '';

      // if username is in the admin account list and password matches, add to session and 
      // redirects to index.php
      if (isset($login[$username]) && $login[$username] == $password) {
        // add to session
        $_SESSION['User']['username'] = $username;

        // redirects to index.php upon successful login
        header("location: index.php");
        exit;
      }
      else { // login failed, show error message
          $Msg = "<span style='color: red'> Invalid Login Details </span>";
          echo $Msg;
      }
    }
  ?>

  <div class="wrapper fadeInDown" id="bg-image">
      <div id="formContent">
      <button type="button" class="btn" style="position: relative; right: 140px"><a href="index.php"><b>&#x1f878;</b></a></button>
        <!-- Tabs Titles -->
        <h2 class="active" style="position: relative; right: 22px"> Sign In </h2>

        <!-- Login Form -->
        <form action="login.php" method="post">
          <input type="text" id="username" name="username" class="fadeIn second" placeholder="Login">
          <input type="password" id="password" name="password" class="fadeIn third" placeholder="Password">
          <input type="submit" name="login" class="fadeIn fourth" value="Log In">
          <!-- <input type="submit" name="reset-login" value="reset login"> -->
        </form>
      </div>
    </div>
</body>
</html>