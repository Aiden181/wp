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

h3 {
    display: inline;
}

#addPadding {
    padding-bottom: 50px;
}
