
<?php if (isset($_SESSION['logged_in'])) : ?>
        <h1>Continuar con el pedido</h1>

    <a href="<?=base_url?>carrito/index">Ver los productos y el total del pedido</a>

<h3>Dirección para el envío</h3>
    <form action="<?=base_url?>pedido/getMunicipio" method="POST">
        <div class="col-md-4">
        <label for="departamentos">Departamento</label>
            <select  name="depto" id="depto">
                <option value="000" selected>No selected</option>
                <?php while ($dept = $depto->fetch_object()):?>
                    <option value="<?=$dept->ID?>"><?= $dept->DepName ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-4">
            <input type="submit" value="Continuar...">
        </div>

    </form>
<?php else: ?>

<h1>Necesitas estar indentificado</h1>
<p>Debes estar logueado en la web para poder realizar tu pedido.</p>

<?php
endif;
?>

