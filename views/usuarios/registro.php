<h1>Registrarse</h1>
<?php if (isset($_SESSION['register']) && $_SESSION['register']=='completed') : ?>
<strong class="green_alert">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register']=='failed'):?>
    <strong class="red_alert" >El registro a fallado, intente de nuevo</strong>
<?php endif;?>

<?php
    Utils::deleteSession('register');
?>

<form action="<?=base_url?>usuario/save" method="POST">

    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" required>

    <label for="last_name">Apellido</label>
    <input type="text" name="last_name" id="last_name" required>

    <label for="email">Correo</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" >

    <input type="submit" value="Registrarse" required>

</form>