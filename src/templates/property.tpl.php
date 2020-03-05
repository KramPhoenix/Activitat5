<?php
include 'header.tpl.php';
?>


<section class="properties">

    <?php foreach ($properties as $property){ ?>
        <div class="property">
            <h1><?php echo $property->title ?></h1>
            <img src="/public/img/casa1.jpg">
            <p><?php echo $property->description ?></p>
            <h3>PRECIO: <?php echo $property->price ?> €</h3>
            <button>COMPRAR</button>
        </div>
    <?php } ?>
</section>