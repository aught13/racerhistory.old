/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


window.onscroll = function () {  
    var nav = document.getElementById('scroll');
    if ( window.pageYOffset > 95 ) {
        nav.classList.remove("w3-hide");
        nav.classList.add("w3-animate-bottom");
    } else {
        nav.classList.add("w3-hide");
        nav.classList.remove("w3-animate-bottom");
    }
}
