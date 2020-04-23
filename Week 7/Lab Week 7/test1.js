function plus(whichID) {
    console.log('plus button click');
    var whichQty = document.getElementById(whichID + "-qty");
    var whichSubtotal = document.getElementById(whichID + "-subtotal");
    whichQty.value = Number(whichQty.value) + 1;
    console.log(whichQty.getAttribute("name") + ' quantity is: ' + '//Your Code Here');
    console.log(whichSubtotal.getAttribute("name") + ' is: $' + '//Your Code Here');
}

function minus(whichID) {
    console.log('minus button click');
    var whichQty = document.getElementById(whichID + "-qty");
    var whichSubtotal = document.getElementById(whichID + "-subtotal");
    var price = whichQty.value * 3;
    console.log(whichQty.name + ' quantity is: ' + '//Your Code Here');
    console.log(whichSubtotal.getAttribute("name") + ' is: $' + '//Your Code Here');
}