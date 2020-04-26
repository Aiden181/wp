function checkInputName() {
    var patt = /^[A-Za-z]+$/;
    name = document.getElementById("cust-name").value;
    if (name.match(patt))
        return true;
    else
        alert("Please Enter A Valid Name");
    return false;
}

function checkInputEmail() {
    var patt = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    email = document.getElementById("cust-email").value;
    if (email.match(patt))
        return true;
    else
        alert("Please Enter A Valid Email");
    return false;
}

function checkInputMobile() {
    var patt = /^([+61|0](2|4|3|7|8|)){0,2}([ 0-9]|[(]){2,3}([)]|[0-9]){6}([ ])[0-9]{7,20}$/;
    mobile = document.getElementById("cust-mobile").value;
    if (mobile.match(patt))
        return true;
    else
        alert("Please Enter A Valid Phone Number");
    return false;
}

function checkInputCreditCard() {
    var card = /[0-9]{14,19}/;
    credit = document.getElementById("cust-credit").value;
    if (credit.match(visa))
        return true;
    else
        alert("Please Enter A Valid Credit Card");
    return false;
}

