<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product Details</title>

    <!-- website icon -->
    <link rel="icon" href="../img/favicon.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }

        @media (min-width: 50px) {
            .image-list {
                list-style: none;
                position: relative;
                right: 40px;
                display: flex;
            }
            .image-list input {
                max-width: 215px;
            }

            .image-list li {
                margin: 20px 0 0 0;
                background-color: white;
            }
            .image-list img {
                width: 100%;
                max-width: 215px;
                border: 1px solid #e04b11;
            }
        }
    </style>
</head>
<body>
    <?php
    include('../includes/tools.php');
    include('../includes/adminpagemenu.php');

    if (!isset($_SESSION['User'])) {
        echo "You should not be here. Only follow links!";
        die();
    }

    // Define variables and initialize with empty values
    $id = $brand = $name = $status = $img1 = $img2 = $img3 = $img4 =$img5 = $caseSize = $caseThickness = $glass = $movement = "";
    $price = 0.00;
    $id_err = $brand_err = $name_err = $price_err = $caseSize_err = $caseThickness_err = $glass_err = $movement_err = "";
    $img_err = array();
    $image_err = 0;

    // Get parameters
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get id
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE id = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $id = $row["id"];
                    $brand = $row["brand"];
                    $name = $row["name"];
                    $status = $row["status"];
                    $price = $row["price"];
                    $img1 = $row["img1"];
                    $img2 = $row["img2"];
                    $img3 = $row["img3"];
                    $img4 = $row["img4"];
                    $img5 = $row["img5"];

                    $getImg1 = $row["img1"];
                    $getImg2 = $row["img2"];
                    $getImg3 = $row["img3"];
                    $getImg4 = $row["img4"];
                    $getImg5 = $row["img5"];
                    
                    $caseSize = $row["case_size"];
                    $caseThickness = $row["case_thickness"];
                    $glass = $row["glass"];
                    $movement = $row["movement"];
                }

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("Location: error.php");
        exit();
    }

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Get hidden input value
            $id = trim($_POST["id"]);
        }

        // Processing form data when form is submitted
        if (isset($_POST["submit"])) {
            // Validate Brand Name
            if (isset($_POST["brand"])) {
                $input_brand = trim($_POST["brand"]);
                if (empty($input_brand)) {
                    $brand_err = "Please enter product brand.";
                } else {
                    $brand = $input_brand;
                }
            }

            // Validate Product Name
            if (isset($_POST["name"])) {
                $input_name = trim($_POST["name"]);
                if (empty($input_name)) {
                    $name_err = "Please enter product name.";
                } else {
                    $name = $input_name;
                }
            }

            // Validate Product Status
            if (isset($_POST["status"])) {
                $input_status = trim($_POST["status"]);
                $status = $input_status;
            }

            // Validate Price
            if (isset($_POST["price"])) {
                $input_price = trim($_POST["price"]);
                if (empty($input_price)) {
                    $price_err = "Please enter the price for your product.";
                } else if (is_numeric($input_price) && $input_price < 0) {
                    $price_err = "Please enter a positive value.";
                } else {
                    $price = $input_price;
                }
            }

            // Validate Product Case Size
            if (isset($_POST["caseSize"])) {
                $input_caseSize = trim($_POST["caseSize"]);
                $caseSize = $input_caseSize;
            }
    
            // Validate Product Case Thickness
            if (isset($_POST["caseThickness"])) {
                $input_caseThickness = trim($_POST["caseThickness"]);
                $caseThickness = $input_caseThickness;
            }
    
            // Validate Product Glass Type
            if (isset($_POST["glass"])) {
                $input_glass = trim($_POST["glass"]);
                $glass = $input_glass;
            }
    
            // Validate Product Movement Type
            if (isset($_POST["movement"])) {
                $input_movement = trim($_POST["movement"]);
                $movement = $input_movement;
            }

            // Validate Image(s)
            if (isset($_POST["submit"])) {
                foreach($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                    if (!empty($tmp_name)) {
                        // assign array values to intuitive variable
                        $fileName = $_FILES["files"]["name"][$key];
                        $fileTemp = $_FILES["files"]["tmp_name"][$key];
                        $fileSize = $_FILES["files"]["size"][$key];

                        // specifies the directory where the file is going to be placed
                        $target_dir = "../img/watches/";
                        // specifies the path of the file to be uploaded
                        $target_file = $target_dir . basename($fileName);
                        // holds the file extension of the file (in lower case)
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        // Check if image file is a actual image or fake image
                        $check = getimagesize($fileTemp);
                        if ($check !== 0) {
                            // array_push($img_err, "File is an image - " . $check["mime"] . ".");
                        } else {
                            array_push($img_err, "File is not an image.");
                            $image_err++;
                        }

                        // Check if file already exists
                        if (file_exists($target_file)) {
                            array_push($img_err, "File already exists!");
                            $image_err++;
                        }
                        // Check file size (disallow files larger than 3 MegaBytes or 3,000,000 Bytes)
                        if ($fileSize > 3000000) {
                            array_push($img_err, "Your file is too large!");
                            $image_err++;
                        }
                        // Allow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                            array_push($img_err, "Only JPG, JPEG, and PNG files are allowed!");
                            $image_err++;
                        }
                    }
                }
            }

            // Check input errors before inserting in database
            if ($id_err === "" && $brand_err === "" && $name_err === "" && $price_err === "" && $image_err == 0) {
                // Update fields that are not image link first
                $sql = "UPDATE products SET brand=?, name=?, status=?, price=?, case_size=?, case_thickness=?, glass=?, movement=? WHERE id=?;";

                if ($stmt = mysqli_prepare($conn, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, 'sssdsssss', 
                    $param_brand, $param_name, $param_status, $param_price, 
                    $param_caseSize, $param_caseThickness, $param_glass, $param_movement, 
                    $param_id);

                    // Set parameters
                    $param_brand = $brand;
                    $param_name = $name;
                    $param_status = $status;
                    $param_price = $price;
                    $param_caseSize = $caseSize;
                    $param_caseThickness = $caseThickness;
                    $param_glass = $glass;
                    $param_movement = $movement;
                    $param_id = $id;

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Records updated successfully. Redirect to landing page
                        // header("Location: index.php");
                        // exit();
                    } else {
                        var_dump(mysql_error());
                        echo "Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }


                // Update image links in database and upload images to drive
                foreach($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                    if (!empty($tmp_name)) {
                        $sql = "";
                        $image = "../img/watches/";
                        if ($key == 0) {
                            $sql .= "UPDATE products SET img1=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['0'];
                        } else if ($key == 1) {
                            $sql .= "UPDATE products SET img2=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['1'];
                        } else if ($key == 2) {
                            $sql .= "UPDATE products SET img3=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['2'];
                        } else if ($key == 3) {
                            $sql .= "UPDATE products SET img4=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['3'];
                        } else if ($key == 4) {
                            $sql .= "UPDATE products SET img5=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['4'];
                        }

                        if ($stmt = mysqli_prepare($conn, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, 'ss', $param_img, $param_id);

                            // Set parameters
                            $param_img = $image;
                            $param_id = $id;

                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // assign array values to intuitive variable
                                $fileName = $_FILES["files"]["name"][$key];
                                $fileTemp = $_FILES["files"]["tmp_name"][$key];
        
                                // specifies the directory where the file is going to be placed
                                $target_dir = "../img/watches/";

                                // specifies the path of the file to be uploaded
                                $target_file = $target_dir . basename($fileName);
                                
                                if (move_uploaded_file($fileTemp, $target_file)) {
                                    array_push($img_err, "The file ". basename($fileName). " has been uploaded successfully.");
                                } else {
                                    array_push($img_err, "There was an error uploading your file.");
                                }
                                // Don't redirect upon successful update because it's annoying
                                // Records updated successfully. Redirect to landing page
                                // header("Location: index.php");
                                // exit();
                            } else {
                                var_dump(mysql_error());
                                echo "Something went wrong. Please try again later.";
                            }

                            // Close statement
                            mysqli_stmt_close($stmt);
                        }
                    }
                }
                
                // update product detail page
                // Prepare a select statement
                $sql = "SELECT * FROM products WHERE id = ?";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_id);

                    // Set parameters
                    $param_id = $id;

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);

                        if (mysqli_num_rows($result) == 1) {
                            /* Fetch result row as an associative array. Since the result set
                            contains only one row, we don't need to use while loop */
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        } else {
                            // URL doesn't contain valid id parameter. Redirect to error page
                            // header("Location: error.php");
                            // exit();
                        }

                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }

                // Close connection
                mysqli_close($conn);
            } else {
                // URL doesn't contain id parameter. Redirect to error page
                // header("Location: error.php");
                // exit();
            }
        }
    }
    ?>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Product Details</h2>
                    </div>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Product ID</label>
                            <input type="text" name="id" readonly="readonly" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($brand_err)) ? 'has-error' : ''; ?>">
                            <label>Product Brand Name</label>
                            <input type="text" name="brand" class="form-control" value="<?php echo $brand; ?>">
                            <span class="help-block"><?php echo $brand_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product Status</label>
                            <input type="text" name="status" class="form-control" value="<?php echo $status; ?>">
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="number" min="0" step="0.01" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($caseSize_err)) ? 'has-error' : ''; ?>">
                            <label>Product Case Size</label>
                            <input type="text" name="caseSize" class="form-control" value="<?php echo $caseSize; ?>">
                            <span class="help-block"><?php echo $caseSize_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($caseThickness_err)) ? 'has-error' : ''; ?>">
                            <label>Product Case Thickness</label>
                            <input type="text" name="caseThickness" class="form-control" value="<?php echo $caseThickness; ?>">
                            <span class="help-block"><?php echo $caseThickness_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($glass_err)) ? 'has-error' : ''; ?>">
                            <label>Product Glass Type</label>
                            <input type="text" name="glass" class="form-control" value="<?php echo $glass; ?>">
                            <span class="help-block"><?php echo $glass_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($movement_err)) ? 'has-error' : ''; ?>">
                            <label>Product Movement Type</label>
                            <input type="text" name="movement" class="form-control" value="<?php echo $movement; ?>">
                            <span class="help-block"><?php echo $movement_err;?></span>
                        </div>

                        <?php
                        $id = $row["id"];
                        $img1 = isset($row["img1"]) ? $row["img1"] : "";
                        $img2 = isset($row["img2"]) ? $row["img2"] : "";
                        $img3 = isset($row["img3"]) ? $row["img3"] : "";
                        $img4 = isset($row["img4"]) ? $row["img4"] : "";
                        $img5 = isset($row["img5"]) ? $row["img5"] : "";

                        function printImages($link) {
                            global $id;
                            echo "
                            <div class=\"container\">
                            <li class=\"image-item\">
                                <img src=\"$link\" alt=\"$id image\">
                                <input  type=\"file\" class=\"form-control\" name=\"files[]\" id=\"files[]\" value=\"<?php echo $link; ?>\">
                                <p>$link</p>
                            </li>
                            </div>\n";
                        }
                        
                        echo "<ul class='image-list'>";
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
                        echo "</ul>";

                        // echo $img1 . "<br>";
                        // echo $img2 . "<br>";
                        // echo $img3 . "<br>";
                        // echo $img4 . "<br>";
                        // echo $img5 . "<br>";
                        if (empty($img1) || empty($img2) || empty($img3) || empty($img4) || empty($img5)) {
                            echo "
                            <div class=\"form-group\">
                                <label>Add more product images</label>
                                <input type=\"file\" class=\"form-control\" name=\"files[]\" id=\"files[]\" multiple value=\"\">
                                <span class=\"help-block\"></span>
                            </div>";
                        }
                        ?>

                        <br>

                        <input type="submit" class="btn btn-primary" name="submit" value="Update Product Details" style="background-color: #e04b11; border: none;">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        $filename = "../products/$id.php";
        $fp = fopen($filename, "r");
        flock($fp, LOCK_SH);
    
        // read the heading
        $headings = fgetcsv($fp);
    
        // read through the line and 
        while ($aLineOfCells = fgetcsv($fp)) {
            $records[] = $aLineOfCells;
        }

        foreach($records as $key => $lineArray) {
            foreach($lineArray as $key2 => $line) {
                echo $line ."<br>";
            }
        }
        flock($fp, LOCK_UN);
        fclose($fp);
    ?>
</body>
</html>