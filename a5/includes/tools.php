<?php
    $dwList = array();
    $movadoList = array();
    $mvmtList = array();
    $sevenFridayList = array();

    function addWatchToList() {
        global $dwList;
        global $movadoList;
        global $mvmtList;
        global $sevenFridayList;

        $filename = "watches.csv";
        $file = fopen($filename, "r") or die("Unable to open file!");;
        flock($file, LOCK_SH);
    
        // read the heading
        $headings = fgetcsv($file);

        // read through the line and 
        while ($aLineOfCells = fgetcsv($file)) {
            $watchList[] = $aLineOfCells;
        }
        
        flock($file, LOCK_UN);
        fclose($file);

        foreach ($watchList as $watch) {
            //  debug
            // echo "$watch[0] <br>";
            // echo "$watch[1] <br>";
            // echo "$watch[2] <br>";
            // echo "$watch[3] <br>";
            // echo "$watch[4] <br>";
            // echo "<br>";
            // echo "<br>";

            if ($watch[0] === "Daniel Wellington") {
                for ($i = 0; $i < 8; $i++) {
                    $dwList[$watch[1]] = array();
                    array_push($dwList[$watch[1]], $watch[2]);
                    array_push($dwList[$watch[1]], $watch[3]);
                    array_push($dwList[$watch[1]], $watch[4]);
                }
            }
            else if ($watch[0] === "movado") {
                for ($i = 0; $i < 8; $i++) {
                    $movadoList[$watch[1]] = array();
                    array_push($movadoList[$watch[1]], $watch[2]);
                    array_push($movadoList[$watch[1]], $watch[3]);
                    array_push($movadoList[$watch[1]], $watch[4]);
                }
            }
            else if ($watch[0] === "MVMT") {
                for ($i = 0; $i < 8; $i++) {
                    $mvmtList[$watch[1]] = array();
                    array_push($mvmtList[$watch[1]], $watch[2]);
                    array_push($mvmtList[$watch[1]], $watch[3]);
                    array_push($mvmtList[$watch[1]], $watch[4]);
                }
            }
            else if ($watch[0] === "sevenfriday") {
                for ($i = 0; $i < 8; $i++) {
                    $sevenFridayList[$watch[1]] = array();
                    array_push($sevenFridayList[$watch[1]], $watch[2]);
                    array_push($sevenFridayList[$watch[1]], $watch[3]);
                    array_push($sevenFridayList[$watch[1]], $watch[4]);
                }
            }
        }

        //  debug
        // preShow($dwList);
        // preShow($movadoList);
        // preShow($mvmtList);
        // preShow($sevenFridayList);
    }

    // This function displays all the available watches in the watch list ($watchList)
    function showcaseWatches($watchList) {
        echo "        <div class=\"w3-row home-watch-showcase-container\">\n";
        foreach ($watchList as $watchName => $watchInfo) {
            echo "        <div class=\"w3-col l3 s6\">\n";
            echo "          <div class=\"w3-container\">\n";
            echo "            <div class=\"w3-display-container\">\n";
            echo "              <img src=$watchInfo[2] style=\"width:100%\">\n";
            if ($watchInfo[0] != "") {
                echo "          <span class=\"w3-tag w3-display-topleft\">$watchInfo[0]</span>";
            }
            echo "              <div class=\"w3-display-middle w3-display-hover\">\n";
            echo "                <button class=\"w3-button w3-black\" style=\"position: relative; top: 60px;\">Add To Cart <i class=\"fa fa-shopping-cart\"></i></button>\n";
            echo "              </div>\n";
            echo "            </div>\n";
            echo "            <p style=\"text-align: center;\">$watchName<br><b class=\"w3-text-red\">$watchInfo[1]</b></p>\n";
        
            echo "          </div>\n";
            echo "        </div>";
        }
        echo "        </div>";
        
    }
    function preShow( $arr, $returnAsString=false ) {
        $ret  = '<pre>' . print_r($arr, true) . '</pre>';
        if ($returnAsString)
          return $ret;
        else
          echo $ret; 
    }

    
    addWatchToList();
?>