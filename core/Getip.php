<?php

class Getip
{

    private $ip_user;
    private $codeP;
    private $nameP;
    private $lat; 
    private $long;
    private $acc;

    
    function __construct()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP']))    // recogemos la IP de la cabecera de la conexion
        {
            $ipAdress = $_SERVER['HTTP_CLIENT_IP'];

        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  // caso q la IP llega a traves de un Proxy
        {
            $ipAdress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else                                              // caso en q la IP llega a traves de la cabecera de conexion remota
        {                                           
            $ipAdress = $_SERVER['REMOTE_ADDR'];     // existe tmb  $_SERVER['SERVER_ADDR']
         //   $serverDir = $_SERVER['SERVER_ADDR'];  // se usa para consumir APIs y pagos Online
         //   $serverName = $_SERVER['SERVER_NAME'];     www.2kceltics.xyz
         //   $navegador = $_SERVER['HTTP_USER_AGENT'];    navegador que usa el usuario que nos visita
            
        }
        
        return $ipAdress;
    }

   
    public function get_time()
    {
        $hora = time();
        $zonahoraria = $hora - (3*60*60);
        $time = date('m-d-Y h:i:s a', $zonahoraria);
        

        return $time;
    }

    

    public function write_ip($ip_user, $codeP, $nameP, $lat, $long, $acc)
    {
       
     $this->ip_user = $ip_user;
     $this->codeP = $codeP;
     $this->nameP = $nameP;
     $this->lat = $lat;
     $this->long = $long;
     $this->acc = $acc;
     
     $_Getip = new Getip();
    
    //  PARA LABURAR EN EL SERVIDOR
    //$ruta = "/home/u505192495/domains/2kceltics.xyz/public_html/resources/text/user_conn.txt";
    $server_ruta = $_SERVER['DOCUMENT_ROOT'];  //  PARA LABURAR EN LOCALHOST
    $ip = $_SERVER['REMOTE_ADDR'];
    if($ip == '127.0.0.1') $ruta = $server_ruta . "/UniServerZ localhost/framework scylla/2kceltics/resources/text/user_conn.txt";
    else $ruta = "/home/u505192495/domains/2kceltics.xyz/public_html/resources/text/user_conn.txt";
    
    $registro = file_get_contents($ruta, false);
    
    $registro .= $_Getip->get_time() . " > " . $this->ip_user . " > " . $this->codeP . " > " . $this->nameP . " > " . $this->lat . " > " . $this->long . " > " . $this->acc . "\n";
    
    file_put_contents($ruta, $registro);

    }

}

/* ASI PODEMOS HACER UNA ESCRITURA LOGICA DEL ARCHIVO

public function write_ip($ip_user, $codeP, $nameP, $lat, $long, $acc)
{
$this->ip_user = $ip_user;
$this->codeP = $codeP;
$this->nameP = $nameP;
$this->lat = $lat;
$this->long = $long;
$this->acc = $acc;

$time = new Getip();
$ingreso = $time->get_time();
$archivo = "getip.txt";

$f = fopen($archivo, "r"); //abrimos el fichero en modo de lectura
if($f)
{

$data_conn = fread($f, filesize($archivo)); //vemos el archivo de texto
$data_conn .= "Fecha de visita : " . $ingreso ." > ". $this->ip_user . " " . $this->codeP . " " . $this->nameP . " " .
$this->lat . " " . $this->long . " " . $this->acc;

fclose($f);
}

$f = fopen($archivo, "w+");
if($f)
{

fwrite($f, $data_conn);
fwrite($f, "<br>");
fclose($f);
}

return $data_conn;


}
*/
?>