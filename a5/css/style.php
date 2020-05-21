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
  width: 500px;
  position: relative;
  right: 300px;
  z-index: 1;
}

#icons-container {
  text-align: center;
  position: relative;
  left: 500px;
  bottom: 60px;
  height: 40px;
}

#login-btn {
  position: relative;
  bottom: 33px;
  left: 11px;
}

#cart {
  position: relative;
  bottom: 33px;
  left: 20px;
}

#search-btn {
  position: relative;
  left: 1213px;
  width: 34px;
  cursor: pointer;
}

.search-box {
  text-align: center;
  font-family: "Montserrat", sans-serif;
  position: absolute;
  top: -5px;
  right: 35px;
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

/*Shopping Cart*/
@import "compass/css3";
 @import url(https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Montserrat:400,700);
 @import "compass/reset";
 * {
	 box-sizing: border-box;
}
 
 img {
	 max-width: 100%;
}
 .cf:before, .cf:after {
	 content: " ";
	 display: table;
}
 .cf:after {
	 clear: both;
}
 .cf {
	 *zoom: 1;
}
 .wrap {
	 width: 75%;
	 max-width: 960px;
	 margin: 0 auto;
	 padding: 5% 0;
	 margin-bottom: 5em;
}
 .shoppingcart {
	 font-family: 'Montserrat', sans-serif;
	 font-weight: bold;
	 text-align: center;
	 font-size: 2em;
	 padding: 1em 0;
	 border-bottom: 1px solid #dadada;
	 letter-spacing: 3px;
	 text-transform: uppercase;
}
 .shoppingcart span {
	 font-family: 'Droid Serif', serif;
	 font-weight: normal;
	 font-style: italic;
	 text-transform: lowercase;
	 color: #777;
}
 .heading {
	 padding: 1em 0;
	 border-bottom: 1px solid #d0d0d0;
}
 .heading h1 {
	 font-family: 'Droid Serif', serif;
	 font-size: 2em;
	 float: left;
}
 .heading a.continue:link, .heading a.continue:visited {
	 text-decoration: none;
	 font-family: 'Montserrat', sans-serif;
	 letter-spacing: -0.015em;
	 font-size: 0.75em;
	 padding: 1em;
	 color: #fff;
	 background: #e04b11;
	 font-weight: bold;
	 border-radius: 50px;
	 float: right;
	 text-align: right;
	 -webkit-transition: all 0.25s linear;
	 -moz-transition: all 0.25s linear;
	 -ms-transition: all 0.25s linear;
	 -o-transition: all 0.25s linear;
	 transition: all 0.25s linear;
}
 .heading a.continue:after {
	 content: "\276f";
	 padding: 0.5em;
	 position: relative;
	 right: 0;
	 -webkit-transition: all 0.15s linear;
	 -moz-transition: all 0.15s linear;
	 -ms-transition: all 0.15s linear;
	 -o-transition: all 0.15s linear;
	 transition: all 0.15s linear;
}
 .heading a.continue:hover, .heading a.continue:focus, .heading a.continue:active {
	 background: #f69679;
}
 .heading a.continue:hover:after, .heading a.continue:focus:after, .heading a.continue:active:after {
	 right: -10px;
}
 .tableHead {
	 display: table;
	 width: 100%;
	 font-family: 'Montserrat', sans-serif;
	 font-size: 0.75em;
}
 .tableHead li {
	 display: table-cell;
	 padding: 1em 0;
	 text-align: center;
}
 .tableHead li.prodHeader {
	 text-align: left;
}
 .cart {
	 padding: 1em 0;
}
 .cart .items {
	 display: block;
	 width: 100%;
	 vertical-align: middle;
	 padding: 1.5em;
	 border-bottom: 1px solid #fafafa;
}
 .cart .items.even {
	 background: #fafafa;
}
 .cart .items .infoWrap {
	 display: table;
	 width: 100%;
}
 .cart .items .cartSection {
	 display: table-cell;
	 vertical-align: middle;
}
 .cart .items .cartSection .itemNumber {
	 font-size: 0.75em;
	 color: #777;
	 margin-bottom: 0.5em;
}
 .cart .items .cartSection h3 {
	 font-size: 1em;
	 font-family: 'Montserrat', sans-serif;
	 font-weight: bold;
	 text-transform: uppercase;
	 letter-spacing: 0.025em;
}
 .cart .items .cartSection p {
	 display: inline-block;
	 font-size: 0.85em;
	 color: #777;
	 font-family: 'Montserrat', sans-serif;
}
 .cart .items .cartSection p .quantity {
	 font-weight: bold;
	 color: #333;
}
 .cart .items .cartSection p.stockStatus {
	 color: #82ca9c;
	 font-weight: bold;
	 padding: 0.5em 0 0 1em;
	 text-transform: uppercase;
}
 .cart .items .cartSection p.stockStatus.out {
	 color: #f69679;
}
 .cart .items .cartSection .itemImg {
	 width: 4em;
	 float: left;
}
 .cart .items .cartSection.qtyWrap, .cart .items .cartSection.prodTotal {
	 text-align: center;
}
 .cart .items .cartSection.qtyWrap p, .cart .items .cartSection.prodTotal p {
	 font-weight: bold;
	 font-size: 1.25em;
}
 .cart .items .cartSection input.qty {
	 width: 2em;
	 text-align: center;
	 font-size: 1em;
	 padding: 0.25em;
	 margin: 1em 0.5em 0 0;
}
 .cart .items .cartSection .itemImg {
	 width: 8em;
	 display: inline;
	 padding-right: 1em;
}

 a.remove {
	 text-decoration: none;
	 font-family: 'Montserrat', sans-serif;
	 color: #fff;
	 font-weight: bold;
	 background: #e0e0e0;
	 padding: 0.5em;
	 font-size: 0.75em;
	 display: inline-block;
	 border-radius: 100%;
	 line-height: 0.85;
	 -webkit-transition: all 0.25s linear;
	 -moz-transition: all 0.25s linear;
	 -ms-transition: all 0.25s linear;
	 -o-transition: all 0.25s linear;
	 transition: all 0.25s linear;
}

 .btn:link, .btn:visited {
	 text-decoration: none;
	 font-family: 'Montserrat', sans-serif;
	 letter-spacing: -0.015em;
	 font-size: 1em;
	 padding: 1em 3em;
	 color: #fff;
	 background: #e04b11;
	 font-weight: bold;
	 border-radius: 50px;
	 float: right;
	 text-align: right;
	 -webkit-transition: all 0.25s linear;
	 -moz-transition: all 0.25s linear;
	 -ms-transition: all 0.25s linear;
	 -o-transition: all 0.25s linear;
	 transition: all 0.25s linear;
}
 .btn:after {
	 content: "\276f";
	 padding: 0.5em;
	 position: relative;
	 right: 0;
	 -webkit-transition: all 0.15s linear;
	 -moz-transition: all 0.15s linear;
	 -ms-transition: all 0.15s linear;
	 -o-transition: all 0.15s linear;
	 transition: all 0.15s linear;
}
 .btn:hover, .btn:focus, .btn:active {
	 background: #f69679;
}
 .btn:hover:after, .btn:focus:after, .btn:active:after {
	 right: -10px;
}

/* TOTAL AND CHECKOUT */
 .subtotal {
	 float: right;
	 width: 35%;
}
 .subtotal .totalRow {
	 padding: 0.5em;
	 text-align: right;
}
 .subtotal .totalRow.final {
	 font-size: 1.25em;
	 font-weight: bold;
}
 .subtotal .totalRow span {
	 display: inline-block;
	 padding: 0 0 0 1em;
	 text-align: right;
}
 .subtotal .totalRow .label {
	 font-family: 'Montserrat', sans-serif;
	 font-size: 0.85em;
	 text-transform: uppercase;
	 color: #777;
}
 .subtotal .totalRow .value {
	 letter-spacing: -0.025em;
	 width: 35%;
}
 @media only screen and (max-width: 39.375em) {
	 .wrap {
		 width: 98%;
		 padding: 2% 0;
	}
	 .projTitle {
		 font-size: 1.5em;
		 padding: 10% 5%;
	}
	 .heading {
		 padding: 1em;
		 font-size: 90%;
	}
	 .cart .items .cartSection {
		 width: 90%;
		 display: block;
		 float: left;
	}
	 .cart .items .cartSection.qtyWrap {
		 width: 10%;
		 text-align: center;
		 padding: 0.5em 0;
		 float: right;
	}
	 .cart .items .cartSection.qtyWrap:before {
		 content: "QTY";
		 display: block;
		 font-family: 'Montserrat', sans-serif;
		 padding: 0.25em;
		 font-size: 0.75em;
	}
	 .cart .items .cartSection.prodTotal, .cart .items .cartSection.removeWrap {
		 display: none;
	}
	 .cart .items .cartSection .itemImg {
		 width: 25%;
	}
	 .promoCode, .subtotal {
		 width: 100%;
	}
	 a.btn.continue {
		 width: 100%;
		 text-align: center;
	}
}
 
 
/* End Of Shopping Cart */ 