<?php
// CLASE QUE SE OCUPA DE CARGAR EL MODELO QUE DESEEMOS LLAMAR
class LoadModel
{
    function __construct($model)
    {
     require("./models/$model.php");
    //nos permite crear una instancia del modelo
    }
}



?>