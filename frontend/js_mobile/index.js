import BackgroundDinamic from "./modules/main.js";
import panelGames from "./modules/panel_games.js";

document.addEventListener("DOMContentLoaded", () => {
    BackgroundDinamic()
    panelGames("mainmodal",".panel__btn","maincross","boximg", "currentGame")
   
  })