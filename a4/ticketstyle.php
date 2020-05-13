<?php
    /*** set the content type header ***/
    /*** Without this header, it wont work ***/
    header("Content-type: text/css");

    include "ticket.php";
?>

* {
    color-adjust: exact;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}

body {
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    font-size: 18px;
}

#cinemax_logo {
    width: 110px;
    height: 110px;
    position: absolute;
    top: -25px;
}

.cardWrap {
    width: 29em;
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
    width: 18em;
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

.ticketInfo {
    position: absolute;
}

.title, .name, .day, .time, .seatGroup {
    text-transform: uppercase;
    font-weight: normal;
}
.title h2, .name h2, .day h2, .time h2, .seatGroup h2 {
    font-size: .9em;
    color: #525252;
    margin: 0;
}
.title span, .name span, .day span, .time span, .seatGroup span {
    font-size: .7em;
    color: #a2aeae;
}

.title {
    margin: 2em 0 0 0;
}

.name, .day {
    margin: .7em 0 0 0;
}

.time {
    margin: .7em 0 0 1em;
}

.day, .time {
    float: left;
}

.popcorn {
    position: relative;
    bottom: 10%;
    left: 30%;
    height: 50%;
    width: 50%
}

.seat {
    text-align: center;
    text-transform: uppercase;
    position: relative;
    bottom: 35%;
}
.seat h3 {
    color: #343A40;
    margin: .9em 0 0 0;
    font-size: 2.3em;
}
.seat span {
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
    position: absolute;
    bottom: 10%;
    left: 15%;
}

.cardHeader {
    background: #343A40;
    float: left;
    position: relative;
    padding: 1em;
    margin-top: 100px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    width: 27em;
    height: 1.43em;
}

.cardBody {
    background: #ecedef;
    float: left;
    position: relative;
    bottom: 100px;
    padding: 1em;
    margin-top: 100px;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    width: 27em;
    height: <?php echo $cardHeight . "px"?>;
}

.cardWrapGroup {
    width: 29em;
    margin: 3em auto;
    color: #fff;
    font-family: sans-serif;
}

.cardBody .title {
    margin: 0 0 0 0;
    float: left;
}

.cardBody .day, .cardBody .time {
    margin: 0 0 0 1em;
    float: left;
}

.cardBody .name {
    margin: 3em 0 0 0;
}

.cardBody .seatGroup {
    margin: .7em 0 0 0;
}

#seatsGroupText {
    font-size: 2em;
}

.barcodeGroup {
    height: 2em;
    width: 0;
    box-shadow: 
    1px 0 0 1px #343434,
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
    position: absolute;
    top: <?php echo $barcodeTopPos . "px"?>;
    right: 100px;
}

#seatGroupText {
    text-transform: capitalize;
}
