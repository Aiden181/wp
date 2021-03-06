<?php include 'tools.php'?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Assignment 4</title>

  <!--Bootstrap 4-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.php">
  <link rel="stylesheet" href="https://fonts.google.com/specimen/Comic+Neue">

  <script src='../wireframe.js'></script>

  <!-- Parallax.js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>

</head>

<body>
  <!--Jumbotron-->
  <div class="container">
    <div class="header">
      <img id="cinemax_logo" src="cinemax-logo-white_filled__02-10-17.svg"
        alt="Cinemax logo" width="300">

      <div id="movieSlide" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#movieSlide" data-slide-to="0" class="active"></li>
          <li data-target="#movieSlide" data-slide-to="1"></li>
          <li data-target="#movieSlide" data-slide-to="2"></li>
          <li data-target="#movieSlide" data-slide-to="3"></li>
        </ul>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="endgame-banner.jpg" alt="Avengers:Endgame Banner">
            <div class="carousel-caption">
              <h3>Avengers:Endgame</h3>
              <p>The long awaited sequel is now here!</p>
            </div>
          </div>

          <div class="carousel-item">
            <img src="dumbo-banner.jpg" alt="Dumbo Banner">
            <div class="carousel-caption">
              <h3>Dumbo</h3>
              <p>Get amazed by the one of a kind flying elephant!</p>
            </div>
          </div>

          <div class="carousel-item">
            <img src="topendwedding-banner.jpg" alt="Top End Wedding Banner">
            <div class="carousel-caption">
              <h3>Top End Wedding</h3>
              <p>Join in on this hilarious marriage story of Ned and Lauren!</p>
            </div>
          </div>

          <div class="carousel-item">
            <img src="thehappyprince-banner.jpg" alt="The Happy Prince Banner">
            <div class="carousel-caption">
              <h3>The Happy Prince</h3>
              <p>Get immersed in this movie's spectacular story!</p>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#movieSlide" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#movieSlide" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>

    <div class="nav-wrapper" style="height:80px;">
      <nav id="navigation_bar" class="navbar container navbar-expand-sm bg-dark navbar-dark justify-content-center">
        <ul class="navbar-nav" id="mainNav">
          <li><a class="nav-link" href="#aboutus" onclick="highlightNavOnClick('aboutus')">About Us</a></li>
          <li><a class="nav-link" href="#prices" onclick="highlightNavOnClick('prices')">Prices</a></li>
          <li><a class="nav-link" href="#nowshowing" onclick="highlightNavOnClick('nowshowing')">Now Showing</a></li>
          <li><a class="nav-link" href="#synopsisarea" onclick="highlightNavOnClick('synopsisarea')">Synopsis Area</a></li>
          <li><a class="nav-link" href="#bookingarea" onclick="highlightNavOnClick('bookingarea')">Booking</a></li>
        </ul>
      </nav>
    </div>

    <br>

    <div class="content">
      <main>
        <!--About Us Section-->
        <section id="aboutus" class="section">
          <h2>About Us</h2>
          <div>Cinemax is a one of a kind modern cinema viewing experience which aims to provide full immersion for our
            customers. Therefore, we called for a revamp and after a long awaited period of extensive improvements and
            renovations, Cinemax now has:
          </div>
          <div class="cinemax_seats_container">
            <div class="parallax" data-parallax="scroll" data-image-src="cinemax-seats-2.jpg"></div>
            <h3 class="cinemax_seats_container_centered_text">Reclinable First Class Seats</h3>
            <h5 class="cinemax_seats_container_centered_text2">Along With New Standard Seats</h5>
          </div>
          <br>
          <div class="dolby_container">
            <img src="dolby-atmos.jpg" alt="Dolby Atmos" style="width:69%;">
            <img src="dolby-3d.jpg" alt="Dolby Atmos" style="width:30%;">
          </div>
        </section>

        <br>

        <!--Prices Section-->
        <section id="prices" class="section">
          <h2>Prices</h2>
          <table class="table table-bordered table-striped table-hover parallax-price">
            <thead class="thead-dark">
              <tr>
                <th>Seat Type</th>
                <th>Seat Code</th>
                <th>All day Monday and Wednesday AND 12pm on Weekdays</th>
                <th>All other times</th>
              </tr>
              <tr>
                <td>Standard Adult</td>
                <td>STA</td>
                <td>14:00</td>
                <td>19:50</td>
              </tr>
              <tr>
                <td>Standard Concession</td>
                <td>STP</td>
                <td>12:50</td>
                <td>17:50</td>
              </tr>
              <tr>
                <td>Standard Child</td>
                <td>STC</td>
                <td>11:00</td>
                <td>15:30</td>
              </tr>
              <tr>
                <td>First Class Adult</td>
                <td>FCA</td>
                <td>22:00</td>
                <td>20:00</td>
              </tr>
              <tr>
                <td>First Class Concession</td>
                <td>FCP</td>
                <td>22:50</td>
                <td>23:00</td>
              </tr>
              <tr>
                <td>First Class Child</td>
                <td>SCC</td>
                <td>21:00</td>
                <td>00:00</td>
              </tr>
            </thead>
          </table>
        </section>
        <br>

        <!--NowShowing Section-->
        <section id="nowshowing" class="section">
          <h2>Now Showing</h2>
          <div class="row">
            <div class="col-sm-6">
              <div class="card" id="moviePanelACT" style="width:550px">
                <img class="card-img-top" src="endgame.jpg" alt="Card image" width="550" height="700">
                <div class="card-body">
                  <h4 class="card-title">Avengers: EndGame</h4>
                  <p class="card-text">Mon - ...</p>
                  <p class="card-text">Tue - ...</p>
                  <p class="card-text">Wed - 9pm</p>
                  <p class="card-text">Thur - 9pm</p>
                  <p class="card-text">Fri - 9pm</p>
                  <p class="card-text">Sat - 6pm</p>
                  <p class="card-text">Sun - 6pm</p>
                  <a href="#synopsisACT" class="btn btn-primary stop-video" onclick="updateMovieSynopsis('ACT')">More Details</a>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="card" id="moviePanelANM" style="width:550px">
                <img class="card-img-top" src="dumbo.jpg" alt="Card image" width="550" height="700">
                <div class="card-body">
                  <h4 class="card-title">Dumbo</h4>
                  <p class="card-text">Mon - 12pm</p>
                  <p class="card-text">Tue - 12pm</p>
                  <p class="card-text">Wed - 6pm</p>
                  <p class="card-text">Thur - 6pm</p>
                  <p class="card-text">Fri - 6pm</p>
                  <p class="card-text">Sat - 12pm</p>
                  <p class="card-text">Sun - 12pm</p>
                  <a href="#synopsisANM" class="btn btn-primary stop-video" onclick="updateMovieSynopsis('ANM')">More Details</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="card" id="moviePanelRMC" style="width:550px">
                <img class="card-img-top" src="topendwedding.jpg" alt="Card image" width="550" height="700">
                <div class="card-body">
                  <h4 class="card-title">Top End Wedding</h4>
                  <p class="card-text">Mon - 6pm</p>
                  <p class="card-text">Tue - 6pm</p>
                  <p class="card-text">Wed - ...</p>
                  <p class="card-text">Thur - ...</p>
                  <p class="card-text">Fri - ...</p>
                  <p class="card-text">Sat - 3pm</p>
                  <p class="card-text">Sun - 3pm</p>
                  <a href="#synopsisRMC" class="btn btn-primary stop-video" onclick="updateMovieSynopsis('RMC')">More Details</a>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="card" id="moviePanelAHF" style="width:550px">
                <img class="card-img-top" src="thehappyprince.jpg" alt="Card image" width="550" height="700">
                <div class="card-body">
                  <h4 class="card-title">The Happy Prince</h4>
                  <p class="card-text">Mon - ...</p>
                  <p class="card-text">Tue - ...</p>
                  <p class="card-text">Wed - 12pm</p>
                  <p class="card-text">Thur - 12pm</p>
                  <p class="card-text">Fri - 12pm</p>
                  <p class="card-text">Sat - 9pm</p>
                  <p class="card-text">Sun - 9pm</p>
                  <a href="#synopsisAHF" class="btn btn-primary stop-video" onclick="updateMovieSynopsis('AHF')">More Details</a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <br>

        <!--Synopsis Section-->
        <section id="synopsisarea" class="section">
          <h2>Synopsis</h2>
          <div class="row">
            <div class="col-sm-12">
              <div class="card" id="synopsisACT">
                <div class="card-header">
                  <h4 id="ACT"><b>Avengers: EndGame</b></h4>
                </div>
                <div class="card-body">
                  <div class="resp-container">
                    <iframe width="1045" height="800" class="youtube-video" id="ACT_trailer" src="https://www.youtube.com/embed/TcMBFSGVi1c?enablejsapi=1&version=3&playerapiid=ytplayer"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                  <h5 class="plotSummary"><b>Plot Summary</b></h5>
                  <p class="plotSummaryBody">
                    Avengers: Endgame picks up after the events of Avengers: Infinity War, which saw the Avengers divided
                    and defeated. Thanos won the day and used the Infinity Stones to snap away half of all life in the
                    universe. Only the original Avengers - Iron Man, Captain America, Thor, Hulk, Black Widow, and Hawkeye
                    remain, along with some key allies like War Machine, Ant-Man, Rocket Raccoon, Nebula, and Captain
                    Marvel. Each of the survivors deals with the fallout from Thanos' decimation in different ways, but
                    when an opportunity presents itself to potentially save those who vanished, they all come together and
                    set out to defeat Thanos, once and for all.
                  </p>
                </div>
                <div class="card-footer">
                  <div class="container">
                    <div>Make A Booking:</div>
                    <div class="makeBooking_footer">
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ACT"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Wed - 9pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ACT"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Thur - 9pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ACT"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Fri - 9pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ACT"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Sat - 6pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ACT"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Sun - 6pm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card" id="synopsisANM">
                <div class="card-header">
                  <h4 id="ANM"><b>Dumbo</b></h4>
                </div>
                <div class="card-body">
                  <div class="resp-container">
                    <iframe width="1045" height="800" class="youtube-video" id="ANM_trailer" src="https://www.youtube.com/embed/7NiYVoqBt-8?enablejsapi=1&version=3&playerapiid=ytplayer"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                  <h5 class="plotSummary"><b>Plot Summary</b></h5>
                  <p class="plotSummaryBody">
                    Struggling circus owner Max Medici enlists former star Holt Farrier and his children Milly and Joe to
                    care for Dumbo, a baby elephant whose oversized ears make him the circus' laughing stock. But when
                    they discover that Dumbo can fly, the circus makes an incredible comeback, attracting persuasive
                    entrepreneur V.A. Vandevere, who recruits Dumbo for his newest, larger-than-life entertainment
                    venture, Dreamland. Dumbo soars to new heights alongside a charming and spectacular aerial artist,
                    Colette Marchant, until Holt learns that Dreamland hides dark secrets beneath its shiny veneer.
                  </p>
                </div>
                <div class="card-footer">
                  <div class="container">
                    <div>Make A Booking:</div>
                    <div class="makeBooking_footer">
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ANM"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Mon - 12pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ANM"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Tue - 12pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ANM"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Wed - 6pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ANM"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Thur - 6pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ANM"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Fri - 6pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ANM"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Sat - 12pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="ANM"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Sun - 12pm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card" id="synopsisRMC">
                <div class="card-header">
                  <h4 id="RMC"><b>Top End Wedding</b></h4>
                </div>
                <div class="card-body">
                  <div class="resp-container">
                    <iframe width="1045" height="800" class="youtube-video" id="RMC_trailer" src="https://www.youtube.com/embed/uoDBvGF9pPU?enablejsapi=1&version=3&playerapiid=ytplayer"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                  <h5 class="plotSummary"><b>Plot Summary</b></h5>
                  <p class="plotSummaryBody">
                    Lauren and Ned are engaged, they are in love, and they have just ten days to find Lauren's mother who
                    has gone AWOL somewhere in the remote far north of Australia, reunite her parents and pull off their
                    dream wedding.
                  </p>
                </div>
                <div class="card-footer">
                  <div class="container">
                    <div>Make A Booking:</div>
                    <div class="makeBooking_footer">
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="RMC"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Mon - 6pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="RMC"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Tue - 6pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="RMC"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Sat - 3pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="RMC"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Sun - 3pm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card" id="synopsisAHF">
                <div class="card-header">
                  <h4 id="AHF"><b>The Happy Prince</b></h4>
                </div>
                <div class="card-body">
                  <div class="resp-container">
                    <iframe width="1045" height="800" class="youtube-video" id="AHF_trailer" src="https://www.youtube.com/embed/tXANCJQkUIE?enablejsapi=1&version=3&playerapiid=ytplayer"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                  <h5 class="plotSummary"><b>Plot Summary</b></h5>
                  <p class="plotSummaryBody">
                    In a cheap Parisian hotel room Oscar Wilde lies on his death bed. The past floods back, taking him to
                    other times and places. Was he once the most famous man in London? The artist crucified by a society
                    that once worshipped him? Under the microscope of death he reviews the failed attempt to reconcile
                    with his long suffering wife Constance, the ensuing reprisal of his fatal love affair with Lord Alfred
                    Douglas and the warmth and devotion of Robbie Ross, who tried and failed to save him from himself.
                    Travelling through Wilde's final act and journeys through England, France and Italy, the transience of
                    lust is laid bare and the true riches of love are revealed. It is a portrait of the dark side of a
                    genius who lived and died for love.
                  </p>
                </div>
                <div class="card-footer">
                  <div class="container">
                    <div>Make A Booking:</div>
                    <div class="makeBooking_footer">
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="AHF"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Wed - 12pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="AHF"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Thur - 12pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="AHF"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Fri - 12pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="AHF"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Sat - 9pm</a>
                      <a href="#bookingarea" class="btn btn-primary bookingButton" data-movie-id="AHF"
                        onclick="updateBookingHeader(this);highlightNavOnClick('bookingarea');isMovieSelected()">Sun - 9pm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <br>

        <!--Booking Section-->
        <section id="bookingarea" class="section">
          <h2>Booking</h2>
          <div class="row">
            <div class="col-sm-12">
              <div id="bookingcard" class="card">
                <div class="bookingHeader">
                  <label id="movieTitleHeader" style="font-size:20px"><b>Movie Title</b></label>
                  <label id="movieDateHeader" style="font-size:20px"><b> - Day</b></label>
                  <label id="movieTimeHeader" style="font-size:20px"><b> - Time</b></label>
                </div>
                <form method="POST" action="index.php" onsubmit="checkSubmission(event)">
                  <!--Ask for name-->
                  <div class="custInfo">
                    <input id="movieID" name="movie[id]" type="hidden">
                    <input id="movieDate" name="movie[day]" type="hidden">
                    <input id="movieHour" name="movie[hour]" type="hidden">

                    <label for="cust-name"><b>Name</b></label>
                    <input disabled type="text" name="cust[name]" id="cust-name" value="<?php if (isset($_POST['cust']['name'])) {echo $_POST['cust']['name'];} ?>" pattern="^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*" required>

                    <br>
                    <!--Ask for email-->
                    <label for="cust-email"><b>Email</b></label>
                    <input disabled type="email" name="cust[email]" id="cust-email" value="<?php if (isset($_POST['cust']['email'])) {echo $_POST['cust']['email'];} ?>" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required>

                    <br>
                    <!--Ask for mobile phone input-->
                    <label for="cust-mobile"><b>Mobile</b></label>
                    <input disabled type="tel" name="cust[mobile]" id="cust-mobile" value="<?php if (isset($_POST['cust']['mobile'])) echo $_POST['cust']['mobile']; ?>" 
                    pattern="^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$" required>

                    <br>
                    <!--Ask for Credit Card input (Only Support Visa and Master Card-->
                    <label for="cust-credit"><b>Credit Card</b></label>
                    <input disabled type="text" name="cust[card]" id="cust-credit" value="<?php if (isset($_POST['cust']['card'])) echo $_POST['cust']['card']; ?>" pattern="[0-9]{14,19}" required>

                    <br>
                    <!--Ask for Credit Card input (Only Support Visa and Master Card-->
                    <label for="cust-expiry"><b>Credit Card</b></label>
                    <input disabled type="month" name="cust[expiry]" id="cust-expiry" value="<?php if (isset($_POST['cust']['expiry'])) echo $_POST['cust']['expiry']; ?>">
                  </div>

                  <div class="bookingLabels">
                    <h6 id="standard" style="font-size: 18px;">Standard</h6>
                    <div>
                      <label for="seats-STA"><b>Adults</b>
                        <select disabled name="seats[STA]" id="seats-STA" onchange="countTotal();isSeatSelected()">
                          <option value="">Please Select</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '1'); ?>>1</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '2'); ?>>2</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '3'); ?>>3</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '4'); ?>>4</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '5'); ?>>5</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '6'); ?>>6</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '7'); ?>>7</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '8'); ?>>8</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '9'); ?>>9</option>
                          <option <?php keepSelectFieldAfterSubmit('STA', '10'); ?>>10</option>
                        </select>
                      </label>
                      <br>

                      <label for="seats-STP"><b>Concession</b>
                        <select disabled name="seats[STP]" id="seats-STP" onchange="countTotal();isSeatSelected()">
                          <option value="">Please Select</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '1'); ?>>1</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '2'); ?>>2</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '3'); ?>>3</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '4'); ?>>4</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '5'); ?>>5</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '6'); ?>>6</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '7'); ?>>7</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '8'); ?>>8</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '9'); ?>>9</option>
                          <option <?php keepSelectFieldAfterSubmit('STP', '10'); ?>>10</option>
                        </select>
                      </label>
                      <br>

                      <label for="seats-STC"><b>Children</b>
                        <select disabled name="seats[STC]" id="seats-STC" onchange="countTotal();isSeatSelected()">
                          <option value="">Please Select</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '1'); ?>>1</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '2'); ?>>2</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '3'); ?>>3</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '4'); ?>>4</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '5'); ?>>5</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '6'); ?>>6</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '7'); ?>>7</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '8'); ?>>8</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '9'); ?>>9</option>
                          <option <?php keepSelectFieldAfterSubmit('STC', '10'); ?>>10</option>
                        </select>
                      </label>
                    </div>
                  </div>

                  <br>

                  <div class="bookingLabels">
                    <h6 id="firstClass" style="font-size: 18px;">First Class</h6>
                    <div>
                      <label for="seats-FCA"><b>Adults</b>
                        <select disabled name="seats[FCA]" id="seats-FCA" onchange="countTotal();isSeatSelected()">
                          <option value="">Please Select</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '1'); ?>>1</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '2'); ?>>2</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '3'); ?>>3</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '4'); ?>>4</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '5'); ?>>5</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '6'); ?>>6</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '7'); ?>>7</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '8'); ?>>8</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '9'); ?>>9</option>
                          <option <?php keepSelectFieldAfterSubmit('FCA', '10'); ?>>10</option>
                        </select>
                      </label>
                      <br>

                      <label for="seats-FCP"><b>Concession</b>
                        <select disabled name="seats[FCP]" id="seats-FCP" onchange="countTotal();isSeatSelected()">
                          <option value="">Please Select</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '1'); ?>>1</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '2'); ?>>2</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '3'); ?>>3</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '4'); ?>>4</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '5'); ?>>5</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '6'); ?>>6</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '7'); ?>>7</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '8'); ?>>8</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '9'); ?>>9</option>
                          <option <?php keepSelectFieldAfterSubmit('FCP', '10'); ?>>10</option>
                        </select>
                      </label>
                      <br>

                      <label for="seats-FCC"><b>Children</b>
                        <select disabled name="seats[FCC]" id="seats-FCC" onchange="countTotal();isSeatSelected()">
                          <option value="">Please Select</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '1'); ?>>1</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '2'); ?>>2</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '3'); ?>>3</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '4'); ?>>4</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '5'); ?>>5</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '6'); ?>>6</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '7'); ?>>7</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '8'); ?>>8</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '9'); ?>>9</option>
                          <option <?php keepSelectFieldAfterSubmit('FCC', '10'); ?>>10</option>
                        </select>
                      </label>
                    </div>
                  </div>

                  <div class="total">
                    <label id="totalPrice">Total</label>
                    <p id="totalMoney"></p>
                  </div>

                  <input type="submit" name="order" id="orderButton" value="Order">
                  <input type='submit' name='session-reset' value='Reset the session'>
                </form>

                <span id="submitErrorMessage" class="container">
                <?php
                  foreach ($errors as $message) {
                    echo "$message </br>";
                  }
                ?>
                </span>
              </div>
            </div>
          </div>
        </section>
        <h1 id="hackingMessage"><b><?php echo $hackErr ?></b></h1>
      </main>
    </div>
  </div>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script src="script.js"></script>

  <br>

  <footer>
    <div>&copy;
      <script>
        document.write(new Date().getFullYear());
      </script>
      Ly Khoi Viet, s3753278; Quach Gia Vi, s3757317. Last modified 2020-05-14 (YYYY-MM-DD)
    </div>

    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
      Programming course at RMIT University in Melbourne, Australia.</div>
    <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
  </footer>

  </br>

<b>Debugging section</b>
</br>
<?php
echo '$_POST array';
preShow($_POST);     // ie echo a string

echo '$_SESSION array';
preShow($_SESSION);

// $aaarg = preShow(, true);    // ie return as a string
// echo "Why is \n $aaarg \n not working?"; 
printMyCode();    // prints all lines of code in this file with line numbers
?>
</body>

</html>