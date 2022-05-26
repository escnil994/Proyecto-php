<h1>Editar producto (<?=$product->nombre?></h1>

<div id="crear">
    <form action="<?=base_url?>producto/edited&product=<?=$product->id?>&photo=<?=$product->imagen?>" method="post" enctype="multipart/form-data">


            <label for="product_name">Nombre</label>
            <input type="text" name="product_name" value="<?=$product->nombre?>">
            <label for="product_description">Descripción</label>
            <textarea type="text" name="product_description"><?=$product->descripcion?></textarea>
            <label for="product_category">Categoria a la que pertenece</label>
            <select name="product_category" id="product_category">
                <option value="<?= $category_product->id ?>"><?=$category_product->nombre?> (actual)</option>
                <?php while ($cat = $categorias->fetch_object()): ?>
                    <option value="<?=$cat->id?>"><?= $cat->nombre ?></option>
                <?php endwhile; ?>
            </select>
            <label for="product_price">Precio</label>
            <input type="number" min="1" step="any" name="product_price" value="<?=$product->precio?>">
            <label for="product_offert">Oferta</label>
            <input type="number" name="product_offert"  value="<?=$product->oferta?>">
            <label for="product_stock">Cantidad disponible</label>
            <input type="number" name="product_stock" value="<?=$product->stock?>">


            <br><br>
        
            <div class="product image_edit_product">
                <img class="image_edit" src="<?=base_url?>/files/products/<?=$product->imagen?>" alt="Imagen del producto">
                
            </div>
        <br>
            <div class="file-select" id="src-file1" >
                <input type="file" name="product_image" aria-label="Archivo">
            </div>




        <input type="submit" value="Editar producto" class="btn btn-primary" style="margin-top: 130px;">
    </form>

</div>