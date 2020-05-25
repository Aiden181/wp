<?php
// Include config file
require_once "../includes/database.php";
 
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";

$id = $brand = $prodname = $img1 = $img2 = $img3 = $img4 = $img4 = "";
$price = 0.00;
$brand_err = $prodname_err = $price_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
     // Validate Brand Name
     $input_brand = trim($_POST["brand"]);
     if(empty($input_brand)){
         $brand_err = "Please enter a product brand.";     
     } else{
         $brand = $input_brand;
     }
    
    // Validate Product Name
    $input_prodname = trim($_POST["prodname"]);
    if(empty($input_address)){
        $prodname_err = "Please enter a product name.";     
    } else{
        $prodname = $input_prodname;
    }
    
    // Validate Price
    $input_price = trim($_POST["price"]);
    if(empty($input_salary)){
        $price_err = "Please enter the price for your product.";     
    } elseif(!ctype_digit($input_salary)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }

    // Validate Image
    $input_img = ($_POST["img"]);
    if(empty($input_img)){
        $img_err = "Please include product's picture.";  
    }
    $target_dir = "img/watches";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        } else {
        echo "File is not an image.";
        $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
        }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }

    
    // Check input errors before inserting in database
    if(empty($brand_err) && empty($prodname_err) && empty($price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (brand, prodname, price) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_brand, $param_prodname, $param_price);
            
            // Set Parameters
            $param_brand = $brand;
            $param_prodname = $prodname;
            $param_price = $price;
            
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
                        <h2>Create New Product</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($brand_err)) ? 'has-error' : ''; ?>">
                            <label>Brand</label>
                            <input type="text" name="brand" class="form-control" value="<?php echo $brand; ?>">
                            <span class="help-block"><?php echo $brand_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($prodname_err)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="product" class="form-control" value="<?php echo $prodname; ?>">
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