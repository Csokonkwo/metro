
    var isNavOpen = false;

    var nav = document.querySelector(".nav-items");
    var className = nav.className;

    function toggleNav() {
      if (isNavOpen == true) {
        nav.className = className;
        isNavOpen = false;
      }
      else {
        nav.className = className + " active"
        isNavOpen = true;
      }
    }




    $(".carousel").swipe({

      swipe: function (event, direction, distance, duration, fingerCount, fingerData) {

        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');

      },
      allowPageScroll: "vertical"

    });
    $(".carousel").swipe({

      swipe: function (event, direction, distance, duration, fingerCount, fingerData) {

        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');

      },
      allowPageScroll: "vertical"

    });



    var acc = document.querySelectorAll(".nav-items li");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        // var panel = this.firstChild;
        // if (panel.style.display === "block") {
        //   panel.style.display = "none";
        // } else {
        //   panel.style.display = "block";
        // }
      });
    }
