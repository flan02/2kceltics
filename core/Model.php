<?php
// ESTE ARCHIVO DEBEMOS INCLUIRLO EN EL INDEX PRINCIPAL
class Model
{
    public $conexion = null;  //almacena la conexion

    function __construct()
    {
        try
        {
            $this->conexion = $this->getConnection();

        }
        catch(PDOException $e)
        {
            die("You got the next error: " . $e->getMessage());
        }
    }




    private function getConnection()
    {
        $_geoplugin = new geoPlugin();
        $_geoplugin->locate();
        $ip = $_geoplugin->ip;

        if($ip == "127.0.0.1" || $ip == "::1"){
        $host = "127.0.0.1";
        $user = "root";
        $pass = "root";
        $database = "celtics";
        $charset = "utf8";
        } else {
            $host = "109.106.251.151";
            $user = "u505192495_2kceltics";
            $pass = "4815162342cdav?.GREENS";
            $database = "u505192495_celtics";
            $charset = "utf8";
        }

        $opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new PDO("mysql:host={$host};dbname={$database}; charset={$charset}", $user, $pass, $opt);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->db = $pdo;

        return  $this->db;
    }
}

?>