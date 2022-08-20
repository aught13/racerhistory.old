//ticker functions
var slideIndex = 0;
var ticker;
carousel();
listen();

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  clearTimeout(ticker);
  showDivs(slideIndex = n);
}
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
       dots[i].className = dots[i].className.replace(" w3-white", "");
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1;}
    x[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " w3-white";
    ticker = setTimeout(carousel, 5000); // Change image every 5seconds
}
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1;}
  if (n < 1) {slideIndex = x.length;}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "inline-block";
  dots[slideIndex-1].className += " w3-white";
  
}