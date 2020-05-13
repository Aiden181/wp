<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");
?>

body {
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    font-size: 18px;
    -webkit-print-color-adjust:exact;
}

.containerGroup {
    border: 1px solid black;
    width: 84mm;
    padding: 10px;
    position: relative;
}

.containerIndividual {
    border: 1px solid black;
    width: 95mm;
    padding: 10px;
    position: relative;
}

#cinemax_logo {
    width: 35%;
    height: 35%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    z-index: -1;
}

.movieTicket {
    text-align: center;
}

.containerGroup h3 {
    display: inline;
}

#addPadding {
    padding-bottom: 50px;
}


.cardWrap {
    width: 27em;
    margin: 3em auto;
    color: #fff;
    font-family: sans-serif;
}

.card {
    background: linear-gradient(to bottom, #343A40 0%, #343A40 26%, #ecedef 26%, #ecedef 100%);
    height: 11em;
    float: left;
    position: relative;
    padding: 1em;
    margin-top: 100px;
}

.cardLeft {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    width: 16em;
}

.cardRight {
    width: 6.5em;
    border-left: .18em dashed #fff;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
}
.cardRight:before, .cardRight::after {
    content: "";
    position: absolute;
    display: block;
    width: .9em;
    height: .9em;
    background: #fff;
    border-radius: 50%;
    left: -.5em;
}
.cardRight::before {
    top: -.4em;
}
.cardRight::after {
    bottom: -.4em;
}

h1 {
    font-size: 1.1em;
    margin-top: 0;
}
h1 span {
    font-weight: normal;
}

.title, .name, .seat, .time {
    text-transform: uppercase;
    font-weight: normal;
}
.title h2, .name h2, .seat h2, .time h2 {
    font-size: .9em;
    color: #525252;
    margin: 0;
}
.title span, .name span, .seat span, .time span {
    font-size: .7em;
    color: #a2aeae;
}

.title {
    margin: 2em 0 0 0;
}

.name, .seat {
    margin: .7em 0 0 0;
}

.time {
    margin: .7em 0 0 1em;
}

.seat, .time {
    float: left;
}

.popcorn {
    position: relative;
    bottom: 10%;
    left: 25%;
    height: 50%;
    width: 50%
}

.number {
    text-align: center;
    text-transform: uppercase;
    position: relative;
    bottom: 35%;
}
.number h3 {
    color: #343A40;
    margin: .9em 0 0 0;
    font-size: 2.5em;
}
.number span {
    display: block;
    color: #a2aeae;
}

.barcode {
    height: 2em;
    width: 0;
    margin: 1.2em 0 0 .8em;
    box-shadow: 1px 0 0 1px #343434,
    5px 0 0 1px #343434,
    10px 0 0 1px #343434,
    11px 0 0 1px #343434,
    15px 0 0 1px #343434,
    18px 0 0 1px #343434,
    22px 0 0 1px #343434,
    23px 0 0 1px #343434,
    26px 0 0 1px #343434,
    30px 0 0 1px #343434,
    35px 0 0 1px #343434,
    37px 0 0 1px #343434,
    41px 0 0 1px #343434,
    44px 0 0 1px #343434,
    47px 0 0 1px #343434,
    51px 0 0 1px #343434,
    56px 0 0 1px #343434,
    59px 0 0 1px #343434,
    64px 0 0 1px #343434,
    68px 0 0 1px #343434,
    72px 0 0 1px #343434,
    74px 0 0 1px #343434,
    77px 0 0 1px #343434,
    81px 0 0 1px #343434;
    position: relative;
    bottom: 35%;
    left: 4%;
}