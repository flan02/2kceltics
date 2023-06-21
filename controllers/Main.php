<?php
//require_once("core/Config.php");

class Main extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $version2k = get_version();
        $playoffs = get_season();
//Capturamos el nombre de la pc del usuario
        $hostname = gethostname();
// capturamos el ip del usuario
        $_geoplugin = new geoPlugin();
        $_geoplugin->locate();
        // ruta local o servidor para las imagenes
        $ip = $_geoplugin->ip;
/*
    if($_geoplugin->timezone != "America/Argentina/Cordoba"){
    try {
            $_loadModel = new LoadModel("VisitorsModel");
            $_visitorsModel = new VisitorsModel();
            $_visitorsModel->setVisitors($_geoplugin->ip, $_geoplugin->countryName, $_geoplugin->latitude, $_geoplugin->longitude, $_geoplugin->locationAccuracyRadius,
            $_geoplugin->currencyCode, $_geoplugin->timezone);
        } catch(Exception $e){
            die($e);
    }
}
*/
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

        $mainmenu = false; // para que cuando entremos al sitio NO muestre el desplegable
        $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");
        $controller = array("Dashboard", "Content");    // controllador para el main
        $_loadViews = new LoadViews("Main/home.php", compact("root_img", "cont", "mobile", "controller", "r", "f", "css1", "css2", "iconos", "mainmenu", "playoffs"));
    }
}

?>