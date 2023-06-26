import navmenu from "./modules/menu.js";
import panelGames from "./modules/panel_games.js";
import slider from "./modules/slider.js";

const d=document, c=console, w=window, n=navigator

d.addEventListener("DOMContentLoaded", () =>{
    navmenu()
    panelGames("mainmodal",".panel__btn","maincross","boximg", "currentGame")
    slider()
        let interval = 1000
        const colors = ['#1A0501', '#1A0501', '#1A0501', '#01041A', '#01041A', '#01041A', '#000F01', '#000F01', '#1B0119', '#1B0119' ]
        
        setInterval(() => {
            let pos = Math.floor(Math.random()*10)
            d.getElementById('main').style.backgroundColor = colors[`${pos}`]
           // d.getElementById('mainFullgames').style.backgroundColor = colors[`${pos}`]
        
        }, interval);
    }
        
);



