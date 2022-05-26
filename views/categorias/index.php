<h1>Gestionar categorias</h1>




<a href="<?=base_url?>categoria/crear" class="btn-success button small-button">Crear Categoría</a>

<table>
        <tr class="aaaa">
            <th>ID</th>
            <th>NOMBRE</th>
        </tr>

    <?php while ($cat = $categories->fetch_object()): ?>

            <tr>
                <td>
                    <a class="_details" style="text-decoration: none;" href="<?=base_url?>"><?= $cat->id ?></a>
                </td>
                <td>
                    <a class="_details" href="<?=base_url?>"><?= $cat->nombre ?></a>
                </td>
            </tr>
    <?php endwhile; ?>
</table>

