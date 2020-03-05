<?php

use Rentit\Session;

?>

<html lang="es">
    <head>
        <link rel="stylesheet" type="text/css" href="/public/css/header.css">
        <link rel="stylesheet" type="text/css" href="/public/css/login.css">
        <link rel="stylesheet" type="text/css" href="/public/css/sell.css">
        <link rel="stylesheet" type="text/css" href="/public/css/property.css">
        <link rel="stylesheet" type="text/css" href="/public/css/default.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <title>Rentit - Immobiliaria de Gava</title>
    </head>

    <body>
        <header>
            <a href="/"><h1>RENTIT</h1></a>
            <ul>
                <li><a href="/property">COMPRAR</a></li>
                <li><a href="/contact">CONTACTO</a></li>
                <?php if(Session::get('logged') == false){?>
                    <li><a href="/user/login"><i class="fas fa-user fa-2x"></i></a></li>
                <?php } ?>
                <?php if(Session::get('logged') == true) { ?>
                    <li><a href="/property/sell">VENDER</a></li>
                    <li><a href="/property/myproperties">MIS PROPIEDADES</a></li>
                    <li><a href="/user/destroy"><i class="fas fa-power-off fa-2x"></i></a></li>
                <?php } ?>
            </ul>
        </header>
    </body>
</html>
