<h3>$_POST contains:</h3>
<pre>
    <?php print_r($_POST); 
    $name = htmlspecialchars($_POST['name1']);

    $email = $_POST['email1'];
    echo $name;
    ?>
</pre>