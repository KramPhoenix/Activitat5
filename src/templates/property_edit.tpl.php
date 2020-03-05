<?php
include 'header.tpl.php';
?>

<section class="login">
    <form class="form" action="/property/update" method="post">
        <h2>Introduce tus datos para acceder</h2>
        <label for="email">Nombre: </label><input type="text" placeholder="Nombre del inmueble" name="nombre">
        <label for="passwd">Descripcion: </label><input type="text" placeholder="Descripcion del inmueble" name="desc">
        <label for="price">Precio: </label><input type="text" placeholder="Precio del inmueble" name="precio">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit">Guardar</button>
    </form>
</section>
