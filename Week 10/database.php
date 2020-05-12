<?php
    $servername = "localhost";
    $user = 'root';
    $password = 'root';

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    mysqli_close($conn);
?>