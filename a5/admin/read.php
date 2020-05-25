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

    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                } else{
                    // URL doesn't contain valid id parameter. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);
    } else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
    ?>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>ID</label>
                        <p class="form-control-static"><?php echo $row["id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <p class="form-control-static"><?php echo $row["brand"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Specs</label>
                        <p class="form-control-static"><?php echo $row["status"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $row["price"]; ?></p>
                    </div>


                    <?php
                    $id = $row["id"];
                    $img1 = $row["img1"];
                    $img2 = $row["img2"];
                    $img3 = $row["img3"];
                    $img4 = $row["img4"];
                    $img5 = $row["img5"];

                    function printImages($link) {
                        global $id, $img1, $img2, $img3, $img4, $img5;
                        $temp = str_replace('../img/watches/', '', strval($link));
                        $temp2 = str_replace('.png', '', strval($temp));
                        $temp3 = str_replace('.jpg', '', strval($temp2));
                        $imageNumber = str_replace('.jpeg', '', strval($temp2));
                        echo "                    <div class=\"form-group\">\n";
                        echo "                        <label>Image $imageNumber URL and Preview</label>\n";
                        echo "                        <p class=\"form-control-static\"><b>URL:</b> $link</p>\n";
                        echo "                        <img src=\"$link\" alt=\"$id image $imageNumber\">\n";
                        echo "                    </div>\n";
                    }

                    foreach ($row as $rowValue) {
                        if (!empty($rowValue)) {
                            if ($rowValue == $row["img1"]) {
                                printImages($img1);
                            } else if ($rowValue == $row["img2"]) {
                                printImages($img2);
                            } else if ($rowValue == $row["img3"]) {
                                printImages($img3);
                            } else if ($rowValue == $row["img4"]) {
                                printImages($img4);
                            } else if ($rowValue == $row["img5"]) {
                                printImages($img5);
                            }
                        }
                    }
                    ?>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>