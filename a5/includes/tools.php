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
    echo (isset($_POST['orderby']) && $_POST['orderby'] === $str) ? 'selected' : '';
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// get current page
$uri = $_SERVER['REQUEST_URI'];
$temp0 = str_replace('/Aiden181%20wp/a5/', '', $uri);
$temp1 = str_replace('products/', '', $temp0);
$temp2 = str_replace('admin/', '', $temp1);
$temp3 = explode('?', $temp2);
$currentPage = $temp3[0];


/* ----------------------------------------------------- */
/* --------------- SHOPPING CART SECTION --------------- */
/* ----------------------------------------------------- */

/* ------------------------------- */
/* add items to cart session array */
/* ------------------------------- */
// initialize cart session array
if (empty($_SESSION) || !isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
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
        $temp = explode(",", $_GET['qty']);
        $name = $temp[0];
        $qty = $temp[1];
        $_SESSION['cart'][$name] = $qty;
        // redirect page to remove $_GET parameter from URL
        header("Location:" . $currentPage);
        exit();
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

/* ------------------------------------------------------------ */
/* --------------- END OF SHOPPING CART SECTION --------------- */
/* ------------------------------------------------------------ */


/* ---------------------------------------------------------- */
/* --------------- CHECKOUT PAGE VALIDATION SECTION --------- */
/* ---------------------------------------------------------- */
//Customer Inputs Array
$customer = array( "fname","lname", "email" => "", "address", "cardname","card", "cvv", "expiry");

// Valid or Invalid Personal Info
$isFirstNameValid = $isLastNameValid = $isAddressValid = $isCardHolderNameValid = $isCardNumberValid = $isCVValid = $isCardExpiryValid = false;

$fnameError = "Valid first name is required.";
$lnameError = "Valid last name is required.";
$emailError = "";
$addressError = "Please enter your shipping address.";
$cardNameError = "Full name as displayed on card.";
$cardNumError = "Credit card number is required.";
$cardExpiryError = "Expiration date required.";
$cvvError = "Security code required.";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['checkout-submit'])) {
        // Validate First Name
        if (empty($_POST["cust"]["fname"])) {
            $fnameError = "First Name is required!";
        } else {
            if (isset($_POST["cust"]["fname"])) {
                $customer["fname"] = test_input($_POST["cust"]["fname"]);
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/", $customer["fname"])) {
                    $fnameError = "Please enter an appropriate name!";
                } else {  
                    $isFirstNameValid = true;
                }
            }
        }

        // Validate Last Name
        if (empty($_POST["cust"]["lname"])) {
            $lnameError = "Last Name is required!";
        } else {
            if (isset($_POST["cust"]["lname"])) {
                $customer["lname"] = test_input($_POST["cust"]["lname"]);
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/", $customer["lname"])) {
                    $lnameError = "Please enter an appropriate name!";
                } else {  
                    $isLastNameValid = true;
                }
            }
        }

        // Validate Email
        if (isset($_POST["cust"]["email"])) {
            if (!empty($_POST["cust"]["email"])) {
                $customer["email"] = test_input($_POST["cust"]["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($customer["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Invalid email format!";
                }
            }
        }

        // Validate Shipping Address
        if (empty($_POST["cust"]["address"])) {
            $addressError = "Shipping Address is required!";
        } else {
        // field not empty, check if data is not null 
        if (isset($_POST["cust"]["address"])) {
                $customer["address"] = test_input($_POST["cust"]["address"]);
                // not matching regex, format error message
                if (!preg_match("/^[#.0-9a-zA-Z\s,-]+$/", $customer["address"])) {
                    $addressError = "Please enter an appropriate shipping address!";
                } else {
                    $isAddressValid = true;
                }
            }
        }

        // Validate Card Holder Name
        if (empty($_POST["cust"]["cardname"])) {
            $cardNameError = "Card Holder Name is required!";
        } else {
            // field not empty, check if data is not null 
            if (isset($_POST["cust"]["cardname"])) {
                $customer["cardname"] = test_input($_POST["cust"]["cardname"]);
                // not matching regex, format error message
                if (!preg_match("/^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/", $customer["cardname"])) {
                    $cardNameError = "Please enter an appropriate name!";
                } else { 
                    $isCardHolderNameValid = true;
                }
            }
        }

        // Validate Customer Credit Card Number
        if (empty($_POST["cust"]["card"])) {
            $cardNumError = "Credit card number is required!";
        } else {
            // field not empty, check if data is not null 
            if (isset($_POST["cust"]["card"])) {
                $customer["card"] = test_input($_POST["cust"]["card"]);
                // not matching regex, format error message
                if (!preg_match("/[0-9]{14,19}/", $customer["card"])) {
                    $cardNumError = "Please enter a valid credit card number!";
                } else {
                    $isCardNumberValid = true;
                }
            }
        }

        // Validate Customer Credit Card Expiry Date
        if (empty($_POST["cust"]["expiry"])) {
            $cardExpiryError = "Credit card expiry date is required!";
        } else {
            if (isset($_POST["cust"]["expiry"])) {
                $customer["expiry"] = test_input($_POST["cust"]["expiry"]);
                if ($customer["expiry"] <= date('Y-m', strtotime('+28 days'))) {
                    $cardExpiryError = "Please enter a non-expired credit card!";
                } else {
                    $isCardExpiryValid = true;
                }
            }
        }

        // Validate Customer Credit Card CVV
        if (empty($_POST["cust"]["cvv"])) {
            $cvvError = "CVV number is required!";
        } else {
            // field not empty, check if data is not null 
            if (isset($_POST["cust"]["cvv"])) {
                $customer["cvv"] = test_input($_POST["cust"]["cvv"]);
                // not matching regex, format error message
                if (!preg_match("/^[0-9]{3}$/", $customer["cvv"])) {
                    $cvvError = "Please enter a valid CVV number!";
                } else { 
                    $isCVValid = true;
                }
            }
        }
    }

    if ($isFirstNameValid && $isLastNameValid && $isAddressValid && $isCardHolderNameValid && $isCardNumberValid && $isCVValid && $isCardExpiryValid) {
        // make array that only has names of items
        $itemNames = array_keys($_SESSION['cart']);
        $subTotal = $totalPrice = $shipping = 0;
        $tax = 10;

        if (sizeof($_SESSION['cart']) < 1) {
            $shipping = 0;
        } else {
            $shipping = 10;
        }

        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            // assign these long code chunks to easy-to-read variables
            $name = $itemNames[$i];
            $qty = $_SESSION['cart'][$itemNames[$i]];
            $price = getValueFromName("price", "$name") * $qty;
            $subTotal += $price;
        }
        $totalPrice = $subTotal + $subTotal*$tax/100 + $shipping;

        $items = "";

        foreach ($_SESSION['cart'] as $key => $value) {
            $items .= getValueFromName("id", $key) . ",";
        }
        
        // Prepare an insert statement
        $sql = "INSERT INTO orders (firstName, lastName, email, address, orderDate, items, totalPrice) VALUES (?, ?, ?, ?, ?, ?, ?);";


        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssd", $param_fname, $param_lname, $param_email, $param_address, $param_orderDate, $param_items, $param_totalPrice);

            // Set parameters
            $param_fname = $customer["fname"];
            $param_lname = $customer["lname"];
            $param_email = $customer["email"];
            $param_address = $customer["address"];
            $param_orderDate = date("Y-m-d H:i:s");
            $param_items = $items;
            $param_totalPrice = $totalPrice;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['receipt']['fname'] = $_POST['cust']['fname'];
                $_SESSION['receipt']['lname'] = $_POST['cust']['lname'];
                $_SESSION['receipt']['address'] = $_POST['cust']['address'];
                $_SESSION['receipt']['email'] = $_POST['cust']['email'];
                $_SESSION['receipt']['items'] = $_SESSION['cart'];
                unset($_SESSION['cart']);
                // Redirect to receipt page
                header("Location: receipt.php");
                exit();
            } else {
                var_dump(mysql_error());
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);

    }
}

/* --------------------------------------------------------- */
/* -------- END OF CHECKOUT PAGE VALIDATION SECTION -------- */
/* --------------------------------------------------------- */


/* --------------------------------------------------------- */
/* --------------- CONTACT PAGE VALIDATION SECTION --------- */
/* --------------------------------------------------------- */
//Customer Inputs Array
$contact = array( "fname","lname", "email", "message");

// Valid or Invalid Personal Info
$isFirstNameValid = $isLastNameValid = $isEmailValid = $isMessageValid = false;

$fnameError = "Valid first name is required.";
$lnameError = "Valid last name is required.";
$emailError = "Email address is required";
$msgError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['contact-submit'])) {
        // Validate First Name
        if (empty($_POST["contact"]["fname"])) {
            $fnameError = "First Name is required!";
        } else {
            if (isset($_POST["contact"]["fname"])) {
                $contact["fname"] = test_input($_POST["contact"]["fname"]);
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/", $contact["fname"])) {
                    $fnameError = "Please enter an appropriate name!";
                } else {  
                    $isFirstNameValid = true;
                }
            }
        }

        // Validate Last Name
        if (empty($_POST["contact"]["lname"])) {
            $lnameError = "Last Name is required!";
        } else {
            if (isset($_POST["contact"]["lname"])) {
                $contact["lname"] = test_input($_POST["contact"]["lname"]);
                // not matching regex, format error message
                if (!preg_match("/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/", $contact["lname"])) {
                    $lnameError = "Please enter an appropriate name!";
                } else {  
                    $isLastNameValid = true;
                }
            }
        }

        // Validate Email
        if (isset($_POST["contact"]["email"])) {
            if (!empty($_POST["contact"]["email"])) {
                $contact["email"] = test_input($_POST["contact"]["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($contact["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Invalid email format!";
                } else {  
                    $isEmailValid = true;
                }
            }
        }

        // Validate Message
        if (empty($_POST["contact"]["message"])) {
            $msgError = "Please write something before submitting";
        } else {
            if (isset($_POST["contact"]["message"])) {
                $contact["message"] = test_input($_POST["contact"]["message"]);
                $isMessageValid = true;
            }
        }
    }

    if ($isFirstNameValid && $isLastNameValid && $isEmailValid && $isMessageValid) {
        // Prepare an insert statement
        $sql = "INSERT INTO contacts (firstName, lastName, email, message) VALUES (?, ?, ?, ?);";


        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_fname, $param_lname, $param_email, $param_msg);

            // Set parameters
            $param_fname = $contact["fname"];
            $param_lname = $contact["lname"];
            $param_email = $contact["email"];
            $param_msg = $contact["message"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
            } else {
                var_dump(mysql_error());
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);
    }
}
/* -------------------------------------------------------- */
/* -------- END OF CONTACT PAGE VALIDATION SECTION -------- */
/* -------------------------------------------------------- */


/* ----------------------------------- */
/* -------- CRUD USER SECTION -------- */
/* ----------------------------------- */

// define roles
define('ROOT', "z");
define('ADMIN_LIST_ADMINS', "1");
define('ADMIN_ADD_ADMINS', "2");
define('ADMIN_EDIT_ADMINS', "3");
define('ADMIN_DELETE_ADMINS', "4");
define('FLAG_CREATE', "c");
define('FLAG_READ', "r");
define('FLAG_UPDATE', "u");
define('FLAG_DELETE', "d");

// $file = fopen("users.csv", "r");
// flock($file, LOCK_SH);

// // read the heading
// $headings = fgetcsv($file);

// // read through the line add to array
// while ($aLineOfCells = fgetcsv($file)) {
//     $records[] = $aLineOfCells;
// }

// flock($file, LOCK_UN);
// fclose($file);

// preShow($records);

// foreach ($records as $thingy => $array2) {
//     // echo "$value <br>";
//     foreach ($array2 as $key => $value) {
//         echo $key['1'] . " <br>";
//         // echo "$value <br>";
//     }
// }

/* ------------------------------------------ */
/* -------- END OF CRUD USER SECTION -------- */
/* ------------------------------------------ */

// debug print outs
// echo '$_GET array';
// preShow($_GET);
// echo '$_POST array';
// preShow($_POST);
// echo '$_FILES array';
// preShow($_FILES);
echo '$_SESSION array';
preShow($_SESSION);
?>