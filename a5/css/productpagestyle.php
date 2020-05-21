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
  display: inline-block;
  background: #3e3e3f;
  color: white;
  border: none;
  border-radius: 0;
  padding: 1.25rem 2.5rem;
  font-size: 1rem;
  text-transform: uppercase;
  cursor: pointer;
  transform: translateZ(0);
  transition: color 0.3s ease;
  letter-spacing: 0.0625rem;
}


/* ------------------- */
/* Product detail Page */
/* ------------------- */
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

  .imageList {
    position: relative;
    right: 40px;
  }

  .image-list {
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

  .image-list-img-border {
    border: 3px solid #E14A09;
    border-radius: 4px;
  }

  .image-list img:hover {
    opacity: 0.7;
  }
}
/* -------------------------- */
/* End of Product detail Page */
/* -------------------------- */
