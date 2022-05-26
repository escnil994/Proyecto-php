
<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="btn-success small-button button">
    Nuevo Producto
</a>

<table>
    <tr class="aaaa">
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>DISPONIBLES</th>
        <th>Acciones</th>
    </tr>

    <?php while ($prod = $productos->fetch_object()) :?>

        <tr>
        <td class="_details">
            <?=$prod->nombre;?>
        </td>
        <td class="_details">
           $ <?=$prod->precio;?>
        </td>
        <td class="_details">
            <?=$prod->stock;?>
        </td>
        <td class="_details">
            <a href="<?=base_url?>producto/edit&product=<?=$prod->id?>&name=<?=$prod->nombre?>&desc=<?=$prod->descripcion?>"  class="btn-warning button edddd" >Editar</a>
            <a href="<?=base_url?>producto/question&product=<?=$prod->id?>&name=<?=$prod->nombre?>&desc=<?=$prod->descripcion?>"  class="btn-danger button edddd" id="del" >Eliminar</a>
        </td>

    </tr>

    <?php endwhile; ?>
</table>
