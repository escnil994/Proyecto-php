<h1>Mostrando productos por categoría</h1>


<?php if (!$producto || $producto == null || $producto->num_rows == null) {  ?>

    <h5>No se encontraron productos en esta categoría :)</h5>

    <?php

} else {

    ?>


    <?php while ($prod = $producto->fetch_object()) : ?>
        <div class="product">
            <img src="<?= base_url ?>files/products/<?= $prod->imagen; ?>" alt="Camiseta azul">
            <div x="80" y="10" writing-mode="tb" glyph-orientation-vertical="0" class="text-js"><?= $prod->oferta ?>% de
                descuento
            </div>
            <h2><?= $prod->nombre; ?></h2>
            <del>$ <?= number_format($prod->precio, 2); ?></del>
            <p>$ <?= number_format($prod->precio - ((($prod->precio) / 100) * $prod->oferta), 2); ?></p>
            <a href="<?=base_url?>producto/detail&product=<?=$prod->id?>&name=<?=$prod->nombre?>&desc=<?=$prod->descripcion?>" class="btn-success button">Ver Detalle</a>
        </div>

    <?php endwhile; ?>

    <?php

}


?>
