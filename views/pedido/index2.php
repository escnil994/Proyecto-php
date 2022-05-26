
<?php if (isset($_SESSION['logged_in'])) : ?>
    <h1>Continuar con el pedido</h1>

    <a href="<?=base_url?>carrito/index">Ver los productos y el total del pedido</a>

    <br>
    <br>

    <h3>Dirección para el envío</h3>

    <form action="<?=base_url?>pedido/save" method="POST">
        <div class="col-md-6">
            <label for="depto">Departamento seleccionado: </label>
            <input type="text" name="depto" id="depto" value="<?=$dep->DepName?>" >
            <label for="municipio">Selecciona un municipio: </label>
            <select  name="municipio" id="municipio">
                <option selected>No selected</option>
                <?php while ($muns = $mun->fetch_object()):?>
                    <option value="<?=$muns->ID?>"><?= $muns->MunName ?></option>
                <?php endwhile; ?>
            </select>

            <label for="direccion">Escribe tu direccion: </label>
            <textarea name="direccion" id="direccion" cols="30" rows="10"></textarea>

            <label for="payment">Selecciona el tipo de pago: </label>
            <select  name="payment" id="payment">
                <option value="0" selected>Contado (contra entrega)</option>
                <option value="1">Tarjeta</option>
            </select>


            <input type="submit" value="Procesar y finalizar">
        </div>

    </form>
<?php else: ?>

    <h1>Necesitas estar indentificado</h1>
    <p>Debes estar logueado en la web para poder realizar tu pedido.</p>

<?php
endif;
?>
