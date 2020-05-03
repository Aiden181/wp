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

// Expiry Date Validation
const form = document.getElementById('form');
const expiryMonth = document.getElementById('expiryMonth');
const expiryYear = document.getElementById('expiryYear');

form.addEventListener('submit', ev => {
    ev.preventDefault();

    const month = expiryMonth.value;
    const year = expiryYear.value;

    const expiryDate = new Date(year + '-' + month + '-01');

    if (expiryDate < new Date()) {
        console.log('fail')
    } else {
        console.log('pass')
    }
})

function countTotal() {
    var STA = 20;
    var STP = 15;
    var STC = 12;
    var FTA = 30;
    var FTP = 26;
    var FTC = 22;
    var total = document.getElementById("seats-STA").value
    var countSTA = total.value * STA
    var total = document.getElementById("seats-STP").value
    var countSTP = total.value * STP
    var total = document.getElementById("seats-STC").value
    var countSTC = total.value * STC
    var total = document.getElementById("seats-FTA").value
    var countFTA = total.value * FTA
    var total = document.getElementById("seats-FTP").value
    var countFTP = total.value * FTC
    var total = document.getElementById("seats-FTC").value
    var countFTC = total.value * FTC
    var countTotal = countSTA.value + countSTC.value + countSTC.value + countFTA.value + countFTP.value + countFTC.value
}
