/* -------------------------------------------------------------------------- */
/*                                 Hero slider                                */
/* -------------------------------------------------------------------------- */

var slide = document.getElementsByClassName("slide");
var btnPrv = document.querySelector(".prev");
var btnNxt = document.querySelector(".next");
var indicator = document.getElementById("indicator");
var dots = document.getElementsByClassName("dots");
var autoplay = document.getElementsByClassName("slider__container")[0].getAttribute("data-autoplay");
var l = slide.length;
var interval = 5000;
var set;

window.onload = function () {
    initialize();
    slide[0].style.opacity = "1";
    for (var j = 0; j < l; j++) {
        indicator.innerHTML += "<div class='dots' onclick=change(" + j + ")></div>";
    }

    dots[0].style.background = "#DC040F";

}

function initialize() {
    if (autoplay === "true")
        set = setInterval(function () { next(); }, interval);
}



function change(index) {
    clearInterval(set);
    count = index;
    for (var j = 0; j < l; j++) {
        slide[j].style.opacity = "0";
        dots[j].style.background = "#0F110C";
    }
    slide[count].style.opacity = "1";
    dots[count].style.background = "#DC040F";


}

var count = 0;

btnNxt.addEventListener("click", next);
function next() {
    clearInterval(set);
    slide[count].style.opacity = "0";
    count++;
    for (var j = 0; j < l; j++) {
        dots[j].style.background = "#0F110C";
    }


    if (count == l) {
        count = 0;
        slide[count].style.opacity = "1";
        dots[count].style.background = "#DC040F";

    } else {
        slide[count].style.opacity = "1";
        dots[count].style.background = "#DC040F";
    }
    initialize()
}


function prev() {
    clearInterval(set);
    slide[count].style.opacity = "0";
    for (var j = 0; j < l; j++) {
        dots[j].style.background = "#0F110C";
    }
    count--;

    if (count == -1) {
        count = l - 1;
        slide[count].style.opacity = "1";
        dots[count].style.background = "#DC040F";

    } else {
        slide[count].style.opacity = "1";
        dots[count].style.background = "#DC040F";
    }
    initialize()
}

btnPrv.addEventListener("click", prev);