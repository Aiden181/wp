<div class="col-sm-6">
    <div class="product-gallery">
        <div class="product-image">
            <img class="active" src=<?php echo $images[0]?>>
        </div>
        <ul class="image-list">
            <?php
            foreach ($images as $image) {
                if ($image != "") {
                    echo "<li class=\"image-item\"><img src=$image></li>";
                }
            }
            ?>
        </ul>
    </div>
</div>

<div class="col-sm-6">
    <h2><?php echo $name ?></h2>
    <h3>TECHNICAL SPECIFICATIONS</h3>
    <br>
    <br>
    <table class="table">
        <tbody>
        <tr>
            <td>CASE SIZE</td>
            <td><?php echo $caseSize ?></td>
        </tr>
        <tr>
            <td>CASE THICKNESS</td>
            <td><?php echo $caseThickness ?></td>
        </tr>
        <tr>
            <td>GLASS</td>
            <td><?php echo $glass ?></td>
        </tr>
        <tr>
            <td>MOVEMENT</td>
            <td><?php echo $movement ?></td>
        </tr>
        </tbody>
    </table>
    
    <h3 style="position: relative;  display: inline;"><b class="w3-text-red">$<?php echo $price ?></b>
        <h5 style="display: inline">incl. VAT</h5>
    </h3>

    <br>
    <br>

    <?php
        // get current page path from watches.csv
        $pagePath = "";

        // open watches.csv
        $filename = "../watches.csv";
        $file = fopen($filename, "r") or die("Unable to open file!");;
        flock($file, LOCK_SH);
    
        // read the heading
        $headings = fgetcsv($file);

        // read through the lines and store each line as array element
        while ($aLineOfCells = fgetcsv($file)) {
            $tempList[] = $aLineOfCells;
        }
        
        flock($file, LOCK_UN);
        fclose($file);

        // if name in array matches $name, assign path to $pagePath
        foreach ($tempList as $watch) {
            if ($watch[1] === $name) {
                $pagePath = $watch[5];
                break;
            }
        }
    ?>

    <form action="<?php echo $pagePath ?>" method="GET">
        <button name='session-reset' value='Reset the session' onclick="this.form.submit()">Reset the session</button>
        <button class="add-to-cart" name="item" onclick="this.form.submit()" value="<?php echo $name ?>">Add To Cart</button>
    </form>

    <?php
        session_start();
        // initialize session array
        if (empty($_SESSION)) {
            $_SESSION['cart'] = array();
            if (empty($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
        }
        // when user clicks add to cart
        if (isset($_GET['item'])) {
            // add item to cart
            array_push($_SESSION['cart'], $_GET['item']);

            // redirect to page to prevent continuously pushing when refresh page
            header("Location:" . $pagePath);
            exit();
        } else if (isset($_GET['session-reset'])) {
            unset($_SESSION['cart']);
            foreach($_SESSION as $something => &$whatever) {
                unset($whatever);
            }
        }
        
        // preShow($_GET);
        // preShow($_SESSION);
    ?>
    </div>
</div>