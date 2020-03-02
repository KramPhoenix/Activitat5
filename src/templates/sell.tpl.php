<?php
include 'header.tpl.php'; ?>

<section class="sell">
    <form class="form" action="/property/new_property" method="post">
        <h2>Introduce los datos correspondientes para poner una propiedad en venta</h2>
        <label for="title">Nombre: </label><input type="text" placeholder="Nombre de la propiedad" name="title">
        <label for="price">Precio: </label><input type="text" placeholder="Precio de la propiedad" name="price">
        <label for="description">Descripción: </label><input type="text" placeholder="Descripción de la propiedad" name="description">
        <input type="hidden" name="token" value="<?= \Rentit\Session::get('token')?>">
        <button type="submit">CREAR</button>
    </form>
</section>
