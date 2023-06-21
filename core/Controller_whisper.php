<?php
// con esta clase podemos mandarnos mensajes entre controladores, no visibles para el usuario


class Controller_whisper
{
    function __construct( $controller, $data = null)   
    {
        require("Config.php");

        if( file_exists("./controllers/$controller"))
        {       
          
            require("./controllers/$controller");        
        }
        else 
        { 
            die("whisper no enviado.");
        }

    }

}