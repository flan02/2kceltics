<?php


function develop_mode($mode){

    switch($mode):
        case "mobile":
            $mobile = true;
            $css2 = "css/mobile_estilos.css";
            $develop = [$mobile,$css2];
            return $develop;
        break;
        case "desktop":
            $mobile = false;
            $css2 = "css/estilos.css";
            $develop = [$mobile,$css2];
            return $develop;
        break;
    endswitch;
}
function contadorvisitas($from)
    {
        $from = $from;
       
    
        $archivo = "contadorvisitas.txt"; //el archivo de texto que contendra las visitas
        $f = fopen($archivo, "r"); //abrimos el fichero en modo de lectura
        if($f)
        {
            $contadorvisitas = fread($f, filesize($archivo)); //vemos el archivo de texto
            if($from == "main"){
            $contadorvisitas = $contadorvisitas + 1; //Le sumamos +1 al contador de visitas
            } else {
                $contadorvisitas;
            }
            fclose($f);
        }
        $f = fopen($archivo, "w+");
        if($f)
        {
            fwrite($f, $contadorvisitas);
            fclose($f);
        }
        return $contadorvisitas;
    }

// ej:  echo "<script> window.location = '".url_base(). '/UniserverZ%20localhost/framework%20scylla/DATABASKETBALL/index.php?controller=Coach&action=view' . "' </script>";
function url_base()  // sirve pq p/ trabajar con URL amigables la ruta de los archivos debe ser la ABSOLUTA
{
    return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/";  // muestra http o https
}


function get($controller, $action, $third_param = null)
{
    $version2k = get_version();

    $get = $controller . "/" . $action;

    $env = $_SERVER["REMOTE_ADDR"];

    $local = '127.0.0.1';

    if($env == $local) {
        $root_local = url_base() . "var/www/".$version2k."/home" . $get;
    }else{
        $root_local = url_base() . "UniServerZ localhost/framework scylla/". $version2k . "/home". $get;
    }
    
    $root_server = "/" . "home". $get;    // "/".  "home". $get;   ... version anterior

    if($env == $local || $env == "::1") $root = $root_local;
    else $root = $root_server;
    
    return $root;
}


function root($path, $arch)          // lo hacemos con imagenes pero puede servir para audios, videos, etc
{
    $version2k = get_version();
//  root("admin/img/",
    $env = $_SERVER["REMOTE_ADDR"];
    $local = '127.0.0.1';

    if($env == $local){
        $path_local = "www/". $version2k."/";
        $root_local = $path . $arch;
    }else{
        $path_local = "UniServerZ localhost/framework scylla/".$version2k."/";
        $root_local = url_base() . $path_local . $path . $arch;
    }
   
    $root_server = url_base() . $path . $arch;
    
    if($env == $local || $env == "::1") $root = $root_local;
    else $root = $root_server;
    return $root;
}

/* ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

function get_article(int $quantity = null)
{
   $i=0;
   $dir = "./admin/img/";
   $dot = ".";

   if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {        
     //     if($file != "." && $file != ".."):
     //   if(preg_match('@^(.)@i', $file) == 1):     
        if(strpos($file,$dot) != 0):    // me devuelve la posicion del string que estoy comparando
        //    echo "nombre archivo: $file / tipo archivo: " . filetype($dir . $file) . "<br/>";
            $name = explode("_", $file);
            $unix[$i] = ($name[0]);
            $titles[$i] = rtrim($name[1], ".jpg");           
            $asoc[$i] = [ $titles[$i] => $name[0] ];
            $i++;
        endif;
    }   
        closedir($dh);
        }
    }else {
        die("No se puede acceder al directorio");
    }

    return $asoc;
}

function get_version(){
    $version2k = "2kceltics_0-6-9-041522";  //cambiar a la version mas reciente del sitioweb
    return $version2k;
}

function get_porival(){
    $porival = "gsw";
    return $porival;
}

function get_season(){
    $playoffs = "false";       // en temporada regular $playoffs = "false"
    return $playoffs;
}


function get_week($week){    
        
        $season_opener = strtotime("18 Oct 2022");
        $this_week = $week;
        $diff = $this_week - $season_opener;   // diferencia en unix desde q arranco la temporada a la fecha actual.
        $week = floor($diff/604800);    // cantidad de semanas que han pasado en unix;

    return $week;
 /*   
    echo "<br>";
    echo 60*60*24 . " segundos en 1 dia";
    echo "<br>";
    echo 86400 * 7 . " segundos en 1 semana";
    echo date("m/d/Y", $season_opener);
*/  
}

// aqui crear la funcion para escapar caracteres y prevenir inyeccion sql
?>