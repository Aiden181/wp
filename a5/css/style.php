<?php
  header("Content-type: text/css");

  $homePageWidth = 1024;
?>

.sidebar a {
  font-family: "Roboto", sans-serif
}
body, h1, h2, h3, h4, h5, h6, .w3-wide {
  font-family: "Montserrat", sans-serif;
}

ul {
  list-style-type: none;
}

#zael-logo {
  width: 120px;
  position: relative;
  left: 30px;
  z-index: 1;
}

.fa {
  color: #1e1e1e;
}

.navigation-bar {
  text-align: left;
}

.navigation-bar li {
  z-index: 1;
}

#icons-container {
  text-align: right;
  position: relative;
  right: 5px;
  bottom: 60px;
}

#search-btn {
  cursor: pointer;
}

.search-box {
  box-sizing: border-box;
  border: 0px solid black;
  border-radius: 0px;
  padding: 0px 0px;
  outline: none;
  color: black;
  transition: all 0.8s ease;
  width: 0px;
  opacity: 0;
}

.search-box-active {
  border: 2px solid black;
  border-radius: 3px;
  padding: 5px 10px;
  width: 250px;
  opacity: 1;
}

::-webkit-input-placeholder {
  color: black;
}

::-moz-input-placeholder {
  color: black;
}

::-ms-input-placeholder {
  color: black;
}

.shopnow-btn-left {
  position: relative;
  top: 300px;
  left: 120px;
}

.shopnow-btn-right {
  position: relative;
  top: 300px;
  left: 660px;
}

#copyright {
  position: relative;
  top: 16px;
  left: 40px;
}

#payment-icons {
  position: relative;
  left: 72%;
  bottom: 8px;
  max-height: 50px;
}

#payment-icons img {
  max-height: 50px;
}

#blankspace {
  height: 150px;
}

.item_categories {
  display: block;
}

/* change cursor icon to pointer when hovered over */
.item_categories_all {
  cursor: pointer;
}

/* format drop down list and hide list as default */
.menu-categories {
  display: none;
  opacity: 0;
  width: 160px;
  position: absolute;
  left: -15px;
  background-color: white;
  z-index: 1;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
}
/* format list items */
.menu-categories li {
  position: relative;
  left: -40px;
  width: 160px;
  padding-bottom: 5px;
  text-align: center;
}

/* format list items */
.menu-categories li:hover {
  background-color: rgb(196, 196, 196);
}
/* add line between each list item */
.menu-categories li:not(:last-child) {
  border-bottom: 1px solid black;
}
/* make text in drop down list black */
.menu-categories li a {
  color: black;
}


/* -------------------------------------- */
/* animated drop down menu for categories */
/* -------------------------------------- */

.hide-menu {
  display: block;
  animation-name: hide-menu;
  animation-duration: 300ms;
  animation-timing-function: ease-in-out;
  animation-fill-mode: forwards;
}

.show-menu {
  display: block;
  animation-name: show-menu;
  animation-duration: 300ms;
  animation-timing-function: ease-in-out;
  animation-fill-mode: forwards;
}

@keyframes hide-menu {
  0% {
    opacity: 1;
    transform: rotateY(0deg);
  }
  100% {
    opacity: 0;
    transform: rotateY(90deg);
  }
}

@keyframes show-menu {
  0% {
    opacity: 0;
    transform: rotateY(-90deg);
  }
  100% {
    opacity: 1;
    transform: rotateY(0deg);
  }
}

/* ------------------------------ */
/* end of animated drop down code */
/* ------------------------------ */ 


#carouselContainer {
  margin: auto;
  max-width: <?php echo $homePageWidth ."px" ?>;
}
.carousel-inner img {
  width: 100%;
  height: 100%;
  position: relative;
  object-fit: cover;
  top: 0;
  left: 0;
}

.home-watch-showcase-container {
  margin: auto;
  max-width: 1280px;
}

.watch-showcase-container {
  margin: auto;
  max-width: <?php echo $homePageWidth ."px" ?>;
}

.upper-footer {
    display: flex;
    flex-wrap: wrap;
    padding: 60px 0 50px;
    border-top: 0px;
    background-color: #1e1e1e;
}

.upper-footer-item {
  padding-right: 50px;
}

.upper-footer a {
  color: white;
  position: relative;
  left: 0px;
}

.upper-footer p {
  color: white;
  position: relative;
  left: 35px;
}

.section-title {
  font-weight:bold;
  color: white;
  position: relative;
  left: 25px;
  padding: 13px;
}

.aboutus-container {
  width: 700px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  font-size: 16px;
  font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;";
}

.aboutus-container h1 {
  text-align: center;
}

.parallax
{
  width: auto;
  min-height: 450px;
  max-height: 850px;
  background: transparent;
}

.parallax-text-container {
  z-index: 2;
  color: white;
  width: 300px;
  text-align: center;
  position: relative;
  top: 260px;
  left: 22%;
}


/* --------------- */
/* Contact Us Page */ 
/* --------------- */
.contact-form > input[type=text],[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

.contact-form > input[type=submit] {
  background-color: #e04b11;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.container {
  border-radius: 5px;
  background-color: #f6f6f6;
  padding: 20px;
}
/* ---------------------- */
/* End Of Contact Us Page */
/* ---------------------- */


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

