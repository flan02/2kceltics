const d=document, c=console, w=window, n=navigator
export default function panelGames(id,sel,close,boximg){
    const $links = d.querySelectorAll(sel)
    const $mainmodal = d.getElementById(id)
    const $imgbox = d.getElementById(boximg),
          $close = d.getElementById(close);
    
    let pic
    let rootimg = "http://localhost/UniServerZ localhost/framework scylla/2kceltics_0-6-9-041522/resources/img/games/1/"
    d.addEventListener("click", (e) => {
        switch(e.target){
        case $links[0]:
             pic = $links[0].id
             pic = pic + ".png" 
             c.log(`${pic}`);
             $imgbox.classList.remove("main__modal--imgbig")
             $imgbox.classList.remove("main__modal--imgmid")
             $imgbox.classList.add("main__modal--img")
             $imgbox.setAttribute("src", rootimg+pic)
             $mainmodal.style.visibility = 'visible';
        break;
        case $links[1]: 
             pic = $links[1].id
             pic = pic + ".png"
             $imgbox.classList.remove("main__modal--img")
             $imgbox.classList.add("main__modal--imgbig")
             $imgbox.setAttribute("src", rootimg+pic)
            c.log(`${pic}`);
            $mainmodal.style.visibility = 'visible';
        break;
        case $links[2]: 
            pic = $links[2].id
            pic = pic + ".png"
            $imgbox.classList.remove("main__modal--img")
            $imgbox.classList.add("main__modal--imgbig")
            $imgbox.setAttribute("src", rootimg+pic) 
            c.log(`${pic}`);
            $mainmodal.style.visibility = 'visible';
        break;
        case $links[3]: 
            pic = $links[3].id
            pic = pic + ".png"
            $imgbox.classList.remove("main__modal--img")
            $imgbox.classList.remove("main__modal--imgbig")
            $imgbox.classList.add("main__modal--imgmid")
            $imgbox.setAttribute("src", rootimg+pic) 
            c.log(`${pic}`);
            $mainmodal.style.visibility = 'visible';
        break;
        case $links[4]: 
            pic = $links[4].id
            pic = pic + ".png"
            $imgbox.classList.remove("main__modal--img")
            $imgbox.classList.add("main__modal--imgbig")
            $imgbox.setAttribute("src", rootimg+pic) 
            c.log(`${pic}`);
            $mainmodal.style.visibility = 'visible';
        break;
        case $close: 
            $mainmodal.style.visibility = 'hidden';
        break;
        }
    });
    
    c.log($links)
    
}