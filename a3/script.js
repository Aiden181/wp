
window.addEventListener('scroll', stickyNavBar);
window.addEventListener('scroll', highlightNavigation);
window.addEventListener('scroll', isScrolling);
updateMovieSynopsis();

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

function highlightNavOnClick(id) {
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
    var FCA = 30;
    var FCP = 26;
    var FCC = 22;

    // get the amount of each option and multiply by price
    var countSTA = document.getElementById("seats-STA").value * STA;
    var countSTP = document.getElementById("seats-STP").value * STP;
    var countSTC = document.getElementById("seats-STC").value * STC;
    var countFCA = document.getElementById("seats-FCA").value * FCA;
    var countFCP = document.getElementById("seats-FCP").value * FCP;
    var countFCC = document.getElementById("seats-FCC").value * FCC;

    // add up the total price
    var totalPrice = countSTA + countSTP + countSTC + countFCA + countFCP + countFCC;

    // Discount on Weekdays at 12:00
    var date = new Date();
    var currentDay = date.getDay();
    var currentHour = date.getHours();

    // hour is 12 and not on saturday and sunday
    if (currentHour == 12 && currentDay != 6 && currentDay != 0) {
        totalPrice -= totalPrice * 0.2;
    }

    // get the string element and update
    var total = document.getElementById('totalMoney');
    total.innerHTML = totalPrice.toFixed(2);
}

function updateBookingHeader(e) {
    var movieID;
    var movieTitle;
    var movieDate;
    var movieTime;

    var titleHeader = document.getElementById('movieTitleHeader');
    var dateHeader = document.getElementById('movieDateHeader');
    var timeHeader = document.getElementById('movieTimeHeader');

    // get text of href anchor (in this case it's date and time)
    var dateTimeText = e.innerHTML;

    // split date and time words into array elements
    var dateTimeArray = dateTimeText.split(" - ");

    // assign date to movieDate for header
    movieDate = dateTimeArray[0];

    // assign hour to movieTime
    movieTime = dateTimeArray[1];

    // update movie date form
    document.getElementById('movieDate').value = dateTimeArray[0].toUpperCase();

    // update movie date form
    if (movieTime == "12pm") {
        document.getElementById('movieHour').value = "T12";
    } else if (movieTime == "3pm") {
        document.getElementById('movieHour').value = "T15";
    } else if (movieTime == "6pm") {
        document.getElementById('movieHour').value = "T18";
    } else if (movieTime == "9pm") {
        document.getElementById('movieHour').value = "T21";
    }

    // get movie ID from value
    movieID = e.getAttribute('value');

    // get movie title from ID
    switch (movieID) {
        case "ANM":
            document.getElementById('movieID').value = movieID;
            movieTitle = document.getElementById('ANM').innerText;

            // format header
            titleHeader.innerHTML = movieTitle;
            dateHeader.innerHTML = " - " + movieDate;
            timeHeader.innerHTML = " - " + movieTime;
            break;
        case "ACT":
            document.getElementById('movieID').value = movieID;
            movieTitle = document.getElementById('ACT').innerText;

            // format header
            titleHeader.innerHTML = movieTitle;
            dateHeader.innerHTML = " - " + movieDate;
            timeHeader.innerHTML = " - " + movieTime;
            break;
        case "RMC":
            document.getElementById('movieID').value = movieID;
            movieTitle = document.getElementById('RMC').innerText;

            // format header
            titleHeader.innerHTML = movieTitle;
            dateHeader.innerHTML = " - " + movieDate;
            timeHeader.innerHTML = " - " + movieTime;
            break;
        case "AHF":
            document.getElementById('movieID').value = movieID;
            movieTitle = document.getElementById('AHF').innerText;

            // format header
            titleHeader.innerHTML = movieTitle;
            dateHeader.innerHTML = " - " + movieDate;
            timeHeader.innerHTML = " - " + movieTime;
            break;
    }
}

function checkSubmission(e) {
    // passes all validations
    if (!isMovieSelected() && !isSeatSelected()) {
        document.getElementById('submitErrorMessage').innerHTML = "Please select a movie and its date and time from Synopsis's \"Make a Booking\" section first!";
    }
    else if (isMovieSelected() && !isSeatSelected()) {
        document.getElementById('submitErrorMessage').innerHTML = "Please select at least 1 seat.";
    }
    else if (isValidExpiryDate()) {
        return true;
    }
    e.preventDefault();
    return false;
}

function isValidExpiryDate() {
    // Expiry Date Validation
    var expiryDate = document.getElementById('cust-expiry').value;

    var dateTimeArray = expiryDate.split("-");
    var expiryYear = dateTimeArray[0];
    var expiryMonth = dateTimeArray[1];

    var date = new Date();
    var currentMonth = date.getMonth() + 1; // index starts from 0 so add 1 or else it'll be the month before
    var currentYear = date.getFullYear();

    // if expiry date is before current date
    if ((expiryMonth <= currentMonth && expiryYear <= currentYear) || expiryYear < currentYear) {
        document.getElementById('submitErrorMessage').innerHTML = "Please enter an appropriate expiry date or enter a new card.";
        return false;
    } else {
        document.getElementById('submitErrorMessage').innerHTML = "";
        return true;
    }
}

function isMovieSelected() {
    var formID = document.getElementById('movieID').value;
    var formDate = document.getElementById('movieDate').value
    var formHour = document.getElementById('movieHour').value;

    if (formID == "" || formDate == "" || formHour == "") {
        document.getElementById('submitErrorMessage').innerHTML = "Please select a movie and its date and time from Synopsis's \"Make a Booking\" section first!";
        return false;
    } else {
        // enable seat selecting
        document.getElementById('seats-STA').disabled = false;
        document.getElementById('seats-STP').disabled = false;
        document.getElementById('seats-STC').disabled = false;
        document.getElementById('seats-FCA').disabled = false;
        document.getElementById('seats-FCP').disabled = false;
        document.getElementById('seats-FCC').disabled = false;

        document.getElementById('submitErrorMessage').innerHTML = "";
        return true;
    }
}

function isSeatSelected() {
    var countSTA = document.getElementById("seats-STA").value;
    var countSTP = document.getElementById("seats-STP").value;
    var countSTC = document.getElementById("seats-STC").value;
    var countFCA = document.getElementById("seats-FCA").value;
    var countFCP = document.getElementById("seats-FCP").value;
    var countFCC = document.getElementById("seats-FCC").value;

    if (countSTA == "" && countSTP == "" && countSTC == "" && countFCA == "" && countFCP == "" && countFCC == "") {
        document.getElementById('submitErrorMessage').innerHTML = "Please select at least 1 seat.";
        return false;
    }
    else {
        document.getElementById('cust-name').disabled = false;
        document.getElementById('cust-email').disabled = false;
        document.getElementById('cust-mobile').disabled = false;
        document.getElementById('cust-credit').disabled = false;
        document.getElementById('cust-expiry').disabled = false;
        
        document.getElementById('submitErrorMessage').innerHTML = "";
        return true;
    }
}

function updateMovieSynopsis(id) {
    var ACT = document.getElementById('synopsisACT');
    var ANM = document.getElementById('synopsisANM');
    var RMC = document.getElementById('synopsisRMC');
    var AHF = document.getElementById('synopsisAHF');
    
    ACT.style.display = "block";
    ANM.style.display = "none";
    RMC.style.display = "none";
    AHF.style.display = "none";

    if (id === "ACT") {
        ACT.style.display = "block";
        ANM.style.display = "none";
        RMC.style.display = "none";
        AHF.style.display = "none";
    }
    else if (id === "ANM") {
        ACT.style.display = "none";
        ANM.style.display = "block";
        RMC.style.display = "none";
        AHF.style.display = "none";
    }
    else if (id === "RMC") {
        ACT.style.display = "none";
        ANM.style.display = "none";
        RMC.style.display = "block";
        AHF.style.display = "none";
    }
    else if (id === "AHF") {
        ACT.style.display = "none";
        ANM.style.display = "none";
        RMC.style.display = "none";
        AHF.style.display = "block";
    }
}
