<?php
    session_start();

    function sortByAsc($a, $b) {
        return $a['1'] - $b['1'];
    }
    function sortByDesc($a, $b) {
        return $b['1'] - $a['1'];
    }
    
    // this function displays watches which brand name matches the first parameter, also filter
    function displayWatches($brandName, $filter) {
        $tempList = array();
        $watchList = array();

        // open watches.csv to get watch brand name and details
        $file = fopen("watches.csv", "r") or die("Unable to open file!");;
        flock($file, LOCK_SH);
    
        // read the heading
        $headings = fgetcsv($file);

        // read through the line and store each line array element
        while ($aLineOfCells = fgetcsv($file)) {
            $tempList[] = $aLineOfCells;
        }
        
        flock($file, LOCK_UN);
        fclose($file);

        // if name in array matches $brandName, add to watchList array
        foreach ($tempList as $watch) {
            //  debug
            // echo "$watch[0] <br>";   // brand name
            // echo "$watch[1] <br>";   // name
            // echo "$watch[2] <br>";   // status
            // echo "$watch[3] <br>";   // price
            // echo "$watch[4] <br>";   // image url
            // echo "$watch[5] <br>";   // product detail page
            // echo "<br>";
            // echo "<br>";

            if ($watch[0] === $brandName) {
                $watchList[$watch[1]] = array();
                array_push($watchList[$watch[1]], $watch[2]);   // status (New, Sale, ...)
                array_push($watchList[$watch[1]], $watch[3]);   // price
                array_push($watchList[$watch[1]], $watch[4]);   // image URL
                array_push($watchList[$watch[1]], "products/" . $watch[5]);   // product detail web page
            }
        }

        // display watches from left to right using watchList array
        // contain the watch display
        echo "<div class=\"w3-row watch-showcase-container\">\n";
        if ($filter === "none") {
            foreach ($watchList as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2], $watchInfo[3]);
            }
        } else if ($filter === "price-asc") {
            $tempList = $watchList;
            $tempList2 = array();
            usort($watchList, 'sortByAsc');

            foreach($watchList as $watchName => $watchInfo) {
                foreach($tempList as $tempName => $tempInfo) {
                    // same page link, update name
                    if ($watchInfo[3] === $tempInfo[3]) {
                        $tempList2[$tempName] = $watchInfo;
                    }
                }
            }

            // display watches
            foreach ($tempList2 as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2], $watchInfo[3]);
            }
        } else if ($filter === "price-desc") {
            $tempList = $watchList;
            $tempList2 = array();
            usort($watchList, 'sortByDesc');

            foreach($watchList as $watchName => $watchInfo) {
                foreach($tempList as $tempName => $tempInfo) {
                    // same page link, update name
                    if ($watchInfo[3] === $tempInfo[3]) {
                        $tempList2[$tempName] = $watchInfo;
                    }
                }
            }

            // display watches
            foreach ($tempList2 as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2], $watchInfo[3]);
            }
        } else if ($filter === "name-asc") {
            // sort array name in ascending order
            ksort($watchList);
            // display watches
            foreach ($watchList as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2], $watchInfo[3]);
            }
        } else if ($filter === "name-desc") {
            // sort array name in descending order
            krsort($watchList);
            // display watches
            foreach ($watchList as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2], $watchInfo[3]);
            }
        }
        // display container end div
        echo "</div>\n";
    }

    // function for displayWatches function, display a watch with params
    function displayWatch($watchName, $watchStatus, $watchPrice, $watchImageUrl, $watchDetailsPage) {
        global $currentPage;
        echo "        <div class=\"w3-col l3 s6\">\n";
        echo "          <div class=\"w3-container\">\n";
        echo "            <div class=\"w3-display-container\">\n";
        echo "              <a href=$watchDetailsPage><img src=$watchImageUrl style=\"width:100%\"></a>\n";
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
        $amount = 0;
        $tempList = array();

        // open watches.csv to get watch brand name and details
        $filename = "watches.csv";
        $file = fopen($filename, "r") or die("Unable to open file!");;
        flock($file, LOCK_SH);
    
        // read the heading
        $headings = fgetcsv($file);

        // read through the line and store each line array element
        while ($aLineOfCells = fgetcsv($file)) {
            $tempList[] = $aLineOfCells;
        }
        
        flock($file, LOCK_UN);
        fclose($file);

        // if name in array matches $brandName, add to watchList array
        foreach ($tempList as $watch) {
            //  debug
            // echo "$watch[0] <br>";   // brand name
            // echo "$watch[1] <br>";   // name
            // echo "$watch[2] <br>";   // status
            // echo "$watch[3] <br>";   // price
            // echo "$watch[4] <br>";   // image url
            // echo "$watch[5] <br>";   // website
            // echo "<br>";
            // echo "<br>";

            if ($watch[0] === $brandName) {
                $amount++;
            }
        }
        return $amount;
    }

    // this function retrieves value from watch name from watches.csv file
    // $item: "brand"/"status"/"price"/"image"/"website"
    // $name: watch name (String)
    function getValueFromName($item, $name) {
        $tempList = array();

        // open watches.csv to get watch brand name and details
        $file = fopen("watches.csv", "r") or die("Unable to open file!");;
        flock($file, LOCK_SH);
    
        // read the heading
        $headings = fgetcsv($file);

        // read through the line and store each line array element
        while ($aLineOfCells = fgetcsv($file)) {
            $tempList[] = $aLineOfCells;
        }
        
        flock($file, LOCK_UN);
        fclose($file);

        // if name in array matches $name, return price
        foreach ($tempList as $watch) {
            //  debug
            // echo "$watch[0] <br>";   // brand name
            // echo "$watch[1] <br>";   // name
            // echo "$watch[2] <br>";   // status
            // echo "$watch[3] <br>";   // price
            // echo "$watch[4] <br>";   // image url
            // echo "$watch[5] <br>";   // product detail page
            // echo "<br>";
            // echo "<br>";

            if ($watch[1] === $name) {
                if ($item === "brand") {
                    return $watch[0];
                } else if ($item === "status") {
                    return $watch[2];
                } else if( $item === "price") {
                    return $watch[3];
                } else if ($item === "image") {
                    return $watch[4];
                } else if ($item === "website") {
                    return $watch[5];
                }
            }
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
        else if (isset($_GET['session-reset'])) {
            unset($_SESSION['cart']);
            $_SESSION['cart'] = array();
            // foreach($_SESSION as $something => &$whatever) {
            //     unset($whatever);
            // }
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
    echo '$_SESSION array';
    preShow($_SESSION);

    /* ------------------------------------------------------------ */
    /* --------------- END OF SHOPPING CART SECTION --------------- */
    /* ------------------------------------------------------------ */
?>