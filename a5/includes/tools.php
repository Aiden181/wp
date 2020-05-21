<?php
    function displayWatches($brandName, $filter) {
        $tempList = array();
        $watchList = array();

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
            // echo "$watch[0] <br>";
            // echo "$watch[1] <br>";
            // echo "$watch[2] <br>";
            // echo "$watch[3] <br>";
            // echo "$watch[4] <br>";
            // echo "<br>";
            // echo "<br>";

            if ($watch[0] === $brandName) {
                $watchList[$watch[1]] = array();
                array_push($watchList[$watch[1]], $watch[2]);
                array_push($watchList[$watch[1]], $watch[3]);
                array_push($watchList[$watch[1]], $watch[4]);
            }
        }

        // display watches from left to right using watchList array
        
        // contain the watch display
        echo "        <div class=\"w3-row watch-showcase-container\">\n";
        if ($filter === "none") {
            foreach ($watchList as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2]);
            }
        } else if ($filter === "priceLowToHigh") {
            array_multisort($watchList, SORT_ASC);
            // display watches
            foreach ($watchList as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2]);
            }
        } else if ($filter === "priceHighToLow") {
            array_multisort($watchList, SORT_DESC);
            // display watches
            foreach ($watchList as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2]);
            }
        } else if ($filter === "aToZ") {
            // sort array name in ascending order
            ksort($watchList);
            // display watches
            foreach ($watchList as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2]);
            }
        } else if ($filter === "zToA") {
            // sort array name in descending order
            krsort($watchList);
            // display watches
            foreach ($watchList as $watchName => $watchInfo) {
                displayWatch($watchName, $watchInfo[0], $watchInfo[1], $watchInfo[2]);
            }
        }
        // display container end div
        echo "        </div>\n";
    }

    // function for displayWatches function, display a watch with params
    function displayWatch($watchName, $watchStatus, $watchPrice, $watchImageUrl) {
        echo "        <div class=\"w3-col l3 s6\">\n";
        echo "          <div class=\"w3-container\">\n";
        echo "            <div class=\"w3-display-container\">\n";
        echo "              <img src=$watchImageUrl style=\"width:100%\">\n";
        if ($watchStatus != "") {
            echo "          <span class=\"w3-tag w3-display-topleft\">$watchStatus</span>";
        }
        echo "              <div class=\"w3-display-middle w3-display-hover\">\n";
        echo "                <button class=\"w3-button w3-black\" style=\"position: relative; top: 60px;\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
        echo "              </div>\n";
        echo "            </div>\n";
        echo "            <p style=\"text-align: center;\">$watchName<br><b class=\"w3-text-red\">$$watchPrice</b></p>\n";
        echo "          </div>\n";
        echo "        </div>\n";
    }

    function preShow( $arr, $returnAsString=false ) {
        $ret  = '<pre>' . print_r($arr, true) . '</pre>';
        if ($returnAsString)
          return $ret;
        else
          echo $ret; 
    }
?>