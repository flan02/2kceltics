var btn1_valida = !!document.getElementById("btn--spoiler1");
var btn2_valida = !!document.getElementById("btn--spoiler2");
var cross = !!document.getElementById("crossclose");
var cross2 = !!document.getElementById("crossclose2");
let display1 = document.getElementById("modal");
let display2 = document.getElementById("modal2");

if (btn1_valida == true) {
  let btn1 = document.getElementById("btn--spoiler1");
  btn1.addEventListener("pointerdown", function () {
    display1.style.visibility = "visible";
  });
} else {
  btn1 = null;
}

if (btn2_valida == true) {
  let btn2 = document.getElementById("btn--spoiler2");
  btn2.addEventListener("pointerdown", function () {
    display2.style.visibility = "visible";
  });
} else {
  btn2 = null;
}

if (cross == true) {
  let cross = document.getElementById("crossclose");
  cross.addEventListener("pointerdown", function () {
    display1.style.visibility = "hidden";
  });
} else {
  cross = null;
}

if (cross2 == true) {
  let cross2 = document.getElementById("crossclose2");
  cross2.addEventListener("pointerdown", function () {
    display2.style.visibility = "hidden";
  });
} else {
  cross2 = null;
}

/*
cross2.addEventListener("pointerdown", function () {
  display2.style.visibility = "hidden";
});
*/
