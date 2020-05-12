<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");
?>

body {
    font-size: 21px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
    -webkit-print-color-adjust:exact;
}

#cinemax_logo {
    width: 50%;
    height: 50%;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.invoice-box {
    border: 2px solid black;
    height: 297mm;
    width: 210mm;
    padding: 30px;
}

.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
    padding-bottom: 20px;
}

.invoice-box table td {
    padding: 2px;
    vertical-align: top;
}

.invoice-box table tr td:nth-child(2) {
    text-align: right;
}

.invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
}

.invoice-box table tr.heading td {
    padding: 7px;
    background: #343A40;
    font-weight: bold;
    color: white;
}

.invoice-box table tr.item td{
    border-bottom: 3px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td:nth-child(2) {
    font-weight: bold;
}

@media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
    }
    
    .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
    }
}

#printTicketbutton {
    background-color: #343A40;
    border: none;
    color: white;
    padding: 15px 15px;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
}