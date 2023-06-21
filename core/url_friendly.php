<?php
// aca almacenamos el nombre de las url a las que el usuario se dirige durante su navegacion

class Route {  // declaramos la clase en php

    private $basepath;   // declaramos las variables que utilizaremos a lo largo de la clase
    private $uri;
    private $base_url;
    private $routes;
    private $route;
    private $params;     // almacena c/elem del query string y su valor como un arreglo asociativo
    private $get_params; // indica a la clase o enrutador "Route" q deseamos o no utlizar query string
   
    function __construct( $get_params = false){  // indica si queremos un query string en nuestro proyecto

        $this->get_params = $get_params;
    }


    public function getRoutes(){   /* convierte nuestra cadena de caracteres o query string en una matriz
        o array unidimensional que podamos utilizar de forma dinámica. Metodo a invocar p/ utilizar los parametros */

/* como tenemos nuestra ruta vamos a incluirla en el nuevo metodo p/ procesar la URL */
       $this->base_url = $this->getCurrentUri();  

/* separamos todos los param, q ya vienen separados por / , y sera nuestra rutas o los nodos de nuestra ruta */
       $this->routes = explode('/', $this->base_url);

       $this->getParams();  // invocamos el nuevo metodo

/* los retornamos p/ utilizarlo a lo largo de nuestra aplicacion o sitio web */
       return $this->routes;  

   }


    private function getCurrentUri()   // captura la URL actual del navegador
    {
    /* capturamos la URL del navegador q es la ruta relativa completa desde la raíz de documentos */ 
        $this->basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        
    /* /index.php?modulo=x&seccion=y entonces separamos lo que es ruta real de lo que son parámetros */
        $this->uri = substr($_SERVER['REQUEST_URI'], strlen($this->basepath));
    
    if($this->get_params)
    {
        $this->getParams();
    }else{
        /*  Si existe el caracter “?” es un query string, lo removemos y todo lo que esté a la derecha, 
    pq esperamos una ruta de tipo /name1/name2/, limpiamos lo q no sea “User Friendly” */
        if( strstr($this->uri, '?')) $this->uri = substr( $this->uri, 0, strpos($this->uri, '?'));
    }
        
    /* tenemos todos los elementos como un string único, limpiamos cualquier espacio en blanco antes y después */
        $this->uri = '/'. trim($this->uri, '/');

    // retornamos el query string
        return $this->uri;   

    }

    private function getParams(){   // procesa el query string y lo convierte en array, a partir del caracter ?

        if (strstr ($this->uri, '?'))
        {
            $params = explode("?", $this->uri);
            $params = $params[1];

            parse_str($params, $this->params);
            $this->routes[0] = $this->params;
            array_pop($this->routes);
        }
    }   
}

$routes = new Route(true);
$route = $routes->getRoutes();
// print_r($route);   // $route[i] -> es un array que almacenara los valores de todos los variables que sean pasadas por URL
$url = array();
$i = 1;

/* var_dump($route);
echo "<br>";*/

foreach( $route as $param=>$value)
{
    if(!is_array($value))
    {
        if($value != "ALL" && !empty($value))
            {
       /* echo $value;
        echo "<br>";*/
        $url[0] = $value;
            }
    }else{
        foreach($value as $k=>$v)
        {
            if($k != "ALL")
            {
           /*    echo $k . " --- " . $v;
                echo "<br>"; */
                $url[$i] = $value;
            }
          
        }
    }


   
}

// var_dump($url);   // aca tenemos alcenadas las url con sus claves y valores por si necesitamos manipularlas desde php




/*
no solo podemos utilizar el enrutador como una clase re-utilizable en nuestro proyecto y otros proyectos, sino que también podemos utilizar 
query string tradicional para capturar valores o parámetros que no tiene que ver que con el enrutamiento, por ejemplo, atributos de artículos 
para una tienda como lo hace Amazon.com o para opciones de contenido o configuraciones en cualquier tipo de aplicación que necesite pasar valores 
para ser procesados en una nueva vista, formulario o pantalla
*/
?>