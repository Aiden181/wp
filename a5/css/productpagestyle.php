<?php
  header("Content-type: text/css");
?>

body {
  font-family: 'Pontano Sans', sans-serif;
  font-size: 1.125rem;
  line-height: 1.5;
  margin: 0;
  padding: 0;
  color: black;
  text-rendering: optimizeLegibility;
}

.add-to-cart {
  position: relative;
  display: block;
  background: #E14A09;
  color: white;
  border: none;
  padding: 1.25rem 2.5rem;
  font-size: 1.5rem;
  text-transform: uppercase;
  cursor: pointer;
  transition: background-color 0.3s ease;
  letter-spacing: 0.0625rem;
}

/* make button slightly darker when hovering mouse over */
.add-to-cart:hover {
  background-color: #BC3A07;
}

.product-image {
  display: none;
}

@media (min-width: 50px) {
  .product-image img, .image-list img {
    width: 100%;
  }

  .product-image {
    display: block;
    background-color: white;
  }

  .image-list {
    position: relative;
    right: 40px;
    display: flex;
  }

  .image-list li {
    margin: 1rem 1rem 0 0;
    background-color: white;
  }

  .image-list img {
    height: 100px;
    width: 100px;
    transition: opacity 0.3s ease;
    cursor: pointer;
  }

  /* for javascript attach border when selected */
  .image-list-img-border {
    border: 3px solid #E14A09;
    border-radius: 4px;
  }
  
  /* make image slightly transparent when hovering mouse over */
  .image-list img:hover {
    opacity: 0.7;
  }
}

.container {
  border-radius: 5px;
  background-color: #f6f6f6;
  padding: 20px;
}

/*Product Quantity Box */
.qtySelector{
	border: 1px solid #ddd;
	width: 107px;
	height: 35px;
	margin: 10px auto 0;
}
.qtySelector .fa{
	padding: 10px 5px;
	width: 35px;
	height: 100%;
	float: left;
	cursor: pointer;
}
.qtySelector .fa.clicked{
	font-size: 12px;
	padding: 12px 5px;
}
.qtySelector .fa-minus{
	border-right: 1px solid #ddd;
}
.qtySelector .fa-plus{
	border-left: 1px solid #ddd;
}
.qtySelector .qtyValue{
	border: none;
	padding: 5px;
	width: 35px;
	height: 100%;
	float: left;
	text-align: center
}
