<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "<p>Connected successfully</p>";

    /*
    // Create database
    $sql = "CREATE DATABASE myDB";
    if (mysqli_query($conn, $sql)) {
        echo "<p>Database created successfully</p>";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }


    $sql = "CREATE TABLE student(
            firstName VARCHAR(50),
            lastName VARCHAR(50),
            studentID VARCHAR (10),
            school VARCHAR (50),
            enrolled YEAR
        )";

    if ($mysqli_query($conn,$sql)) {
        echo "<p>Table Student created successfully</p>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
*/
/*
    $sql = "INSERT INTO student VALUES('Jane', 'Doe', 's3645753', 'Physics', '2013')";
    $sql = "INSERT INTO student VALUES('Fred', 'Simms', 's3543574', 'CSIT', '2014')";

    if (mysqli_multi_query($conn,$sql)) {
        echo "<p>New record created successfully</p>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
*/
        // sql to delete a record
    $sql = "DELETE FROM student WHERE firstName='Robert'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    mysqli_close($conn);
    
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo $row["firstName"]. " | " . $row["lastName"]. " | " . $row["studentID"]. $row["school"]. " | " . $row["enrolled"]. "<br>";
        }
      } else {
        echo "0 results";
      }
    

?>

