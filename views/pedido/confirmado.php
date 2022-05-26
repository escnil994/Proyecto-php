<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>

    <p>Tu pedido ha sido guardado con exito, una vez completes la transferencia bancaria a la cuenta del BAC
        CREDOMATIC<strong>(116769035)</strong> con el coste del pedido, será
        procesado y enviado</p>

    <br>
    <br>

    <?php if ($_pedido): ?>
        <h3>Datos del pedido:</h3>


        Numero de pedido: <?= $_pedido->id ?> <br>
        Total a pagar: <?= $_pedido->coste ?><br>
        Productos:
        <table>
            <th>imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Total</th>
            <?php while ($producto = $productByPedido->fetch_object()): ?>

                <tr style="border-bottom: 1px dashed black; border-right: 1px solid black;">
                    <td class="_details"><img src="<?= base_url ?>files/products/<?= $producto->imagen ?>" width="25"
                                              alt=""></td>
                    <td class="_details"><?= $producto->nombre ?></td>
                    <td class="_details">$ <?= number_format($producto->precio, 2) ?></td>
                    <td class="_details"><?= $producto->unidades ?></td>
                    <td class="_details">$ <?= number_format($producto->precio * $producto->unidades, 2); ?></td>

                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

<?php else: ?>

    <h1>Tu pedido no ha podido completarse</h1>

    <p>Intenta nuevamente, tu pedido no se pudo completar</p>

<?php endif; ?>