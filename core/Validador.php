<?php

function validarDato(string $dato):int
{
    return preg_match( "/^\d{4}-?\d{4}$/", $$dato);
}

function verificarDato(array $datos):array
{
    $datoInvalido = [];
    $i = 0;

    foreach( $datos as $dato)
    {
        if(!validarDato($dato))
        {
            $datoInvalido[$i] = $dato;
            $i++;
        }
    }

    return $datoInvalido;
}

function validarString(string $string)  
{       // podemos armar algo p/evitar inyeccion sql
    if(strlen($string)) // verificamos q solo se escriban letras
    {
        return preg_match("/^[a-zA-Z]+$/", $string);   
    }
}

?>