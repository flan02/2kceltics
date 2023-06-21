<?php
/* if(isset($data)){$whisp = $data["cont"];} */
class Dashboard extends Controller
{
   
    function __construct()
    {
        parent::__construct();     
    }
  
    public function menu()
    {    
        $version2k = get_version();
        $playoffs = get_season();
        $porival = get_porival();  

        $ochentaydos = array(
            "phi",
            "mia",
            "orl",
            "chi",
            "cle",
            "was",
            "cle",
            "chi",
            "ny",
            "mem",
            "det",
            "den",
            "det",
            "okc",
            "atl",
            "no",
            "chi",
            "dal",
            "sac",
            "was",
            "cha",
            "mia",
            "mia",
            "bro",
            "tor",
            "pho",
            "gs",
            "lac",
            "lal",
            "orl",
            "orl",
            "ind",
            "min",
            "mil",
            "hou",
            "lac",
            "den",
            "okc",
            "dal",
            "sa",
            "chi",
            "no",
            "bro",
            "cha",
            "cha",
            "gs",
            "tor",
            "orl",
            "mia",
            "ny",
            "lal",
            "bro",
            "pho",
            "det",
            "phi",
            "cha",
            "mem",
            "mil",
            "det",
            "ind",
            "phi",
            "ny",
            "cle",
            "bro",
            "ny",
            "cle",
            "por",
            "atl",
            "hou",
            "min",
            "por",
            "uth",
            "sac",
            "ind",
            "sa",
            "was",
            "mil",
            "uth",
            "phi",
            "tor",
            "tor",
            "atl"
        );

        $localia = array(
            "l",
            "v",
            "v",
            "v",
            "l",
            "l",
            "v",
            "l",
            "v",
            "v",
            "l",
            "l",
            "v",
            "l",
            "v",
            "v",
            "v",
            "l",
            "l",
            "l",
            "l",
            "l",
            "l",
            "v",
            "v",
            "v",
            "v",
            "v",
            "v",
            "l",
            "l",
            "l",
            "l",
            "l",
            "l",
            "l",
            "v",
            "v",
            "v",
            "v",
            "l",
            "l",
            "v",
            "v",
            "v",
            "l",
            "v",
            "v",
            "v",
            "l",
            "l",
            "l",
            "l",
            "v",
            "l",
            "l",
            "l",
            "v",
            "l",
            "v",
            "v",
            "v",
            "l",
            "l",
            "l",
            "v",
            "l",
            "v",
            "v",
            "v",
            "v",
            "v",
            "v",
            "l",
            "l",
            "v",
            "v",
            "l",
            "v",
            "l",
            "l",
            "l"
        );

        if($playoffs == "false"){
            $json_season82 = file_get_contents("json/fullgames2k23.json");
            $json = json_decode($json_season82, true);
        }else{
             $json_season82 = file_get_contents("json/playoffs2k22.json");
             $json = json_decode($json_season82, true);
        }

        $current_game = count($json);
        $current_game = $current_game +1;
        $i=0;
        $j=0;
       
        foreach($json as $season82)
        {
            $array_season82[$i] = $season82;
            
            foreach($array_season82[$i] as $clave => $valor)
            {
                if($clave == "res") {
                    $res[$i] = $valor;
                    
                    if($res[$i] === "W") $win[] = $valor;
                    else { $lose[] = $valor; }
                }
            }
        }
   //     echo $current_game;
     /*   $win = count($win);
        $lose = count($lose);
        */
        // optimizamos el contador de visitas
        $from = "dashboard";
        $cont = contadorvisitas($from);
        
        // detectamos si es mobil o no
        $_detectdevice = new Mobile_Detect();
        // rutas para el header
        $r = "resources/icons/";
        $f = "frontend/scss/";
        $css1 = "css/normalize.css";
        if($_detectdevice->isMobile()){         //   INVERTIR VAR $CSS2 PARA USAR EN EL SERVIDOR
            $develop = develop_mode("mobile");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = false;
        } else {
            $develop = develop_mode("desktop");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = true;
        }

        if(isset($_GET["game"])){
            $pag = $_GET["game"];
        }else {
            $pag = 1;
        }

        $z = 0;
        foreach($json as $cla => $val):
            $gamename[$z] = $cla;
            $z++;
        endforeach;

        rsort($gamename);

                // ruta local o servidor para las imagenes
                $_geoplugin = new geoPlugin();
                $_geoplugin->locate();
                $ip = $_geoplugin->ip;
               
                if($ip == "127.0.0.1" || $ip == "::1"){
                    $root_img = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img";
                    $root_logo = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/nbateamslogo";
                    $path_pstats = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img/games/pstats.png";
                    $path_trecord = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img/games/trecord.png";
                    $path_standings = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img/games/standings.png";
                    $path_2kimg = [$path_pstats, $path_trecord, $path_standings];
                    if($playoffs == "true") $playoffs_root = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img/games/" . $gamename[0] . "/playoffs_picture.png";
                }else{
                    $root_img = "https://www.2kceltics.xyz/resources/img";
                    $root_logo = "https://www.2kceltics.xyz/resources/nbateamslogo";
                    $path_pstats = "https://www.2kceltics.xyz/resources/img/games/pstats.png";
                    $path_trecord = "https://www.2kceltics.xyz/resources/img/games/trecord.png";
                    $path_standings = "https://www.2kceltics.xyz/resources/img/games/standings.png";
                    $path_2kimg = [$path_pstats, $path_trecord, $path_standings];
                    if($playoffs == "true") $playoffs_root = url_base() . "/resources/img/games/" . $gamename[0] . "/playoffs_picture.png";
                }
        
        $mainmenu = true;  // para que muestre el desplegable en la version mobile
        $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");
        $controller = array("Dashboard","Content");
        $_loadViews = new LoadViews("Main/menu.php", compact("root_img", "root_logo", "cont", "mobile","controller","ochentaydos","localia", "current_game","r", "f", "css1", "css2", "iconos", "mainmenu", "pag", "win", "lose", "path_2kimg", "playoffs", "gamename", "porival", "playoffs_root"));
    
    }



    public function subscribe(){

         $version2k = get_version();
         $playoffs = get_season();

         
         // detectamos si es mobil o no
         $_detectdevice = new Mobile_Detect();
         // rutas para el header
         $r = "resources/icons/";
         $f = "frontend/scss/";
         $css1 = "css/normalize.css";
         if($_detectdevice->isMobile()){         //   INVERTIR VAR $CSS2 PARA USAR EN EL SERVIDOR
             $develop = develop_mode("mobile");
             $mobile = $develop[0];
             $css2 = $develop[1];
             $mainmenu = false;
         } else {
             $develop = develop_mode("desktop");
             $mobile = $develop[0];
             $css2 = $develop[1];
             $mainmenu = true;
         }
         
         // ruta local o servidor para las imagenes
         $_geoplugin = new geoPlugin();
         $_geoplugin->locate();
         $ip = $_geoplugin->ip;
        
         if($ip == "127.0.0.1" || $ip == "::1"){
             $root_img = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img";
             $root_logo = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/nbateamslogo";
         }else{
             $root_img = "https://www.2kceltics.xyz/resources/img";
             $root_logo = "https://www.2kceltics.xyz/resources/nbateamslogo";
         }

        $response = "null";

        $mainmenu = true;  // para que muestre el desplegable en la version mobile
        $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");
      
        $controller = array("Dashboard","Content");
        $_loadViews = new LoadViews("Main/subscribe.php", compact("root_img", "root_logo", "cont", "mobile","controller", "r", "f", "css1", "css2", "iconos", "mainmenu", "playoffs", "response"));
    }



    public function subscribeSubmit(){
        if($_POST){
            if(!empty($_POST["name"]) && !empty($_POST["lastname"]) && !empty($_POST["email"])
            && !empty($_POST["favteam"]) && !empty($_POST["country"]) && !empty($_POST["birthdate"])){

            $firstname = $_POST["name"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $favteam = $_POST["favteam"];
            $country = $_POST["country"];
            $birth = $_POST["birthdate"];
            
        $name = $firstname . " " . $lastname;
    
        $_geoplugin = new geoPlugin();
        $_geoplugin->locate();

        // ruta local o servidor para las imagenes
        $ip = $_geoplugin->ip;
            
        date_default_timezone_set("America/Buenos_Aires");
      
        $dateUser = strtotime($birth);

        $birthdate = date("Y-m-d H:i:s", $dateUser);
      
        $_loadModel = new LoadModel("NewsletterModel");
        $_newsletter = new NewsletterModel();

        $_sendEmail = new Email($name, $email);   // //INSTANCIAMOS EL OBJETO QUE ENVIA EMAILS A LOS USUARIOS

        try {
                $pst = $_newsletter->subscribeModel($name, $email, $favteam, $ip, $country, $birthdate);         
                if($pst){
                    $response = "true";   
                    $_sendEmail->setNewsletter($name, $email);
                    $redirection = get("/Dashboard", "headers");
                    $get = "/Subscribed";
                    header("Location: {$redirection}{$get}");
                }else{
                    $redirection = get("/Dashboard", "headers");
                    $get = "/Duplicated";
                    header("Location: {$redirection}{$get}");
                }
            }catch(Exception $e){
                $redirection = get("/Dashboard", "headers");
                $get = "/Error";
                header("Location: {$redirection}{$get}");
        }
    }
}
    $version2k = get_version();
    $playoffs = get_season();

     // detectamos si es mobil o no
     $_detectdevice = new Mobile_Detect();
     // rutas para el header
     $r = "resources/icons/";
     $f = "frontend/scss/";
     $css1 = "css/normalize.css";
     if($_detectdevice->isMobile()){         //   INVERTIR VAR $CSS2 PARA USAR EN EL SERVIDOR
         $develop = develop_mode("mobile");
         $mobile = $develop[0];
         $css2 = $develop[1];
         $mainmenu = false;
     } else {
         $develop = develop_mode("desktop");
         $mobile = $develop[0];
         $css2 = $develop[1];
         $mainmenu = true;
     }
     
    if($ip == "127.0.0.1" || $ip == "::1"){
        $root_img = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img";
        $root_logo = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/nbateamslogo";     
    }else{
        $root_img = "https://www.2kceltics.xyz/resources/img";
        $root_logo = "https://www.2kceltics.xyz/resources/nbateamslogo";
   
    }
               
        $mainmenu = true;  // para que muestre el desplegable en la version mobile
        $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");
        $controller = array("Dashboard","Content");
        $_loadViews = new LoadViews("Main/subscribe.php", compact("root_img", "root_logo", "cont", "mobile","controller", "r", "f", "css1", "css2", "iconos", "mainmenu", "playoffs", "response"));
    }


    public function headers(){
        
        if(isset($_GET)){
            $header = $_GET["link"];
        }
        $version2k = get_version();
        // capturamos el ip del usuario
                $_getip = new Getip();
                $_geoplugin = new geoPlugin();
                $_geoplugin->locate();
                $_getip->write_ip($_geoplugin->ip, $_geoplugin->countryCode, $_geoplugin->countryName, $_geoplugin->latitude, $_geoplugin->longitude, $_geoplugin->locationAccuracyRadius);
        
        // ruta local o servidor para las imagenes
                $ip = $_geoplugin->ip;
                if($ip == "127.0.0.1" || $ip == "::1"){
                    $root_img = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img";
                }else{
                    $root_img = "https://www.2kceltics.xyz/resources/img";
                }
        // detectamos si es mobil o no
                $_detectdevice = new Mobile_Detect();
        
        // optimizamos el contador
                $from = "main";
                $cont = contadorvisitas($from);
               
        // rutas para el header
                $r = "resources/icons/";
                $f = "frontend/scss/";
                $css1 = "css/normalize.css";
                
                if($_detectdevice->isMobile()){ 
                    $develop = develop_mode("mobile");
                    $mobile = $develop[0];
                    $css2 = $develop[1];
                    $mainmenu = true;
                } else {
                    $develop = develop_mode("desktop");
                    $mobile = $develop[0];
                    $css2 = $develop[1];
                    $mainmenu = false;
                }
        
                $playoffs = get_season();
                $mainmenu = false; // para que cuando entremos al sitio NO muestre el desplegable
                
                $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");
                $controller = array("Dashboard", "Content/{$header}");    // controllador para el main
                $_loadViews = new LoadViews("Main/headers.php", compact("root_img", "cont", "mobile", "controller", "r", "f", "css1", "css2", "iconos", "mainmenu", "playoffs"));
        
    }

}