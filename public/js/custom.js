// Adjust calculate minimum height for section
// Get height of header
const headerH = document.querySelector(".main-header").clientHeight;
// Select on section element
const section = document.querySelector(".section");
// Get height of footer
let footerH = document.querySelector(".main-footer").clientHeight;

section.style.minHeight = ((window.innerHeight) - ( footerH +  navbarH)) + "px";

if(headerH){
    section.style.minHeight = ((window.innerHeight) - ( navbarH + headerH + footerH )) + "px";
}
