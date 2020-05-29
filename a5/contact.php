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

    <title>Contact</title>

    <!-- website icon -->
    <link rel="icon" href="img/favicon.png">
</head>
<body>
  <?php include('includes/header.php'); ?>

  <div class="container">
    <form class="contact-form" action="contact.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="contact[fname]" placeholder="Your name.." value="<?php echo (isset($_POST['contact']['fname'])) ? $_POST['contact']['fname'] : '' ?>" pattern="^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*" required>
        <div> <?php echo $fnameError ?> </div>

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="contact[lname]" placeholder="Your last name.." value="<?php echo (isset($_POST['contact']['lname'])) ? $_POST['contact']['lname'] : '' ?>" pattern="^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*" required>
        <div class="invalid-feedback"> <?php echo $lnameError ?> </div>

        <label for="lname">Email</label>
        <input type="email" id="email" name="contact[email]" placeholder="Enter your email.." value="<?php echo (isset($_POST['contact']['email'])) ? $_POST['contact']['email'] : '' ?>" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required>
        <div class="invalid-feedback"> <?php echo $emailError ?> </div>

        <label for="subject">Message (Max 1024 characters)</label>
        <textarea id="subject" name="contact[message]" value="<?php echo (isset($_POST['contact']['message'])) ? $_POST['contact']['message'] : '' ?>"  placeholder="Write something.." style="height:200px" required></textarea>
        <div class="invalid-feedback"> <?php echo $msgError ?> </div>

        <input type="submit" name="contact-submit" value="Submit">
    </form>
  </div>

  <div id="blankspace"></div>

  <?php include('includes/footer.php'); ?>
</body>
</html>