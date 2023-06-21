const d = document,
      c = console;

export default function slider(){
    const $nextBtn = d.querySelector(".slider-btns .next")
    const $prevBtn = d.querySelector(".slider-btns .prev")
    const $slides = d.querySelectorAll(".slider-slide")
    let i = 0
    let interval = 5000

    setInterval( () => {
        $slides[i].classList.remove("active")
        i++  // +1
        if(i >= $slides.length) i = 0
        $slides[i].classList.add("active")
    }, interval)};