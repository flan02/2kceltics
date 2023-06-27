<?php

// require_once("core/Session.php");

class Content extends Controller
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function fullgames()
    {

        $version2k = get_version();
        //$playoffs = get_season();
        $playoffs = true;
        if (isset($_GET["game"])) {
            $game = $_GET["game"];
            /*echo $game;
            die(); */
        } else {
            $game = " ";
        }

        if($playoffs == "false"){
        $json_season82 = file_get_contents("json/fullgames2k23.json");
        $json = json_decode($json_season82, true);
        }else{
         $json_season82 = file_get_contents("json/playoffs2k23.json");
         $json = json_decode($json_season82, true);
        }
        
        $current_game = count($json);
        $i = 0;
        $j = 0;
        $k = 1;
        $z = 0;

        foreach ($json as $season82) {
           
            $array_season82[$i] = $season82;
            
            foreach ($array_season82[$i] as $clave => $valor) {
                if ($j == 0) {
                    $array_links[$i] = $valor;   // link de youtube          
                    $j++;
                }

                if ($clave == "BOS") $array_bos_points[$i] = $valor;    // puntos encestados por nosotros
                if ($clave != "BOS" && $clave != "link" && $clave != "res") {
                    $array_rival_points[$i] = $valor;       // puntos encestados por los rivales                              
                    $j++;
                    if ($j == 2) $array_rival_name[$i]  = $clave;                // nombre del equipo rival             
                }
            }

            $j = 0;
            $i++;
        }

        foreach($json as $cla => $val):
            $gamename[$z] = $cla;
            $z++;
        endforeach;

        rsort($gamename);       
        if($playoffs == "true") krsort($array_links);

        // ruta local o servidor para las imagenes
        $_geoplugin = new geoPlugin();
        $_geoplugin->locate();
        $ip = $_geoplugin->ip;
        if ($ip == "127.0.0.1" || $ip == "::1") {
            $root_img = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img";
        } else {
            $root_img = "https://www.2kceltics.xyz/resources/img";
        }

        // detectamos si es mobil o no
        $_detectdevice = new Mobile_Detect();
        // rutas para el header
        $r = "resources/icons/";
        $f = "frontend/scss/";
        $css1 = "css/normalize.css";

        if ($_detectdevice->isMobile()) {
            $develop = develop_mode("mobile");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = true;
            
        } else {
            $develop = develop_mode("desktop");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = true;
        }
        
        $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");

        $controller = array("Dashboard", "Content");   // controllador p/ la interfaz
        $_loadViews = new LoadViews("Main/fullgames.php", compact("root_img", "controller", "array_links", "array_bos_points", "array_rival_points", "array_rival_name", "game", "current_game", "r", "f", "css1", "css2", "mobile", "mainmenu", "iconos", "gamename", "playoffs", "playoffs_root"));
    }

    public function roster()
    {
        $version2k = get_version();
        $playoffs = get_season();
        // ruta local o servidor para las imagenes
        $_geoplugin = new geoPlugin();
        $ip = $_geoplugin->locate();
        $ip = $_geoplugin->ip;

        if ($ip == "127.0.0.1" || $ip == "::1") {
            $root_img = url_base() . "UniServerZ localhost/framework scylla/". $version2k . "/resources/img/";
        } else {
            $root_img = "https://www.2kceltics.xyz/resources/img";
        }

        $_detectdevice = new Mobile_Detect();
        // rutas para el header
        $r = "resources/icons/";
        $f = "frontend/scss/";
        $css1 = "css/normalize.css";

        if ($_detectdevice->isMobile()) {
            $develop = develop_mode("mobile");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = true;
        } else {
            $develop = develop_mode("desktop");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = true;
        }

        $png = ".png";
        $players = array(
            "marcus smart",
            "derrick white",
            "jaylen brown",
            "jayson tatum",
            "al horford",
            "malcolm brogdon",
            "grant williams",
            "robert williams",
            "payton pritchard",
            "sam hauser",
            "luke kornet",
            "justin champagnie",
            "mfiondu kabengele",
            "blake griffin",
            "jd davison"
        );

        $i = 0;
        $root_players = array();
        for ($i; $i < count($players); $i++) :
            $root_players[$i] = root("resources/img/players/", $players[$i] . $png);
        endfor;


        $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");

        $controller = array("Dashboard", "Content");
        $_loadViews = new LoadViews("Main/roster.php", compact("root_img", "controller", "r", "f", "css1", "css2", "mobile", "iconos", "mainmenu", "players", "root_players", "playoffs"));
    }


    public function articles()
    {
        $version2k = get_version();
        $playoffs = get_season();
        // ruta local o servidor para las imagenes
        $_geoplugin = new geoPlugin();
        $ip = $_geoplugin->locate();
        $ip = $_geoplugin->ip;
        
        if ($ip == "127.0.0.1" || $ip == "::1" ) {
            $root_img = url_base() . "UniServerZ localhost/framework scylla/". $version2k . "/resources/img";
        } else {
            $root_img = "https://www.2kceltics.xyz/resources/img";
        }

        $_detectdevice = new Mobile_Detect();
        // rutas para el header
        $r = "resources/icons/";
        $f = "frontend/scss/";
        $css1 = "css/normalize.css";

        if ($_detectdevice->isMobile()) {
            $develop = develop_mode("mobile");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = true;
        } else {
            $develop = develop_mode("desktop");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = true;
        }

        $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");
        /*  
             $timestamp = time();
               echo $timestamp; 
               die("</br> calculando la hora del archivo");
         */
        $articles = get_article();
        $i = 0;
        foreach ($articles as $k => $v) :

            foreach ($v as $key => $value) {

                $unix[$i] = $value;
                $article[$key] = $unix[$i];
                $i++;
            }

        endforeach;

        array_multisort($article, SORT_ASC, $articles);
        $z = 0;
        foreach ($article as $news => $date) :
            $articles[$z] = $news;
            $unix[$z] = $date;
            $z++;
        endforeach;

        $controller = array("Dashboard", "Content");  // lo valida el HEADER
        $_loadViews = new LoadViews("Main/articles.php", compact("root_img", "controller", "articles", "unix", "r", "f", "css1", "css2", "iconos", "mobile", "mainmenu", "playoffs"));
    }


    public function team()
    {
        $controller = array("Dashboard", "Content");
        $itworks = "team";

        $_loadViews = new LoadViews("Main/team.php", compact("controller", "itworks"));
    }
}