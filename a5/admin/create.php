<?php
// Include config file
include('../includes/tools.php');

if (!isset($_SESSION['User'])) {
    echo "You should not be here. Only follow links!";
    die();
}
require_once "../includes/database.php";

// Define variables and initialize with empty values
$id = $brand = $name = $status = "";
$price = 0.00;
$id_err = $brand_err = $name_err = $price_err = "";
$img = array();
$img_err = array();


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate ID
    if (isset($_POST["id"])) {
        $input_id = trim($_POST["id"]);
        if(empty($input_id)) {
            $id_err = "Please enter product id.";
        } else{
            $id = $input_id;
        }
    }

    // Validate Brand Name
    if (isset($_POST["brand"])) {
        $input_brand = trim($_POST["brand"]);
        if(empty($input_brand)) {
            $brand_err = "Please enter product brand.";
        } else{
            $brand = $input_brand;
        }
    }

    // Validate Product Name
    if (isset($_POST["name"])) {
        $input_name = trim($_POST["name"]);
        if(empty($input_name)) {
            $name_err = "Please enter product name.";
        } else{
            $name = $input_name;
        }
    }

    // Validate Product Name
    if (isset($_POST["status"])) {
        $input_status = trim($_POST["status"]);
        $status = $input_status;
    }

    // Validate Price
    if (isset($_POST["price"])) {
        $input_price = trim($_POST["price"]);
        if(empty($input_price)) {
            $price_err = "Please enter the price for your product.";
        } else if(!ctype_digit($input_price)) {
            $price_err = "Please enter a positive integer value.";
        } else{
            $price = $input_price;
        }
    }

    // Validate Image(s)
    if (isset($_POST["submit"])) {
        // no images uploaded
        if($_FILES["files"]['tmp_name']['0'] === "") {
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
                // set upload failure or success
                $uploadOk = 1;

                // Check if image file is a actual image or fake image
                $check = getimagesize($fileTemp);
                if($check !== 0) {
                    // array_push($img_err, "File is an image - " . $check["mime"] . ".");
                    $uploadOk = 1;
                } else {
                    array_push($img_err, "File is not an image.");
                    $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    array_push($img_err, "File already exists!");
                    $uploadOk = 0;
                }
                // Check file size (disallow files larger than 3 MegaBytes or 3,000,000 Bytes)
                if ($fileSize > 3000000) {
                    array_push($img_err, "Your file is too large!");
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    array_push($img_err, "Only JPG, JPEG, and PNG files are allowed!");
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to false by an error
                if ($uploadOk == 0) {
                    array_push($img_err, "Sorry, your file was not uploaded.");
                // if everything is ok, upload file
                } else {
                    if (move_uploaded_file($fileTemp, $target_file)) {
                        array_push($img_err, "The file ". basename($fileName). " has been uploaded successfully.");
                    } else {
                        array_push($img_err, "There was an error uploading your file.");
                    }
                }
            }
            foreach($_FILES["files"]["name"] as $key => $imageName) {
                array_push($img, "../img/watches/$imageName");
            }
        }
    }

    // debug
    // echo $id_err . "<br>";
    // echo $brand_err . "<br>";
    // echo $name_err . "<br>";
    // echo $price_err . "<br>";
    // echo $_FILES['files']['error']['0'] . "<br>";
    // echo "<br>";
    // echo $id . "<br>";
    // echo $brand . "<br>";
    // echo $name . "<br>";
    // echo $status . "<br>";
    // echo $price . "<br>";
    // preShow($img);


    // Check input errors before inserting in database
    if($id_err === "" && $brand_err === "" && $name_err === "" && $price_err === "" && $_FILES['files']['error']['0'] == 0) {
        // Prepare an insert statement
        $sql = "INSERT INTO products (id, brand, name, status, price, img1, img2, img3, img4, img5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssdsssss", $param_id, $param_brand, $param_name, $param_status, $param_price, $param_img1, $param_img2, $param_img3, $param_img4, $param_img5);

            // Set parameters
            $param_id = $id;
            $param_brand = $brand;
            $param_name = $name;
            $param_status = $status;
            $param_price = $price;
            $param_img1 = $img[0];
            $param_img2 = $img[1];
            $param_img3 = $img[2];
            $param_img4 = $img[3];
            $param_img5 = $img[4];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: manage.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>

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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add New Product</h2>
                    </div>
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Product ID</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
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
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Product Status</label>
                            <input type="text" name="status" class="form-control" value="<?php echo $status; ?>">
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="number" min="0" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($img_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="file" class="form-control" name="files[]" id="files[5]" multiple value="<?php echo $img; ?>">
                            <span class="help-block"><?php foreach ($img_err as $errMsg) { echo "$errMsg <br>"; }?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Product" style="background-color: #e04b11; border: none;">
                        <a href="manage.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>