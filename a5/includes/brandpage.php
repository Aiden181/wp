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
    <!-- note: since Daniel Wellington page is dw, 
    if the brand name is Daniel Wellington, then 
    the page will be dw.php, otherwise, continue like normal -->
    <form action=<?php echo ($brandName === "Daniel Wellington" ? "dw" : $brandName) . ".php" ?> method="GET">
        <select name="orderby" class="sort" onchange="this.form.submit()">
            <option <?php keepSelectFieldAfterSubmit('none'); ?> value="none" selected="selected">Default</option>
            <option <?php keepSelectFieldAfterSubmit('price-asc'); ?> value="price-asc">Price: Low to High</option>
            <option <?php keepSelectFieldAfterSubmit('price-desc'); ?> value="price-desc">Price: High to Low</option>
            <option <?php keepSelectFieldAfterSubmit('name-asc'); ?> value="name-asc">Name: Ascending</option>
            <option <?php keepSelectFieldAfterSubmit('name-desc'); ?> value="name-desc">Name: Descending</option>
        </select>
    </form>
</div>

<br>

<?php
    displayWatches($brandName, isset($_GET['orderby']) ? $_GET['orderby'] : 'none');
?>
