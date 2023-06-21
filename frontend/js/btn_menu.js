let btn_menu = document.getElementById("btn_menu");
let ul_menu = document.getElementById("btn_ul");

btn_menu.addEventListener("mousedown", function(e) {
ul_menu.style.visibility = "visible";
});

ul_menu.addEventListener("mouseleave", function(e) {
ul_menu.style.visibility = "hidden";
});