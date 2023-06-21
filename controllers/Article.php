<?php
//require_once("core/Session.php");

class Article extends Controller
{
    
    function __construct()
    {
        parent::__construct();
    }


    public function news()
    {
      
    if(isset($_GET["game"]))
    {
        $art = $_GET["game"];   
    }
    
    $version2k = get_version();

    // ruta local o servidor para las imagenes
        $_geoplugin = new geoPlugin();
        $_geoplugin->locate();
        $ip = $_geoplugin->ip;
        if($ip == "127.0.0.1" || $ip == "::1"){
            $root_img = url_base() . "UniServerZ localhost/framework scylla/".$version2k."/resources/img/";
            $root = url_base() . "UniServerZ%20localhost/framework%20scylla/".$version2k."/admin/articles/";
        }else{
            $root_img = "https://www.2kceltics.xyz/resources/img/";
            $root = "https://www.2kceltics.xyz/admin/articles/";
        }
    
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
            $mainmenu = true;
        } else {
            $develop = develop_mode("desktop");
            $mobile = $develop[0];
            $css2 = $develop[1];
            $mainmenu = true;
        }
        
        $articles = get_article();
            $i=0;
        foreach($articles as $k => $v):
           
           foreach ($v as $key => $value) {
            if(isset($art))
            {
                if($art == $key)
                {
                    $art = $value."_".$key;  // hacemos q coincida el articulo q elige el usuario con nuestro listado de articulos      
                }
            }
            
            $unix[$i] = $value;
            $article[$key] = $unix[$i];
            $i++;
        }
                        
        endforeach;

        array_multisort($article, SORT_ASC, $articles);
        $z = 0;
        foreach($article as $news => $date):
            $articles[$z] = $news;
            $unix[$z] = $date;
            $z++;
        endforeach;

     /*   rsort($articles);
        rsort($unix);*/
        
        $a = $art.".txt";
      //  $root = root("admin/articles/", $a);
        $file = $root.$a;
       
     $gestor = fopen("$file", "r");
     $buff = "";
     if ($gestor) {
         while (($bufer = fgets($gestor, 4096)) !== false) {
           $buff .= $bufer;  // en este while se va leyendo la informacion que esta dentro del archivo en bufer se almacena
            
         }
         if (!feof($gestor)) {
             echo "Error: fallo inesperado de fgets()\n";
         }
         fclose($gestor);
     }

        $mainmenu = true;
        $controller = array("Dashboard", "Content");   // controllador p/ la interfaz
    $iconos = array("2kceltics_favicon32x32.png", "x-quit-solid.svg", "gift.svg", "user-solid.svg", "linkedin.svg", "twitch.svg", "address-card.svg", "paypal.svg", "exclamation-triangle-solid.svg", "menu-bars.svg", "arrow-down.svg");
    $_loadViews = new LoadViews("Main/article.php", compact("root_img", "controller", "articles", "art", "unix", "buff", "r","f","css1","css2","mobile","mainmenu","iconos"));
    
    }
    
}