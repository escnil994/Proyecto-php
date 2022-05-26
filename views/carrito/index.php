<h1>Carrito de compras</h1>


<a href="<?= base_url ?>carrito/delete" class="btn btn-secondary float-right text-white m-3">Vaciar el carrito</a>

<table >
    <tr style="border-bottom: 1px solid black; border-right: 1px solid black">
        <th >imagen</th>
        <th>Nombre</th>
        <th>Talla</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Total</th>
        <th>Opciones</th>
    </tr>


    <?php
    if (!empty($carrito)):
        foreach ($carrito as $indice => $producto):
            ?>
            <?php if ($producto['unidades'] >= 1) : ?>
                <tr style="border-bottom: 1px dashed black; border-right: 1px solid black;">
                    <td class="_details"><img src="<?= base_url ?>files/products/<?= $producto['imagen'] ?>" width="25" alt=""></td>
                    <td class="_details"><?= $producto['product_name'] ?></td>
                    <td class="_details"><?= $producto['talla'] ?></td>
                    <td class="_details">$ <?= number_format($producto['precio'], 2) ?></td>
                    <td class="_details"><?= $producto['unidades'] ?></td>
                    <td class="_details">$ <?= number_format($producto['precio'] * $producto['unidades'], 2); ?></td>
                    <td class="_details">
                        <a href="<?= base_url ?>carrito/removeOne&product=<?= $producto['id_producto'] ?>&talla=<?= $producto['talla'] ?>&cantidad=<?= $producto['unidades'] ?>"  class="" >Quitar unidades</a>
                        <br>
                        <a href="<?= base_url ?>carrito/removeAll&product=<?= $producto['id_producto'] ?>&talla=<?= $producto['talla'] ?>&cantidad=<?= $producto['unidades'] ?>"  class=""  >Eliminar</a>
                    </td>
                </tr>



                <?php
            endif;
        endforeach;
    endif;
    ?>


</table>

<?php if (empty($carrito)) { ?>
    <h4>No se han agregado productos al carrito</h4>
<?php } else {
    $stats = Utils::statsCarrito();
    ?>
    <br><!-- <br> -->
    <br>
        <h4>Total a pagar: $ <?=number_format($stats['total'], 2);?></h4>


        <a href="<?= base_url ?>pedido/add" class="btn btn-primary float-right text-white m-3">Completar pedido</a>
        

<?php } ?>



