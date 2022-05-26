
<h1>Producto a eliminar</h1>

<div class="product delete">
    <p>Nombre: </p>
    <h2 class="elim">
        <?= $product->nombre ?>
    </h2>
    <p>Descripción: </p>
    <h4>
        <?= $product->descripcion ?>
    </h4>
    <p>Precio: </p>
    <h3>
        <?= $product->precio ?>
    </h3>

    <p>Disponibles: </p>
    <h3>
        <?= $product->stock ?>
    </h3>

    <p>Oferta: </p>
    <h3>
        <?= $product->oferta ?>
    </h3>

    <p>Fecha de cración: </p>
    <h4>
        <?= $product->fecha ?>
    </h4>

    <p>Imagen de producto: </p>
    <div>
        <img class="image_edit" src="<?= base_url ?>/files/products/<?= $product->imagen ?>"
             alt="Imagen del producto">
    </div>
</div>

<div class="product delete-sure">
    <h3>¿Estas seguro de querer eliminar este producto?</h3>

    <a href="<?=base_url?>producto/gestion" class="btn btn-success button small-button">
        No, no quiero eliminar
    </a>


    <a href="<?=base_url?>producto/edit&product=<?=$product->id?>&name=<?=$product->nombre?>&desc=<?=$product->descripcion?>" class="btn btn-warning button small-button m-5">
        No, solo quiero Editarlo
    </a>


    <p>Rcuerda que si das click en eliminar ya no podras cambiar de desición, y no podras recuperar el archivo</p>
    <a href="<?=base_url?>producto/delete&product=<?=$product->id?>&name=<?=$product->nombre?>&desc=<?=$product->descripcion?>&img=<?=$product->imagen?>" class="btn btn-danger button small-button" id="del">
        Si, quiero eliminarlo
    </a>


</div>












