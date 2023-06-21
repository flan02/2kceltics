import navmenu from "./modules/menu.js";
import panelGames from "./modules/panel_games.js";
import slider from "./modules/slider.js";
const d=document, c=console, w=window, n=navigator

d.addEventListener("DOMContentLoaded", () =>{
    navmenu()
    panelGames("mainmodal",".panel__btn","maincross","boximg")
    slider()
});
    

