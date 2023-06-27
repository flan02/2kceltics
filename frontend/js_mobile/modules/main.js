
export default function BackgroundDinamic() {
    let interval = 1000
    const colors = ['#1A0501', '#1A0501', '#1A0501', '#01041A', '#01041A', '#01041A', '#000F01', '#000F01', '#1B0119', '#1B0119' ]
    
    setInterval(() => {
        let pos = Math.floor(Math.random()*10)
        document.getElementById('mainMobile').style.backgroundColor = colors[`${pos}`]
        document.getElementById('mainGrid').style.backgroundColor = colors[`${pos}`]
    }, interval);
  
  //export default function slider(){
     /* const $nextBtn = !!d.querySelector(".slider-btns .next")
      const $prevBtn = !!d.querySelector(".slider-btns .prev")*/
      const $slides = document.querySelectorAll(".slider-slide")
      let i = 0
      
      let time = 3000
      setInterval( () => {
          $slides[i].classList.remove("active")
          i++  // +1
          if(i >= $slides.length) i = 0
          $slides[i].classList.add("active")
      }, time)
}