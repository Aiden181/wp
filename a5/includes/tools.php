<?php
    session_start();

    // Include database file
    require_once "database.php";

    function displayWatches($brandName, $filter) {
        global $conn;
        // Attempt select query execution
        // product filter price ascending
        if ($filter === "price-asc") {
            $sql = "SELECT * FROM products WHERE brand='$brandName' ORDER BY `price` ASC";
        }
        // product filter price descending
        else if ($filter === "price-desc") {
            $sql = "SELECT * FROM products WHERE brand='$brandName' ORDER BY `price` DESC";
        }
        // product filter name ascending
        else if ($filter === "name-asc") {
            $sql = "SELECT * FROM products WHERE brand='$brandName' ORDER BY `name` ASC";
        }
        // product filter name descending
        else if ($filter === "name-desc") {
            $sql = "SELECT * FROM products WHERE brand='$brandName' ORDER BY `name` DESC";
        }
        // no product filter, or someone is messing with the $_GET value in URL
        else {
            $sql = "SELECT * FROM products WHERE brand='$brandName'";
        }

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {

                // ------------------------------------------------- //
                // display watches from left to right, top to bottom //
                // ------------------------------------------------- //
                // contain the watch display
                echo "<div class=\"w3-row watch-showcase-container\">\n";

                // go through each row in fetched SELECT query result to get values
                while ($row = mysqli_fetch_array($result)) {
                    // remove '../' in image links
                    $imgUrl = str_replace("../", "", $row['img1']);

                    displayWatch($row['id'], $row['name'], $row['status'], $row['price'], $imgUrl);
                }
                // display container end div
                echo "</div>\n";

                // Free result set
                mysqli_free_result($result);
            } else {
                echo "<p class='lead'><em>No records were found.</em></p>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
    

    // this function display a watch with appropriate parameters
    function displayWatch($watchID, $watchName, $watchStatus, $watchPrice, $watchImageUrl) {
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
        echo "            <p style=\"text-align: center;\">$watchName<br><b class=\"w3-text-red\">$" . number_format(sprintf('%.2f', $watchPrice), 2) . "</b></p>\n";
        echo "          </div>\n";
        echo "        </div>\n";
    }
    
    function countWatches($brandName) {
        global $conn;
        $amount = 0;
        // Include config file
        // require_once "database.php";

        // Attempt select query execution
        $sql = "SELECT * FROM products WHERE brand='$brandName'";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                // go through each row in fetched SELECT query result and count up the amount of watches
                while ($row = mysqli_fetch_array($result)) {
                    $amount++;
                }

                // Free result set
                mysqli_free_result($result);
            } else {
                echo "<p class='lead'><em>No records were found.</em></p>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        return $amount;
    }

    // this function retrieves value from watch name from watches.csv file
    // $item: "id"/"brand"/"name"/"status"/"price"/"img1"/"img2"/"img3"/"img4"/"img5"/
    // $name: watch name (String)
    function getValueFromName($item, $name) {
        global $conn;

        // Attempt select query execution
        $sql = "SELECT * FROM products WHERE name='$name'";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                // go through each row in fetched SELECT query result and count up the amount of watches
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['name'] === $name) {
                        if ($item === "id") {
                            mysqli_free_result($result);
                            return $row['id'];
                            break;
                        } else if ($item === "brand") {
                            mysqli_free_result($result);
                            return $row['brand'];
                            break;
                        } else if ($item === "status") {
                            mysqli_free_result($result);
                            return $row['status'];
                            break;
                        } else if ( $item === "price") {
                            mysqli_free_result($result);
                            return $row['price'];
                            break;
                        } else if ($item === "img1") {
                            mysqli_free_result($result);
                            return $row['img1'];
                            break;
                        } else if ($item === "img2") {
                            mysqli_free_result($result);
                            return $row['img2'];
                            break;
                        } else if ($item === "img3") {
                            mysqli_free_result($result);
                            return $row['img3'];
                            break;
                        } else if ($item === "img4") {
                            mysqli_free_result($result);
                            return $row['img4'];
                            break;
                        } else if ($item === "img5") {
                            mysqli_free_result($result);
                            return $row['img5'];
                            break;
                        }
                    }
                }
            } else {
                echo "<p class='lead'><em>No records were found.</em></p>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    function preShow( $arr, $returnAsString=false ) {
        $ret  = '<pre>' . print_r($arr, true) . '</pre>';
        if ($returnAsString)
          return $ret;
        else
          echo $ret; 
    }

    function keepSelectFieldAfterSubmit($str) {
        // if value is not null and equal to $str
        // echo selected
        // otherwise, echo nothing
        echo (isset($_GET['orderby']) && $_GET['orderby'] === $str) ? 'selected' : '';
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
    /* ----------------------------------------------------- */
    /* --------------- SHOPPING CART SECTION --------------- */
    /* ----------------------------------------------------- */

    // get page path
    $uri = $_SERVER['REQUEST_URI'];

    // // split into array with the following string as delimiter
    // $temp = explode("/Aiden181%20wp/a5/", $uri);
    // $temp1 = explode("products/", $temp[1]);
    // $temp2 = explode("?", $temp1[0]);

    // // ensure ? is split as well after $_GET form is submitted
    // if (isset($temp1[0])) {
    //     $temp2 = explode("?", $temp1[0]);
        
    //     // assign current page URL
    //     $currentPage = $temp2[0];
    // } else {
    //     // assign current page URL
    //     $currentPage = $temp1[1];
    // }
    $temp1 = str_replace('/Aiden181%20wp/a5/', '', $uri);
    $temp2 = str_replace('products/', '', $temp1);
    $temp3 = explode('?', $temp2);

    $currentPage = $temp3[0];

    /* ------------------------------- */
    /* add items to cart session array */
    /* ------------------------------- */
    // initialize session array
    if (empty($_SESSION)) {
        $_SESSION['cart'] = array();
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // when user clicks add to cart
        if (isset($_GET['item'])) {
            // validate input
            $item = test_input($_GET['item']);

            // format submitted value
            // debug
            // echo $_GET['item'] . "<br>";

            $tempArray = explode(',', $item);
            $name = $tempArray[0];
            $qty = $tempArray[1];

            // debug
            // echo $name . "<br>";
            // echo $qty . "<br>";

            // add to value if item is available in the cart
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($key === $name) {
                    $_SESSION['cart'][$key] += $qty;
                }
            }

            foreach ($_SESSION['cart'] as $key => $value) {
                if ($key === $item) {
                    $_SESSION['cart'][$item]++;
                }
            }

            // add item to cart (items that are already in won't be added)
            $_SESSION['cart'] += array($name => (empty($qty) ? 1 : $qty));

            // debug
            // echo '$_GET["item"]' .$item . "<br>";
            // echo 'name: ' . $_SESSION[$item] . "<br>";
            // echo "value: " . $_SESSION['cart'][$item] . "<br>";

            // redirect to page to prevent continuously adding to session when refresh page
            header("Location:" . $currentPage);
            exit();
        }
        // remove item from cart button
        else if (isset($_GET['remove'])) {
            $item = test_input($_GET['remove']);
            
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($key = $item) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
            // redirect page to remove $_GET parameter from URL
            header("Location:" . $currentPage);
            exit();
        }
        // item quantity change
        else if (isset($_GET['qty'])) {

            // redirect page to remove $_GET parameter from URL
            // header("Location:" . $currentPage);
            // exit();
        }
        // clear cart button
        else if (isset($_GET['session-reset'])) {
            unset($_SESSION['cart']);
            $_SESSION['cart'] = array();

            // redirect page to remove $_GET parameter from URL
            header("Location:" . $currentPage);
            exit();
        }
    }

    //debug
    // echo '$temp1 array';
    // preShow($temp1);
    // echo '$temp2 array';
    // preShow($temp2);
    // echo '$temp3 array';
    // preShow($temp3);

    echo '$_GET array';
    preShow($_GET);
    echo '$_POST array';
    preShow($_POST);
    echo '$_FILES array';
    preShow($_FILES);
    echo '$_SESSION array';
    preShow($_SESSION);

    /* ------------------------------------------------------------ */
    /* --------------- END OF SHOPPING CART SECTION --------------- */
    /* ------------------------------------------------------------ */

    /* ----------------------------------------------------- */
    /* --------------- CHECKOUT VALIDATION SECTION --------------- */
    /* ----------------------------------------------------- */
    //Customer Inputs Array
    $customer = array( "fname","lname", "email", "address","cardholdername" ,"card","cvv" , "expiry");

    // Valid or Invalid Personal Info
    $isFirstNameValid = $isLastNameValid =$isEmailValid = $isAddressValid = $isCardHolderNameValid = $isCardNumberValid = $isCVValid = $isCardExpiryValid = false;

    // Error Message Array
    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate First Name
        if (empty($_POST["cust"]["fname"])) {
            array_push($errors, "First Name is required!");
          } else {
            if (isset($_POST["cust"]["fname"])) {
              $customer["fname"] = test_input($_POST["cust"]["fname"]);
              // not matching regex, format error message
              if (!preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/", $customer["fname"])) {
                array_push($errors, "Please enter an appropriate name!");
              } else {  
                $isFirstNameValid = true;
              }
            }
          }
          // Validate Last Name
          if (empty($_POST["cust"]["lname"])) {
            array_push($errors, "Last Name is required!");
          } else {
            if (isset($_POST["cust"]["lname"])) {
              $customer["lname"] = test_input($_POST["cust"]["lname"]);
              // not matching regex, format error message
              if (!preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/", $customer["lname"])) {
                array_push($errors, "Please enter an appropriate name!");
              } else {  
                $isLastNameValid = true;
              }
            }
          }
          // Validate Email
            if (isset($_POST["cust"]["email"])) {
            $customer["email"] = test_input($_POST["cust"]["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($customer["email"], FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid email format!");
            } else {  
                $isEmailValid = true;
            }
            }
            // Validate Shipping Address
            if (empty($_POST["cust"]["address"])) {
                array_push($errors, "Shipping Address is required!");
            } else {
                // field not empty, check if data is not null 
                if (isset($_POST["cust"]["address"])) {
                $customer["address"] = test_input($_POST["cust"]["address"]);
                // not matching regex, format error message
                if (!preg_match("/^[#.0-9a-zA-Z\s,-]+$/", $customer["address"])) {
                    array_push($errors, "Please enter an appropriate shipping address!");
                } else { 
                    $isAddressValid = true;
                }
                }
            }
            // Validate Card Holder Name
            if (empty($_POST["cust"]["cardholdername"])) {
                array_push($errors, "Card Holder Name is required!");
              } else {
                // field not empty, check if data is not null 
                if (isset($_POST["cust"]["cardholdername"])) {
                  $customer["lname"] = test_input($_POST["cust"]["cardholdername"]);
                  // not matching regex, format error message
                  if (!preg_match("/^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/", $customer["cardholdername"])) {
                    array_push($errors, "Please enter an appropriate name!");
                  } else { 
                    $isCardHolderNameValid = true;
                  }
                }
              }
            // Validate Customer Credit Card Number
            if (empty($_POST["cust"]["card"])) {
                array_push($errors, "Credit card number is required!");
            } else {
                // field not empty, check if data is not null 
                if (isset($_POST["cust"]["card"])) {
                $customer["card"] = test_input($_POST["cust"]["card"]);
                // not matching regex, format error message
                if (!preg_match("/[0-9]{14,19}/", $customer["card"])) {
                    array_push($errors, "Please enter a valid credit card number!");
                } else {
                    $isCardNumberValid = true;
                }
                }
            }
                }
             // Validate Customer Credit Card Expiry Date
             if (empty($_POST["cust"]["expiry"])) {
                array_push($errors, "Credit card expiry date is required!");
            } else {
                if (isset($_POST["cust"]["expiry"])) {
                    $customer["expiry"] = test_input($_POST["cust"]["expiry"]);
                    if ($customer["expiry"] <= date('Y-m', strtotime('+28 days'))) {
                      array_push($errors, "Please enter a non-expired credit card!");
                    } else { 
                      $isCardExpiryValid = true;
                    }
                }
                
            // Validate Customer Credit Card CVV
            if (empty($_POST["cust"]["cvv"])) {
                array_push($errors, "CVV number is required!");
            } else {
                // field not empty, check if data is not null 
                if (isset($_POST["cust"]["cvv"])) {
                $customer["cvv"] = test_input($_POST["cust"]["cvv"]);
                // not matching regex, format error message
                if (!preg_match("/^[0-9]{3}$/", $customer["cvv"])) {
                    array_push($errors, "Please enter a valid CVV number!");
                } else { 
                    $isCVValid = true;
                }
            }
        }
     }
    /* ------------------------------------------------------------ */
    /* --------------- END OF CHECKOUT VALIDATION SECTION --------------- */
    /* ------------------------------------------------------------ */

    // commented out because it's done
    /* -------------------------------- */
    /* WATCHES.CSV TO DATABSE MIGRATION */
    /* -------------------------------- */
    // require_once "includes/database.php";
    // $tempList = array();

    // // open watches.csv to get watch brand name and details
    // $file = fopen("watches.csv", "r") or die("Unable to open file!");;
    // flock($file, LOCK_SH);

    // // read the heading
    // $headings = fgetcsv($file);

    // // read through the line and store each line array element
    // while ($aLineOfCells = fgetcsv($file)) {
    //     $tempList[] = $aLineOfCells;
    // }
    
    // flock($file, LOCK_UN);
    // fclose($file);

    // $sql = "";
    // // if name in array matches $brandName, add to watchList array
    // foreach ($tempList as $watch) {
    //     //  debug
    //     echo "$watch[0] <br>";   // id
    //     echo "$watch[1] <br>";   // brand
    //     echo "$watch[2] <br>";   // name
    //     echo "$watch[3] <br>";   // status
    //     echo "$watch[4] <br>";   // price
    //     echo "$watch[5] <br>";   // img1
    //     echo "$watch[6] <br>";   // img2
    //     echo "$watch[7] <br>";   // img3
    //     echo "$watch[8] <br>";   // img4
    //     echo "$watch[9] <br>";   // img5
    //     echo "<br>";
    //     echo "<br>";

    //     $sql = "INSERT IGNORE INTO products (`id`, `brand`, `name`, `status`, `price`, `img1`, `img2`, `img3`, `img4`, `img5`) 
    //     VALUES ('$watch[0]', '$watch[1]', '$watch[2]', '$watch[3]', '$watch[4]', '$watch[5]', '$watch[6]', '$watch[7]', '$watch[8]', '$watch[9]');";
        
    //     if (mysqli_multi_query($conn, $sql)) {
    //         echo "<p>New record created successfully</p>";
    //     } else {
    //         echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    //     }
    // }
    /* --------------------------------------- */
    /* END OF WATCHES.CSV TO DATABSE MIGRATION */
    /* --------------------------------------- */
?>