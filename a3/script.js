
// When the user scrolls the page, execute myFunction
window.onscroll = function () {
    stickyNavBar(),
        highlightNavigation();
};

// Get the navbar and cinemax logo on top
var cinemaxLogo = document.getElementById("cinemax_logo");
var navBar = document.getElementById("navigation_bar");

// Get the offset position of the navbar and cinemax logo on top
var cinemaxLogoHeight = cinemaxLogo.offsetHeight;
var sticky = navBar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyNavBar() {
    if (window.pageYOffset >= sticky + cinemaxLogo.offsetHeight) {
        navBar.classList.add("sticky");
    } else {
        navBar.classList.remove("sticky");
    }
}

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

// form.addEventListener('submit', ev => {
//     ev.preventDefault();

//     const month = expiryMonth.value;
//     const year = expiryYear.value;

//     const expiryDate = new Date(year + '-' + month + '-01');

//     if (expiryDate < new Date()) {
//         console.log('fail')
//     } else {
//         console.log('pass')
//     }
// })

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

// Discount in Weekdays at 12:00
function discountPrice() {
    var day = new Date();
    var today = today.getDay();
    var time = new Date();
    var currentTime = time.getHours();
    if (time = 12 & (today != 6 || today != 0)) {

    }
}

// cache the navigation links 
var $navigationLinks = $('#navigation_bar > ul > li > a');
// cache (in reversed order) the sections
var $sections = $($(".section").get().reverse());

// map each section id to their corresponding navigation link
var sectionIdTonavigationLink = {};
$sections.each(function () {
    var id = $(this).attr('id');
    sectionIdTonavigationLink[id] = $('#navigation_bar > ul > li > a[href=#' + id + ']');
});

function highlightNavigation() {
    // get the current vertical position of the scroll bar
    var scrollPosition = $(window).scrollTop();

    // iterate the sections
    $sections.each(function () {
        var currentSection = $(this);
        // get the position of the section
        var sectionTop = currentSection.offset().top;

        // if the user has scrolled over the top of the section (- 80 navigation bar height (beccause of sticky nav bar) and some offset)  
        if (scrollPosition >= sectionTop - 80) {
            // get the section id
            var id = currentSection.attr('id');
            // get the corresponding navigation link
            var $navigationLink = sectionIdTonavigationLink[id];

            // if the link is not active
            if (!$navigationLink.hasClass('active')) {
                // remove .active class from all the links
                $navigationLinks.removeClass('active');
                // add .active class to the current link
                $navigationLink.addClass('active');
            }
            // we have found our section, so we return false to exit the each loop
            return false;
        }
        else {
            // get the section id
            var id = currentSection.attr('id');
            // get the corresponding navigation link
            var $navigationLink = sectionIdTonavigationLink[id];

            // if the link is active
            if ($navigationLink.hasClass('active')) {
                // remove .active class from all the links
                $navigationLinks.removeClass('active');
            }
        }
    });
}
