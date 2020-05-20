  <script>
    // Accordion 
    function myAccFunc() {
      var x = document.getElementById("demoAcc");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }

    // Open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }

    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function displayCategories() {
      var menu = document.getElementById("categories");
      if (menu.classList.contains("show-menu")) {
        menu.classList.remove("show-menu");
        menu.classList.add("hide-menu");
      }
      else {
        menu.classList.remove("hide-menu");
        menu.classList.add("show-menu");
      }
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function (event) {
      if (!event.target.matches('.dropdown')) {
        var menu = document.getElementById("categories");
        if (menu.classList.contains("show-menu")) {
          menu.classList.remove("show-menu");
          menu.classList.add("hide-menu");
        }
      }
    }

    /* Expand search bar when user clicks onto search icon */
    $("#search-btn").click(function () {
      $(".search-box").toggleClass("search-box-active").focus;
    });
  </script>