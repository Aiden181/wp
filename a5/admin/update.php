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
    $img = array();
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
        // header("location: error.php");
        // exit();
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
                } else if (!ctype_digit($input_price)) {
                    $price_err = "Please enter a positive integer value.";
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
                // no images uploaded
                if ($_FILES["files"]['tmp_name']['0'] === "") {
                    array_push($img_err, "Please upload an image.");
                }
                // image(s) uploaded
                else {
                    foreach($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
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
                    foreach($_FILES["files"]["name"] as $key => $imageName) {
                        if (!empty($imageName)) {
                            array_push($img, "../img/watches/$imageName");
                        }
                    }

            // Check input errors before inserting in database
            if ($id_err === "" && $brand_err === "" && $name_err === "" && $price_err === "" && $image_err == 0) {
                // upload images
                foreach($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                    $fileName = $_FILES["files"]["name"][$key];
                    $fileTemp = $_FILES["files"]["tmp_name"][$key];

                    // specifies the directory where the file is going to be placed
                    $target_dir = "../img/watches/";
                    // specifies the path of the file to be uploaded
                    $target_file = $target_dir . basename($fileName);
                    // holds the file extension of the file (in lower case)
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (move_uploaded_file($fileTemp, $target_file)) {
                        array_push($img_err, "The file ". basename($fileName). " has been uploaded successfully.");
                    } else {
                        array_push($img_err, "There was an error uploading your file.");
                    }
                }

                // Prepare update statement
                $sql = "UPDATE products SET brand=?, name=?, status=?, price=?, img1=?, img2=?, img3=?, img4=?, img5=?, case_size=?, case_thickness=?, glass=?, movement=? WHERE id=?;";

                if ($stmt = mysqli_prepare($conn, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sssdssssssssss", 
                    $param_brand, $param_name, $param_status, $param_price, 
                    $param_img1, $param_img2, $param_img3, $param_img4, $param_img5, 
                    $param_caseSize, $param_caseThickness, $param_glass, $param_movement, 
                    $param_id);

                    // Set parameters
                    $param_brand = $brand;
                    $param_name = $name;
                    $param_status = $status;
                    $param_price = $price;
                    $param_img1 = $img[0];
                    $param_img2 = $img[1];
                    $param_img3 = $img[2];
                    $param_img4 = $img[3];
                    $param_img5 = $img[4];
                    $param_id = $id;
                
                    $param_caseSize = $caseSize;
                    $param_caseThickness = $caseThickness;
                    $param_glass = $glass;
                    $param_movement = $movement;

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {

                        // Records updated successfully. Redirect to landing page
                        header("Location: index.php");
                        exit();
                    } else {
                        var_dump(mysql_error());
                        echo "Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            
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
                            header("location: error.php");
                            exit();
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
                // header("location: error.php");
                // exit();
            }
        }
    }
    ?>
    <div class="wrapper">
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
                            <input type="number" min="0" name="price" class="form-control" value="<?php echo $price; ?>">
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
                        <div class="form-group <?php echo (!empty($img_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="file" class="form-control" name="files[]" id="files" multiple value="<?php echo $img; ?>">
                            <span class="help-block"><?php foreach ($img_err as $errMsg) { echo "$errMsg <br>"; }?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Product" style="background-color: #e04b11; border: none;">
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