<?php
// Include config file
include('../includes/tools.php');
require_once "../includes/database.php";
 
// Define variables and initialize with empty values
$id = $brand = $prodname = $img1 = $img2 = $img3 = $img4 = $img4 = "";
$price = 0.00;
$id_err = $brand_err = $prodname_err = $price_err = $img_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "GET") {
    // Validate ID
    if (isset($_GET["id"])) {
        $input_id = trim($_GET["id"]);
        if(empty($input_id)){
            $id_err = "Please enter product id.";     
        } else{
            $id = $input_id;
        }
    }
    
     // Validate Brand Name
    if (isset($_GET["brand"])) {
        $input_brand = trim($_GET["brand"]);
        if(empty($input_brand)){
            $brand_err = "Please enter product brand.";     
        } else{
            $brand = $input_brand;
        }
    }
    
    // Validate Product Name
    if (isset($_GET["prodname"])) {
        $input_prodname = trim($_GET["prodname"]);
        if(empty($input_address)){
            $prodname_err = "Please enter product name.";     
        } else{
            $prodname = $input_prodname;
        }
    }
    
    // Validate Price
    if (isset($_GET["price"])) {
        $input_price = trim($_GET["price"]);
        if(empty($input_salary)){
            $price_err = "Please enter the price for your product.";     
        } else if(!ctype_digit($input_salary)){
            $price_err = "Please enter a positive integer value.";
        } else{
            $price = $input_price;
        }
    }

    // Validate Image
    if (isset($_GET["img"])) {
        $input_img = ($_GET["img"]);
        if(empty($input_salary)){
            $img_err = "Please upload an image.";  
        }
        $target_dir = "img/watches";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = true;

        // Check if image file is a actual image or fake image
        if(isset($_GET["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = true;
            } else {
                echo "File is not an image.";
                $uploadOk = false;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = false;
        }
        // Check file size
        if ($_FILES["img"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = false;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = false;
        }
        // Check if $uploadOk is set to false by an error
        if (!$uploadOk) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, upload file
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    
    // Check input errors before inserting in database
    if(empty($brand_err) && empty($prodname_err) && empty($price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (brand, prodname, price) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, $param_id, $param_brand, $param_prodname, $param_price);
            
            // Set Parameters
            $param_brand = $id;
            $param_brand = $brand;
            $param_prodname = $prodname;
            $param_price = $price;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: manage.php");
                exit();
            } else{
                echo "Something went wrong. Please try again.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
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
        <button type="button" class="btn" style="position: relative; right: 30%; top: 70px ;background-color: #e04b11; color:"><a href="manage.php" style="color:white">Manage</a></button>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add New Product</h2>
                    </div>
                    <form action="create.php" method="GET">
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
                        <div class="form-group <?php echo (!empty($prodname_err)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="prodname" class="form-control" value="<?php echo $prodname; ?>">
                            <span class="help-block"><?php echo $prodname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="number" min="0" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($prodname_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="file" name="img" class="form-control" value="<?php echo $img; ?>">
                            <span class="help-block"><?php echo $img_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Create New Product" style="background-color: #e04b11; border: none;">
                        <a href="manage.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>