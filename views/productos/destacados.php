
<h1>Últimos Productos</h1>

<?php while ($prod = $products->fetch_object()) : ?>
<div class="product">
    <img src="<?=base_url?>files/products/<?= $prod->imagen; ?>" alt="Camiseta azul">
    <div x="80" y="10" writing-mode="tb" glyph-orientation-vertical="0" class="text-js"><?= $prod->oferta ?>% de descuento</div>
    <h2><?= $prod->nombre; ?></h2>
    <del>$  <?= number_format($prod->precio,2); ?></del>
    <p>$  <?= number_format($prod->precio - ((($prod->precio)/100) * $prod->oferta), 2); ?></p>
    <a href="<?=base_url?>producto/detail&product=<?=$prod->id?>&name=<?=$prod->nombre?>&desc=<?=$prod->descripcion?>" class="btn-success button">Ver Detalle</a>
</div>

<?php endwhile; ?>




