<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.php" media="screen">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Search Results</title>

    <!-- website icon -->
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <?php
    include('includes/header.php');
    $searchInput = "";
    $resultCount = 0;

    // this function display a watch with appropriate parameters
    function displaySearchedWatch($watchID, $watchBrand, $watchName, $watchStatus, $watchPrice, $watchImageUrl) {
        global $currentPage;
        echo "        <div class=\"w3-col l3 s6\">\n";
        echo "          <div class=\"w3-container\">\n";
        echo "            <div class=\"w3-display-container\">\n";
        echo "              <a href=\"products/$watchID.php\"><img src=\"$watchImageUrl\" style=\"width:100%\"></a>\n";
        if ($watchStatus != "") {
            echo "          <span class=\"w3-tag w3-display-topleft\">$watchStatus</span>";
        }
        echo "            <form action=\"$currentPage\" method=\"GET\" class=\"w3-display-hover\" style=\"position: absolute; top: 75%; left: 25%;\">\n";
        echo "              <button type=\"hidden\" class=\"w3-button w3-black add-to-cart\" name='item' onclick=\"this.form.submit()\" value=\"$watchName\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
        echo "            </form>\n";
        echo "            </div>\n";
        echo "            <p style=\"text-align: center;\">$watchName<br><b class=\"w3-text-red\">$" . number_format(sprintf('%.2f', $watchPrice), 2) . "</b><br><b>". strtoupper($watchBrand) . "</b></p>\n";
        echo "          </div>\n";
        echo "        </div>\n";
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET['search'])) {
            $searchInput = test_input($_GET['search']);
            
            $sql = "SELECT * FROM products";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        $brandName = $row['brand'];
                        $name = $row['name'];
                        $status = $row['status'];
                        $price = $row['price'];
                        $imgURL = str_replace("../", "", $row['img1']);
                        // preShow($row);

                        if (strpos(strtolower($brandName), strtolower($searchInput)) !== false) {
                            $resultCount++;
                        }
                        if (strpos(strtolower($name), strtolower($searchInput)) !== false) {
                            $resultCount++;
                        }
                        if (strpos(strtolower($status), strtolower($searchInput)) !== false) {
                            $resultCount++;
                        }
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "<p class='lead'><em>No results.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }
    }
    ?>

    <br>
    <br>
    <br>
    <div class="container">
        <h3>Search results for: <?php echo $searchInput ?></h3>
        <?php
        if ($resultCount > 0) {
            echo "<h4>Viewing $resultCount results</h4>";
        }
        ?>
    </div>
    <br>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (!empty($_GET['search'])) {
                $searchInput = test_input($_GET['search']);
                
                $sql = "SELECT * FROM products";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $brandName = $row['brand'];
                            $name = $row['name'];
                            $status = $row['status'];
                            $price = $row['price'];
                            $imgURL = str_replace("../", "", $row['img1']);
                            // preShow($row);

                            if (strpos(strtolower($brandName), strtolower($searchInput)) !== false) {
                                displaySearchedWatch($id, $brandName, $name, $status, $price, $imgURL);
                            }
                            if (strpos(strtolower($name), strtolower($searchInput)) !== false) {
                                displaySearchedWatch($id, $brandName, $name, $status, $price, $imgURL);
                            }
                            if (strpos(strtolower($status), strtolower($searchInput)) !== false) {
                                displaySearchedWatch($id, $brandName, $name, $status, $price, $imgURL);
                            }
                        }
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo "<p class='lead'><em>No results.</em></p>";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }

                // Close connection
                mysqli_close($conn);
            }
        }
        ?>
    </div>

    <div id="blankspace"></div>
    <?php include('includes/footer.php'); ?>
</body>
</html>