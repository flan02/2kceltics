<?php
/* Clase basica para administrar sesiones
_DISABLED = 0 / _NONE = 1 / _ACTIVE = 2
*/

class Session
{
    public function init()   
    {
        session_start();
    }

    public function add( $key, $value)   // param1 la llave del array de sesion, param2 valor p/ el elem de la sesion
    {
        $_SESSION[$key] = $value;
    }

    public function get_session($key)
    {
        $get_session = !empty( $_SESSION[$key] ) ? $_SESSION[$key] : null;

        return $get_session;
    }

    public function getAll()
    {
        $array_session = $_SESSION;

        return $array_session;
    }

    public function remove($key)
    {
        if(!empty($_SESSION[$key]))
        {
            unset($_SESSION[$key]);
        }
    }

    public function close()
    {
        session_unset();
        session_destroy();
    }

    public function get_status()
    {
        $session_status = session_status();
       
        return $session_status;
    }


}

?>