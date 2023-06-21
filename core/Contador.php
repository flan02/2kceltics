<?php
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

   
?>