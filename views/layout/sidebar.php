
<!--BARRA LATERAL-->
<aside id="lateral">
    <div class="block_aside">
        <?php if (!isset($_SESSION['logged_in'])) :
        $stats = Utils::statsCarrito();
        ?>
        <div class="card">
            <ul>
                <li>
                    <a class="nav-link" href="<?=base_url?>carrito/index">
                        <strong class="text-danger " >
                            <?php
                            if ($stats['count'] > 0){
                                echo "(".$stats['count'].")";
                            }
                            ?>
                        </strong>CARRITO</a>
                </li>
            </ul>

        </div>

        <?php
        endif;
        ?>


    </div>
    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['logged_in'])) : ?>
        <h3>Entrar a la Web</h3>
        <form action="<?=base_url?>usuario/login" method="post" class="form_container">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Entrar">
        </form>
        <?php else: ?>
            <h3 class="green_alert">Estas logueado como: <?=$_SESSION['logged_in']->nombre ?> <?= $_SESSION['logged_in']->apellidos?></h3>

        <?php endif; ?>

        <ul>

            <?php if (isset($_SESSION['admin'])) : ?>

            <div class="card">
                <li>
                    <a class="nav-link" href="<?=base_url?>categoria/index">Gestionar categorias</a>
                </li>
                <li>
                    <a class="nav-link" href="<?=base_url?>producto/gestion">Gestionar productos</a>
                </li>
                <li>
                    <a class="nav-link" href="#">Gestionar pedidos</a>
                </li>
                <li>
                    <a class="nav-link" href="<?=base_url?>usuario/logout">Cerrar Sesión</a>
                </li>
            </div>


            <?php endif; ?>


            <?php
                $stats = Utils::statsCarrito();
                if (isset($_SESSION['logged_in']) && !isset($_SESSION['admin'])):
                    ?>
            <div class="card">

                    <li>
                        <a class="nav-link" href="<?=base_url?>carrito/index">
                            <strong class="text-danger " >
                                <?php
                                if ($stats['count'] > 0){
                                    echo "(".$stats['count'].")";
                                }
                                ?>
                            </strong>Ir a mi carrito</a>
                    </li>
                    <li>
                        <a class="nav-link" href="">Gestionar pedidos</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=base_url?>usuario/logout">Cerrar Sesión</a>
                    </li>
            </div>

                <?php elseif(empty($_SESSION['logged_in'])):?>

                <li>
                    <a class="nav-link" href="<?=base_url?>usuario/registrar">Registrate aquí</a>
                </li>

            <?php endif;?>
        </ul>

    </div>
</aside>




<!--CONTENIDO CENTRAL-->
<div id="central">