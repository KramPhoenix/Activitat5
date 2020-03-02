<?php
include 'header.tpl.php'; ?>

<section class="login">
    <form class="form" action="/user/signin" method="post">
        <h2>Introduce tus datos para acceder</h2>
        <label for="email">Email: </label><input type="text" placeholder="Email" name="email">
        <label for="passwd">Contraseña: </label><input type="password" placeholder="Password" name="passwd">
        <input type="hidden" name="token" value="<?= \Rentit\Session::get('token')?>">
        <button type="submit">Sign In</button>
        <p>Create an <a href="/user/register">account</a></p>
    </form>
</section>