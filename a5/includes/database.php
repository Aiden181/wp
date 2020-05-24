<?php
    $servername = "139.99.75.220";
    $username = "a5";
    $password = "v3rYSecUreDpassw0rd*";
    $port = 3306;
    $dbName = "a5";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error());
    } else {
        echo "<p>Connected successfully</p>";
    }

    // sql to create table
    $sql = "CREATE TABLE products (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        brand VARCHAR(50) NOT NULL,
        prodname VARCHAR(100) NOT NULL,
        specs VARCHAR(200) NOT NULL,
        price INT(10) NOT NULL
    )";
?>