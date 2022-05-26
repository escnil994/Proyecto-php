<html lang="es">
<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="<?=base_url?>assets/awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>

</head>

<body>

<div class="contenido">
    <!--CABECERA-->
    <header id="header">
        <div id="logo">
            <img src="<?=base_url?>assets/img/camiseta.png" alt="Logo Camiseta">
            <a href="<?=base_url?>index.php">
                Tienda de Ropa
            </a>
        </div>
    </header>


    <!--MENU-->

    <?php $categorias = Utils::showCategorias(); ?>
    <nav id="menu">
        <ul>
            <li>
                <a href="<?=base_url?>index">Inicio</a>
            </li>

            <?php while ($cat = $categorias->fetch_object()) : ?>
                <li>
                    <a href="<?=base_url?>categoria/showProduct&product=<?=$cat->id?>&category=<?=$cat->nombre?>"><?=$cat->nombre?></a>
                </li>
            <?php endwhile; ?>
                
                
                

        </ul>
                                 

    </nav>





    <div id="content">