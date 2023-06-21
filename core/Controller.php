<?php
# NUCLEO PRINCIPAL DE CONTROL DE CONTROLADORES, todos los controladores
# que creemos HEREDARAN esta clase
# Con esta estructura de URL se van a ir llamando los Controladores
# http://databasketball.com/index.php?controller=controlador_llamado&action=metodo_llamado



class Controller
{
    function __construct()
    {        
        if($_GET && isset($_GET["action"]))   // validamos si la accion existe
        {
            $action = $_GET["action"]; //paso por url el nombre del metodo a ejecutar

            if(method_exists( $this, $action))  // verificamos si existe el metodo
            {
                $this->$action($data = null);   // llamamos al metodo dinamico y se ejecuta en
                                    // la clase que lo vaya a heredar
            }
            else
            {
                die("Pagina no encontrada.");
            }
        }
        else
        { 
            $index = "index";
            if(method_exists( $this, $index))
            {
                $this->$index();  // metodo x defecto sino existe la accion
            }
            else
            {
                die("Indice no definido.");
            }               
        }




    }


}

/* 


        if($_GET && isset($_GET["game"]))   // validamos si la accion existe
        {
            $game = $_GET["game"]; //paso por url el nombre del metodo a ejecutar

            if(method_exists( $this, $game))  // verificamos si existe el metodo
            {
                $this->$game();   // llamamos al metodo dinamico y se ejecuta en
                                    // la clase que lo vaya a heredar
            }
            else
            {
                die("Partido no encontrado.");
            }
        }
        else
        { 
            $index = "index";
            if(method_exists( $this, $index))
            {
                $this->$index();  // metodo x defecto sino existe la accion
            }
            else
            {
                die("Indice no definido.");
            }               
        }

*/

?>