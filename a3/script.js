
window.addEventListener('scroll', stickyNavBar);
window.addEventListener('scroll', highlightNavigation);
window.addEventListener('scroll', isScrolling);

var pageScrolling;
function isScrolling() {
    // Clear our timeout throughout the scroll
    window.clearTimeout(pageScrolling);

    // Set a timeout to run after scrolling ends
    pageScrolling = setTimeout(function () {
        // console.log('Scrolling has stopped.');  // debug
        window.addEventListener('scroll', highlightNavigation); // add navigation bar highlighting again when scrolling has stopped
    }, 66);
    // console.log('Scrolling');  // debug
}

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

// Expiry Date Validation

function checkSubmission() {
    var form = document.getElementById('form');
    var expiryMonth = document.getElementById('expiryMonth').value;
    var expiryYear = document.getElementById('expiryYear').value;

    var date = new Date();
    var currentMonth = date.getMonth() + 1; // index starts from 0 so add 1 or else it'll be the month before
    var currentYear = date.getFullYear();

    console.log("expiryMonth: " + expiryMonth);
    console.log("expiryYear: " + expiryYear);
    console.log("currentMonth: " + currentMonth);
    console.log("currentYear: " + currentYear);

    // if expiry date is before current date
    if (expiryMonth <= currentMonth && expiryYear <= currentYear) {
        // Fail validation, show some error message to user
        console.log('fail') // still testing
    }
    else    // otherwise, pass expiry date validation
    {
        console.log('pass') // still testing
    }
}

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
    var today = day.getDay();
    var time = new Date();
    var currentTime = time.getHours();
    if (currentTime = 12 & (today != 6 || today != 0)) {

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

function highlightNavOnClick(id)
{
    var $navigationLinks = $('#navigation_bar > ul > li > a');
    var $navigationLink = sectionIdTonavigationLink[id];

    // if the link is not active
    if (!$navigationLink.hasClass('active')) {
        // remove .active class from all the links
        $navigationLinks.removeClass('active');
        // add .active class to the current link
        $navigationLink.addClass('active');

        window.removeEventListener('scroll', highlightNavigation);
    }
}

// update total price after each selection in Booking section
function countTotal() {
    // prices of each option
    var STA = 20;
    var STP = 15;
    var STC = 12;
    var FTA = 30;
    var FTP = 26;
    var FTC = 22;

    // get the amount of each option and multiply by price
    var countSTA = document.getElementById("seats-STA").value * STA;
    var countSTP = document.getElementById("seats-STP").value * STP;
    var countSTC = document.getElementById("seats-STC").value * STC;
    var countFTA = document.getElementById("seats-FTA").value * FTA;
    var countFTP = document.getElementById("seats-FTP").value * FTC;
    var countFTC = document.getElementById("seats-FTC").value * FTC;

    // add up the total price
    var totalPrice = countSTA + countSTP + countSTC + countFTA + countFTP + countFTC;

    // get the string element and update
    var total = document.getElementById('totalMoney');
    total.innerHTML = totalPrice.toFixed(2);
}