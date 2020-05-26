<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>

    <!-- website icon -->
    <link rel="icon" href="../img/favicon.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php
    include('../includes/tools.php');

    if (!isset($_SESSION['User'])) {
        echo "You should not be here. Only follow links!";
        die();
    }

    // Process delete operation after confirmation
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        
        // get image links so we can delete them from local drive
        $select_sql = "SELECT `img1`, `img2`, `img3`, `img4`, `img5` FROM products WHERE id = ?;";
        // delete statement
        $delete_sql = "DELETE FROM products WHERE id = ?;";

        // send query, get results, store result rows as array, go through each array element and
        // delete the image from available url
        if ($stmt = mysqli_prepare($conn, $select_sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);

            // Set parameters
            $param_id = trim($_POST["id"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                }
                // delete product images
                foreach ($row as $value) {
                    unlink($value);
                }

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        if ($stmt = mysqli_prepare($conn, $delete_sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);

            // Set parameters
            $param_id = trim($_POST["id"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // delete product detail file
                unlink("../products/$param_id.php");

                // records deleted successfully. Redirect to landing page
                header("Location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);
    } else {
        // Check existence of id parameter
        if (empty(trim($_GET["id"]))) {
            // URL doesn't contain id parameter. Redirect to error page
            header("Location: error.php");
            exit();
        }
    }
    ?>
    <div class="wrapper">
        <div class="container-fluid">
        <button type="button" class="btn" style="position: relative; background-color: #e04b11; color:"><a href="index.php" style="color:white">Manage</a></button>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="delete.php" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>