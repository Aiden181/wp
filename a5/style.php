<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");
?>

body, html {
  height: 100%;
}

#cinemax_logo
{
  max-width: 100%;
  height: auto;
}

.carousel-inner img
{
  width: 100%;
  height: 100%;
}
.carousel-item
{
  height: 400px;
} 
.carousel-item img
{
  position: absolute;
  object-fit:cover;
  top: 0;
  left: 0;
  min-height: 400px;
}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #343A40;
  color: white;
  padding: 8px 20px;
  margin: 6px 0;
  border: none;
  cursor: pointer;
  font-size: 15px;
  position: relative;
  left: 66%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  position: relative;
  left: 0%;
}

.loginbtn {
  position: relative;
  left: 0%
}

.rememberMe {
  position: static;
  left: 30%;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.login-container {
  padding: 20px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: relative;
  right: 2%;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

/* Container holding the image and the text */
.cinemax_seats_container
{
  position: relative;
  text-align: center;
  color: white;
}

/* Centered text */
.cinemax_seats_container_centered_text
{
  position: absolute;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Centered text */
.cinemax_seats_container_centered_text2
{
  position: absolute;
  top: 90%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Container holding the image and the text */
.dolby_container
{
  position: relative;
  text-align: center;
  color: white;
}

.buttons
{
  width: 700px;
  table-layout: fixed;
  border-collapse: collapse;
  background-color: aquamarine; 
}
.buttons button
{
  width: 100%;
}

.makeBooking_footer .btn-primary
{
  width: 114px;
  margin: 1px;
}

.resp-container
{
  position: relative;
  overflow: scroll;
}

.parallax
{
  min-height: 500px;
  background: transparent;
}

#navigation_bar
{
  right: 0;
  left: 0;
  height: 55px;
}

#navigation_bar li
{
  margin-right: 100px;
}

/* The sticky class is added to the navbar with JS when it reaches its scroll position */
.sticky
{
  position: fixed;
  top: 0;
  z-index: 999;
}
/* Add some top padding to the page content to prevent sudden quick movement (as the navigation bar gets a new position at the top of the page (position:fixed and top:0) */
.sticky + .content
{
  padding-top: 60px;
}

/* smooth scrolling effect */
html
{
  scroll-behavior: smooth;
}

iframe
{
  border: 0px;
}

body {
  font: 400 15px Lato, sans-serif;
  line-height: 1.5;
}

#bookingcard {
  position: relative;
  left: 22%;
  border: solid black;
  border-width: 1px;
  height: 430px;
  width: 650px;
}

.custInfo {
  position: relative;
  left: 50%;
  bottom: -4%;
}

.custInfo label {
  display: inline-block;
  text-align: right;
  width: 65px;
}

.custInfo label {
  text-align: right;
  width: 120px;
}

.custInfo input {
  width: 180px;
  height: 30px;
}

.bookingLabels {
  position: relative;
  bottom: 38%;
  left: 2%;
  border: solid black;
  border-width: 1px;
  width: 280px;
  height: 130px;
}

.bookingLabels div {
  text-align: right;
  padding-right: 10px;
}

.bookingLabels label {
  text-align: end;
  width: 270px;
}

.bookingLabels select {
  width: 130px;
}

#orderButton {
  border: black solid;
  border-width: 2px;
  background-color: white;
  position: relative;
  width:100px;
  left: 80%;
  bottom: 160px;
}

.expiryTime {
  position: relative;
  left: 85%;
}

.expiryTime label {
  text-align: right;
  width: 120px;
}

.total {
  position: relative;
  bottom: 33%;
  left: 18%;
}

.bookingHeader {
  position: relative;
  left: 2%;
  top: 2%;
}

#standard{
  position: relative;
  left: 3%;
  top: 1%;
}

#firstClass {
  position: relative;
  left: 3%;
  top: 1%;
}

#totalMoney {
  border: dashed black;
  border-width: 1px;
  height: 30px;
  width: 120px;
  position: absolute;
  left: 9%;
  bottom: -40%;
}

.active {
    color: rgb(255, 255, 255);
    border-bottom: 3px solid rgb(255, 255, 255);
}

input:invalid {
  border: 2px solid red;
  background-color: salmon;
}

#totalMoney {
  text-align: center;
  font-size: 18px;
}

#submitErrorMessage {
  position: relative;
  width: 300px;
  left: 26%;
  bottom: 300px;
  color: red;
}

.plotSummaryBody {
  background-color: whitesmoke;
  font-size: 16px;
}

.plotSummary {
  font-size: 25px;
}

#hackingMessage {
  text-align: center;
}
