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

    <!-- Display filter -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
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
    // display all watches that match the brand name
    displayWatches($brandName, test_input(isset($_POST['orderby']) ? $_POST['orderby'] : 'none'));
?>
