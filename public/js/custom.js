// Adjust calculate minimum height for section
// Select on section element
const section = document.querySelector(".section");
// Get height of footer
let footerH = document.querySelector(".main-footer").clientHeight;

section.style.minHeight = (window.innerHeight) - ( footerH +  navbarH) + "px";

if(document.querySelector(".main-header")){
    // Get height of header
    const headerH = document.querySelector(".main-header").clientHeight;
    section.style.minHeight = ((window.innerHeight) - ( navbarH + headerH + footerH )) + "px";
}
