<h1>Crear  nuevo producto</h1>

<div id="crear">
    <form action="<?=base_url?>producto/save" method="post" enctype="multipart/form-data">
        <label for="product_name">Nombre</label>
        <input type="text" name="product_name">
        <label for="product_description">Descripción</label>
        <textarea type="text" name="product_description"></textarea>
        <label for="product_category">Categoria a la que pertenece</label>
        <select name="product_category" id="product_category">
            <option value="0">Desconocida</option>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?=$cat->id?>"><?= $cat->nombre ?></option>
            <?php endwhile; ?>
        </select>
        <label for="product_price">Precio</label>
        <input type="number" min="1" step="any" name="product_price">
        <label for="product_offert">Oferta</label>
        <input type="number" name="product_offert">
        <label for="product_stock">Cantidad disponible</label>
        <input type="number" name="product_stock">


        <br><br>
        <div class="file-select" id="src-file1" >
            <input type="file" name="product_image" aria-label="Archivo">
        </div>


        <br>
        <br>
        <br>
        <br>

        <input type="submit" class="btn btn-primary" value="Guardar producto">
    </form>

</div>
