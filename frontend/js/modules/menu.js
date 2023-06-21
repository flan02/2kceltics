const d=document
const c=console
export default function navmenu(){
const $btn_card = document.getElementById("card");
const $div_card = document.getElementById("aboutme");
const $btn_gift = document.getElementById("gift");
const $div_gift = document.getElementById("donation");
let gift, card
$btn_card.addEventListener("click", function (e) {
    gift = $div_gift.classList[1]
    card = $div_card.classList[2]
    if(gift == "visible") {
      $div_gift.classList.toggle("visible")
      $div_gift.classList.toggle("hidden")
  }
    $div_card.classList.toggle("hidden")
    $div_card.classList.toggle("visible")
  
});



$btn_gift.addEventListener("click", function (e) {
    card = $div_card.classList[2]
    if(card == "visible") {
      $div_card.classList.toggle("visible")
      $div_card.classList.toggle("hidden")
  }
    $div_gift.classList.toggle("hidden")
    $div_gift.classList.toggle("visible")
});

}