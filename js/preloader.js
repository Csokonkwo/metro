
var loading = true;

//Page should stop loading if it takes more than a minute
setTimeout(function () {
  if (loading == true) {
    var loader = document.querySelector(".preloader");
    loader.classList.toggle("inactive");
    loading = false;
  }
}, 60000);

//Remove loader once page is done

window.addEventListener(
  "load",
  function () {
    var loader = document.querySelector(".preloader");
    loader.classList.toggle("inactive");
    loading = false;
  },
  false
);

// window.addEventListener("load", function(){
// 	var load_screen = document.getElementById("load_screen");
// 	document.body.removeChild(load_screen);
// });
