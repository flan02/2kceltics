
//! Este archivo me parece que no pincha ni corta en el sitio web...

<?php

if(isset($data["controller"]))
{
    $controller = $data["controller"];
    $ctr = array();
    $i=0;
    foreach($controller as $c):
        $ctr[$i] = $c;
        $i++;
    endforeach;
    $r = "resources/icons/";
    $css1 = root("frontend/prepros/","css/normalize.css");
    $css2 = root("frontend/prepros/","css/estilos.css");
   // $css2 = root("draft/prepros","css/estilos.css");
    
   $favicon = root( $r,"2kceltics_favicon32x32.png");
    $icon_gift = root($r,"gift.svg");
    $icon_cart = root($r,"store-solid.svg");
    
    $menu = get( $ctr[0], "menu");
    $fullgames = get( $ctr[1], "fullgames");
    $roster = get($ctr[1], "roster");
    $team = get( $ctr[1], "team");
    $articles = get( $ctr[1], "articles");
    $js = root("frontend/js/","btn_menu.js");

}else{
    die("error 504");
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css1; ?>" />
    <link rel="stylesheet" href="<?php echo $css2; ?>" />
    <link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
    <title>2kceltics</title>
</head>

<body>