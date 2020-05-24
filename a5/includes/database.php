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
    }
    // else {
    //     echo "<p>Connected successfully</p>";
    // }

    // drop table query for testing
    // $conn->query("DROP TABLE IF EXISTS products");

    // --------------------------------- //
    // ----- create products table ----- //
    // --------------------------------- //
    // id : product id
    // brand : product brand
    // name : product name
    // status : product status (new, sale,...)
    // price : product price
    // img1 -> img5 : product images
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id VARCHAR(20) NOT NULL PRIMARY KEY,
        brand VARCHAR(128) NOT NULL,
        name VARCHAR(128) NOT NULL,
        status VARCHAR(32) NOT NULL,
        price FLOAT NOT NULL,
        img1 VARCHAR(256) NOT NULL,
        img2 VARCHAR(256) NOT NULL,
        img3 VARCHAR(256) NOT NULL,
        img4 VARCHAR(256) NOT NULL,
        img5 VARCHAR(256) NOT NULL
    )";
    $conn->query($sql);
?>