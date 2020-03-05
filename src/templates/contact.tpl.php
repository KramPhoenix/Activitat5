<?php
include 'header.tpl.php'; ?>

<section class="login">
    <form class="form" action="" method="post">
        <h2>Contacta con nosotros para recibir más información</h2>
        <label for="email">Nombre: </label><input type="text" placeholder="Tu nombre" name="nombre">
        <label for="passwd">Email: </label><input type="text" placeholder="Tu email" name="email">
        <label for="info">Información: </label><textarea cols="5" rows="5" placeholder="Describe tu problema"></textarea>
        <button type="submit">Enviar</button>
    </form>
</section>
