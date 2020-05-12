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
    height: 95mm;
    width: 80mm;
    padding: 10px;
    position: relative;
}

.containerIndividual {
    border: 1px solid black;
    height: 60mm;
    width: 80mm;
    padding: 10px;
    position: relative;
}

#cinemax_logo_group {
    width: 35%;
    height: 35%;
    position: absolute;
    bottom: -38px;
    right: 105px;
    z-index: -1;
}

#cinemax_logo_individual {
    width: 35%;
    height: 35%;
    position: absolute;
    bottom: -15px;
    right: 105px;
    z-index: -1;
}

.movieTicket {
    text-align: center;
}

h3 {
    display: inline;
}

span {
    display: block;
}