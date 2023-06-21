<?php
require("core/Functions.php");
require("core/Email.php");
require("core/mobile_detect.class.php");
require("core/Getip.php");
require("core/geoplugin.class.php");
require("core/url_friendly.php");
require("core/Controller.php");
require("core/Config.php");
require("core/LoadViews.php");
require("core/Layout.php");
require("core/Controller_whisper.php");
require("core/Model.php");     
require("core/LoadModel.php");
//require("core/Contador.php");

if( $_GET && isset($_GET["controller"]))  //valida si se definio controlador x url
{
    $default_controller = $_GET["controller"];
    
    if( file_exists("controllers/".$default_controller.".php"))  /* PRESTAR ATENCION SI ES CASESENSITIVE Controllers */
    {       
    #la clase y el archivo deben de tener obligatoriamente el mismo nombre
    require("controllers/".$default_controller.".php");
    }
    else
    {
        die("Controlador no encontrado");
    }
}
else
{
    if( file_exists("controllers/".$default_controller.".php"))
    {       
    #la clase y el archivo deben de tener obligatoriamente el mismo nombre
    require("controllers/".$default_controller.".php");
    }
    else
    {
        die("Controlador no encontrado");
    }
    
}


$_2kceltics = new $default_controller();


/*
$ip = $_geoplugin->ip;
if($ip == "181.26.254.211") $_2kceltics = new $default_controller();
else die("Server is currently down for maintenance, please try again later");
*/  
 
 



?>