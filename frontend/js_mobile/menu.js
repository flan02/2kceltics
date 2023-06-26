var btn_menu = !!document.getElementById("menu");

const d = document, c = console, w = window;
d.addEventListener("DOMContentLoaded", () => {
  let interval = 1000
  const colors = ['#1A0501', '#1A0501', '#1A0501', '#01041A', '#01041A', '#01041A', '#000F01', '#000F01', '#1B0119', '#1B0119' ]
  
  setInterval(() => {
      let pos = Math.floor(Math.random()*10)
      d.getElementById('mainMobile').style.backgroundColor = colors[`${pos}`]
  }, interval);

//export default function slider(){
    const $nextBtn = d.querySelector(".slider-btns .next")
    const $prevBtn = d.querySelector(".slider-btns .prev")
    const $slides = d.querySelectorAll(".slider-slide")
    console.log($slides)
    let i = 0
    
    let time = 3000
    setInterval( () => {
        $slides[i].classList.remove("active")
        i++  // +1
        if(i >= $slides.length) i = 0
        $slides[i].classList.add("active")
    }, time)
})


if (btn_menu) {
  const $btn_menu = document.getElementById("menu");
  $btn_menu.addEventListener("click", function (e) {
    $nav_menu.classList.toggle("hidden");
    $nav_menu.classList.toggle("visible");
  });
}

const $nav_menu = document.getElementById("menu_nav");

const $btn_card = document.getElementById("card");
const $div_card = document.getElementById("aboutme");

$btn_card.addEventListener("click", function (e) {
  $div_card.classList.toggle("hidden");
  $div_card.classList.toggle("visible");
});

const $btn_gift = document.getElementById("gift");
const $div_don = document.getElementById("donation");

$btn_gift.addEventListener("click", function (e) {
  $div_don.classList.toggle("hidden");
  $div_don.classList.toggle("visible");
});

/* ****************************************** version mobile  ********************************* */

var btn_mainmenu = !!document.getElementById("main-menu");

if (btn_mainmenu) {
  const $btn_mainmenu = document.getElementById("main-menu");
  const $nav_mainmenu = document.getElementById("nav-mobile");

  $btn_mainmenu.addEventListener("click", function (e) {
    $nav_mainmenu.classList.toggle("hidden");
    $nav_mainmenu.classList.toggle("visible");
  });
}
