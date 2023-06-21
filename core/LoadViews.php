<?php

class LoadViews
{
    function __construct($views, $data = null)
    {

        require("Config.php");

        if(file_exists("./views/$views"))
        {
          if($views == "Main/home.php"){
            require("./views/Layout/header_welcome.php");
          }else
          {
            require("./views/Layout/header_welcome.php");
          }
            
           require("./views/$views");
           require("./views/Layout/footer.php");
        } 

        else
        {
            die("Vista no encontrada.");
        }
    }
}

//$_viewUsuarios = new Views("nombre_vista", "datos");

?>