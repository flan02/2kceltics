<?php

class Layout
{
 
  function __construct( $view, $data = null)   
    {
        require("Config.php");
    /*    echo $view;
        die();*/
        if( file_exists("./views/$view"))
        {
           if( file_exists( "./views/Layout/$header_welcome")) 
            {
                if($view == "Layout/header_welcome.php")
                {
                 require( "./views/Layout/".$header_welcome);
                 
                }else
                {
                 require( "./views/Layout/".$header);
                }
               //       require( "./views/Layout/".$header);  //  hace que la primera vez no lo muestre en el HOME
            }
            else 
            { 
                die("Encabezado no encontrado"); 
            }
        } 
        else 
            { die("Sitio no encontrado."); 
            }
        
                //       require( "./views/$view");
        
           if(file_exists( "./views/$view"))
            {
                if( file_exists( "./views/Layout/$footer")) 
                {
               require( "./views/Layout/".$footer);
                }
                else {
                    die("Pie no encontrado");
                }
            }
      



    }
 
}

?>