// Adjust calculate minimum height for section
// Select on section element
const section = document.querySelector(".section");
// Get height of footer
let footerH = document.querySelector(".main-footer").clientHeight;

section.style.minHeight = ((window.innerHeight) - ( footerH +  navbarH)) + "px";

