let navbar = document.querySelector(".navbar");
let searchBox = document.querySelector(".search-box .bx-search");
{/* <i class='bx bx-x'></i> */}
searchBox.addEventListener("click", ()=>{
    navbar.classList.toggle("showInput");
    if(navbar.classList.contains("showInput")){
        searchBox.classList.replace("bx-search" ,"bx-x")
    }else {
        searchBox.classList.replace("bx-x" ,"bx-search")
    }
})

// SIDEBBAR OPEN
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
let navLinks = document.querySelector(".nav-links");

menuOpenBtn.addEventListener("click", ()=>{
    navLinks.style.left="0";
});
menuCloseBtn.addEventListener("click", ()=>{
    navLinks.style.left="-100%";
});

let olahragaArrow = document.querySelector(".olahraga-arrow");
olahragaArrow.addEventListener("click", ()=>{
    navLinks.classList.toggle("show1");
});

let brandsArrow = document.querySelector(".brands-arrow");
brandsArrow.addEventListener("click", ()=>{
    navLinks.classList.toggle("show2");
});

// FOOTER
document.getElementById("year").innerHTML = new Date().getFullYear();


// MAGNIFIER

