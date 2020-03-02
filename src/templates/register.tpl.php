<?php
include 'header.tpl.php'; ?>

<section class="login">
    <form class="form" action="/user/signup" method="post">
        <h2>Introduce los datos para registrarte</h2>
        <label for="email">Email: </label><input type="text" placeholder="Email" name="email">
        <label for="passwd">Contraseña: </label><input type="password" placeholder="Introduce la contraseña" name="passwd">
        <label for="passwd">Repetir Contraseña: </label><input type="password" placeholder="Repite la contraseña" name="passwd2">
        <label for="phone">Teléfono:</label><input type="tel" placeholder="Teléfono fijo o móbil" name="phone">
        <input type="hidden" name="token" value="<?= \Rentit\Session::get('token')?>">
        <button type="submit">Sign Up</button>
        <p>Ya estás registrado? Accede a tu cuenta desde <a href="/user/login">AQUÍ</a></p>
    </form>
</section>
