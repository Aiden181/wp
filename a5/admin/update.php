<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product Details</title>

    <!-- website icon -->
    <link rel="icon" href="../img/favicon.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">
        @media (min-width: 50px) {
            .inline-block {
                display: inline-block;
                padding-right: 20px;
            }
            .inline-block input, .inline-block button {
                width: 210px;
                display: block;
            }
            .inline-block img {
                width: 100%;
                max-width: 210px;
                border: 1px solid #e04b11;
            }
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
    
    include('../includes/adminpagemenu.php');

    // Define variables and initialize with empty values
    $id = $brand = $name = $status = $img1 = $img2 = $img3 = $img4 =$img5 = $caseSize = $caseThickness = $glass = $movement = $pageUpdate = "";
    $price = 0.00;
    $id_err = $brand_err = $name_err = $price_err = $caseSize_err = $caseThickness_err = $glass_err = $movement_err = "";
    $img_err = array();
    $imgLinks = array();

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
                    
                    $caseSize = $row["case_size"];
                    $caseThickness = $row["case_thickness"];
                    $glass = $row["glass"];
                    $movement = $row["movement"];
                }
                else {
                    // URL doesn't contain valid id parameter. Redirect to error page
                    header("Location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("Location: error.php");
        exit();
    }
    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                        }

                        // Check if file already exists
                        if (file_exists($target_file)) {
                            array_push($img_err, "File already exists!");
                        }
                        // Check file size (disallow files larger than 3 MegaBytes or 3,000,000 Bytes)
                        if ($fileSize > 3000000) {
                            array_push($img_err, "Your file is too large!");
                        }
                        // Allow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                            array_push($img_err, "Only JPG, JPEG, and PNG files are allowed!");
                        }
                    }
                }
            }

            // Check input errors before inserting in database
            if ($id_err === "" && $brand_err === "" && $name_err === "" && $price_err === "" && sizeof($img_err) == 0) {
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
                        // Don't go anywhere
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


                // Update image links in database and upload images to drive as well as deleting the old image
                foreach($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                    if (!empty($tmp_name)) {
                        $sql = "";
                        $image = "../img/watches/";
                        if ($key == 0) {
                            // setup update query
                            $sql .= "UPDATE products SET img1=? WHERE id=?;";
                            // get image
                            $image .= $_FILES["files"]["name"]['0'];
                            // delete old image
                            unlink($img1);
                            // assign new link
                            $img1 = $image;
                        } else if ($key == 1) {
                            $sql .= "UPDATE products SET img2=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['1'];
                            unlink($img2);
                            $img2 = $image;
                        } else if ($key == 2) {
                            $sql .= "UPDATE products SET img3=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['2'];
                            unlink($img3);
                            $img3 = $image;
                        } else if ($key == 3) {
                            $sql .= "UPDATE products SET img4=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['3'];
                            unlink($img4);
                            $img4 = $image;
                        } else if ($key == 4) {
                            $sql .= "UPDATE products SET img5=? WHERE id=?;";
                            $image .= $_FILES["files"]["name"]['4'];
                            unlink($img5);
                            $img5 = $image;
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
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
                        foreach ($row as $rowValue) {
                            if (!empty($rowValue)) {
                                if ($rowValue == $row["img1"]) {
                                    array_push($imgLinks, $img1);
                                } else if ($rowValue == $row["img2"]) {
                                    array_push($imgLinks, $img2);
                                } else if ($rowValue == $row["img3"]) {
                                    array_push($imgLinks, $img3);
                                } else if ($rowValue == $row["img4"]) {
                                    array_push($imgLinks, $img4);
                                } else if ($rowValue == $row["img5"]) {
                                    array_push($imgLinks, $img5);
                                }
                            }
                        }

                        // ------------------ //
                        // write product file //
                        // ------------------ //
                        $filename = "../products/$id.php";
                        $fp = fopen($filename, "w");
                        flock($fp, LOCK_EX);
                        
                        fwrite($fp, '<?php' . "\n");
                        fwrite($fp, '$images = array();' . "\n");
                        fwrite($fp, 'array_push($images, ' . "\n");

                        // get last element in array
                        $last = end($imgLinks);
                        // go through all available image links
                        foreach ($imgLinks as $link) {
                            // if last element then close the array
                            if ($link == $last) {
                                fwrite($fp, '"' . "$link" . '");' . "\n");
                            } else {
                                fwrite($fp, '"' . "$link" . '", ' . "\n");
                            }
                        }
                        fwrite($fp,  "\n");
                        fwrite($fp, '$name = "' . $name . '";' . "\n");
                        fwrite($fp, '$price = "' . $price . '";' . "\n");
                        fwrite($fp, '$caseSize = "' . $caseSize . '";' . "\n");
                        fwrite($fp, '$caseThickness = "' . $caseThickness . '";' . "\n");
                        fwrite($fp, '$glass = "' . $glass . '";' . "\n");
                        fwrite($fp, '$movement = "' . $movement . '";' . "\n");
                        fwrite($fp,  "\n");
                        fwrite($fp, "include('includes/productdetails.php');\n");
                        fwrite($fp, '?>');
                        
                        flock($fp, LOCK_UN);
                        fclose($fp);

                        $pageUpdate = "Product detail page has been updated successfully!";
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }
        }
        else if (isset($_POST["remove-img"])) {
            $temp = explode(",", $_POST['remove-img']);
            $imgNum = strval($temp[0]);
            $imgLink = strval($temp[1]);

            if ($imgNum === "img1") {
                $sql = "UPDATE products SET img1='' WHERE id=?;";
                $img1 = "";
            } else if ($imgNum === "img2") {
                $sql = "UPDATE products SET img2='' WHERE id=?;";
                $img2 = "";
            } else if ($imgNum === "img3") {
                $sql = "UPDATE products SET img3='' WHERE id=?;";
                $img3 = "";
            } else if ($imgNum === "img4") {
                $sql = "UPDATE products SET img4='' WHERE id=?;";
                $img4 = "";
            } else if ($imgNum === "img5") {
                $sql = "UPDATE products SET img5='' WHERE id=?;";
                $img5 = "";
            }

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_id);

                // Set parameters
                $param_id = $id;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // remove file upon successful query execution
                    unlink($imgLink);
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Update Product Details</h2>
                </div>
                <?php echo $pageUpdate === "" ? "" : "<div> $pageUpdate</div> <br>" ?>
                <form action="update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
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
                    
                    <br>

                    <label>Images</label>
                    <div>
                        <?php
                        foreach ($img_err as $error) {
                            echo $error;
                        }
                        ?>
                    </div>

                    <br>

                    <?php
                    function printImages($link, $imgNum) {
                        global $id;
                        echo "<div class=\"inline-block\">";
                        if ($link != "") {
                            // remove image button
                            echo "<button type=\"submit\" class=\"form-control\" name=\"remove-img\" id=\"remove-img\" value=\"$imgNum,$link\">Remove image</button>";
                            echo "<img src=\"$link\" alt=\"$id image\">";
                        }
                        echo "<input type=\"file\" class=\"form-control\" name=\"files[]\" id=\"files[]\" value=\"<?php echo $link; ?>\">";
                        echo "<p>$link</p>";
                        echo "</div>";
                    }
                    
                    echo "<div class='container'>";
                    printImages($img1, "img1");
                    printImages($img2, "img2");
                    printImages($img3, "img3");
                    printImages($img4, "img4");
                    printImages($img5, "img5");
                    echo "</div>";
                    ?>

                    <br>
                    <input type="submit" class="btn btn-primary" name="submit" value="Update Product Details" style="background-color: #e04b11; border: none;">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <?php
    // Close connection
    mysqli_close($conn);
    // debug
    // $filename = "../products/$id.php";
    // $fp = fopen($filename, "r");
    // flock($fp, LOCK_SH);

    // // read the heading
    // $headings = fgetcsv($fp);

    // // read through the line and 
    // while ($aLineOfCells = fgetcsv($fp)) {
    //     $records[] = $aLineOfCells;
    // }

    // foreach($records as $key => $lineArray) {
    //     foreach($lineArray as $key2 => $line) {
    //         echo $line ."<br>";
    //     }
    // }
    // flock($fp, LOCK_UN);
    // fclose($fp);
    ?>
</body>
</html>