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

function selectionSTA() {
    var selector = document.getElementById('seats[STA]');
    var value = selector[selector.selectedIndex].value;
    var STA = 20;
    var STAmoney = value * STA;
}

function selectionSTP() {
    var selector = document.getElementById('seats[STP]');
    var value = selector[selector.selectedIndex].value;
    var STP = 15;
    var STPmoney = value * STP;
}

function selectionSTC() {
    var selector = document.getElementById('seats[STC]');
    var value = selector[selector.selectedIndex].value;
    var STC = 12;
    var STCmoney = value * STC;
}

function selectionFTA() {
    var selector = document.getElementById('seats[FTA]');
    var value = selector[selector.selectedIndex].value;
    var FTA = 30;
    var FTAmoney = value * FTA;
}

function selectionFTP() {
    var selector = document.getElementById('seats[FTP]');
    var value = selector[selector.selectedIndex].value;
    var FTP = 26;
    var FTPmoney = value * FTP;
}

function selectionFTC() {
    var selector = document.getElementById('seats[FTC]');
    var value = selector[selector.selectedIndex].value;
    var FTC = 22;
    var FTCmoney = value * FTC;
}

selectionSTA();
selectionSTP();
selectionSTC();
selectionFTA();
selectionFTP();
selectionFTC();
document.write(STAmoney + STCmoney + STPmoney + FTAmoney + FTPmoney + FTCmoney);