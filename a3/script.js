function checkInputName() {
    var patt = /^[A-Za-z]+$/;
    name = document.getElementById("name").value;
    if (name.match(patt))
        return true;
    else
        alert("Please Enter A Valid Name");
    return false;
}

function checkInputEmail() {
    var patt = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    email = document.getElementById("email").value;
    if (email.match(patt))
        return true;
    else
        alert("Please Enter A Valid Email");
    return false;
}

function checkInputMobile() {
    var patt = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    mobile = document.getElementById("mobile").value;
    if (mobile.match(patt))
        return true;
    else
        alert("Please Enter A Valid Phone Number");
    return false;
}

function checkInputCreditCard() {
    var visa = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
    var master = /^(?:5[1-5][0-9]{14})$/;
    credit = document.getElementById("credit").value;
    if (credit.match(visa) || credit.match(master))
        return true;
    else
        alert("Please Enter A Valid Credit Card");
    return false;
}

