
<!-- Sorting selection -->
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

<?php
    displayWatches($brandName, isset($_GET['orderby']) ? $_GET['orderby'] : 'none');
?>
