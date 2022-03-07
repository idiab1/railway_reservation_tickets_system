
// Get height of navbar
let navbarH = document.querySelector(".navbar").clientHeight;
// Get height of footer
let footerH = document.querySelector(".main-footer").clientHeight;

// Adjust calculate marginTop for body html
document.querySelector("body").style.marginTop = navbarH + "px";


// Adjust calculate minimum height for section
// Select on section element
const section = document.querySelector(".section");
section.style.minHeight = ((window.innerHeight) - ( footerH +  navbarH)) + "px";

