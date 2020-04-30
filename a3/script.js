
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

// Expiry Date Validation
const form = document.getElementById('form');
const expiryMonth = document.getElementById('expiryMonth');
const expiryYear = document.getElementById('expiryYear');

form.addEventListener('submit', ev => {
    ev.preventDefault();

    const month = expiryMonth.value;
    const year = expiryYear.value;

    // Create a date object from month and year, on the first
    // of that month.
    const expiryDate = new Date(year + '-' + month + '-01');

    // You can compare date objects, this says if the expiryDate is
    // less than todays date, i.e. in the past.
    if (expiryDate < new Date()) {
        // Fails validation, show some error message to user
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
