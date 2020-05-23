<!-- Sorting selection -->
<div style="height: 130px; background-color: rgba(210, 210, 210, 1)">
    <div class="container">
        <?php
            $text = "";
            if ($brandName === "sevenfriday") {
                $text = "Seven Friday";
            } else if ($brandName === "movado") {
                $text = "Movado";
            } else {
                $text = $brandName;
            }
            echo "<h1 style=\"text-transform: uppercase\">$text</h1>"
        ?>
    </div>
</div>

<br>

<div class="container">
    <h4 style="position: relative; top: 35px; display: inline">Viewing <?php echo countWatches($brandName) ?> products</h4>

    <!----------------------------- FILTER ----------------------------->
    <!-- since Daniel Wellington page is dw,  if the brand name is 
    Daniel Wellington, then  the page will be dw.php, and if the brand 
    name is MVMT, make the page name undercase to prevent URL not found 
    error,  otherwise, continue like normal -->
    <form action="<?php
     if ($brandName === "Daniel Wellington") {
        echo "dw" . ".php";
    } else if ($brandName === "MVMT") {
        echo "mvmt" . ".php";
    } else {
        echo "$brandName" . ".php";
    }
    ?>" method="GET">
        <select name="orderby" class="sort" onchange="this.form.submit()">
            <option <?php keepSelectFieldAfterSubmit('none'); ?> value="none" selected="selected">Default</option>
            <option <?php keepSelectFieldAfterSubmit('price-asc'); ?> value="price-asc">Price: Low to High</option>
            <option <?php keepSelectFieldAfterSubmit('price-desc'); ?> value="price-desc">Price: High to Low</option>
            <option <?php keepSelectFieldAfterSubmit('name-asc'); ?> value="name-asc">Name: Ascending</option>
            <option <?php keepSelectFieldAfterSubmit('name-desc'); ?> value="name-desc">Name: Descending</option>
        </select>
    </form>
    <!------------------------- END OF FILTER ------------------------->
</div>

<br>

<?php
    // display all watches that match the brand name
    displayWatches($brandName, isset($_GET['orderby']) ? $_GET['orderby'] : 'none');
?>
