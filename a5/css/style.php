<?php
  header("Content-type: text/css");

  $homePageWidth = 1024;
  $homePageHeight = 576;
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
  position: relative;
  top: 35px;
  display: 
}

.fa {
  color: #1e1e1e;
}

#navigation-bar {
  position: relative;
  top: 80px;
  right: 46px;
}

#login-btn {
  position: relative;
  left: 862px;
  bottom: 15px;
}

#cart {
  position: relative;
  left: 880px;
  bottom: 48px;
}

#search-btn {                              
  position: relative;
  left: 820px;
  top: 18px;
  cursor: pointer;
}

.search-box {
  font-family: "Montserrat", sans-serif;
  width: 0px;
  position: absolute;
  top: 80px;
  right: 140px;
  box-sizing: border-box;
  border: 2px solid black;
  border-radius: 3px;
  padding: 5px 10px;
  outline: none;
  color: black;
  transition: all 0.8s ease;
  opacity: 0;
}

.search-box-active {
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
  top: 250px;
  left: 120px;
}

.shopnow-btn-right {
  position: relative;
  top: 250px;
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

.watch-showcase-container {
  margin: auto;
  max-width: <?php echo $homePageWidth ."px" ?>;
}
