<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog-Video-Juegos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style type="text/css">
        body {
            background-color: #eceaf0;
            background-image: url("data:image/svg+xml,%3Csvg width='64' height='64' viewBox='0 0 64 64' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zm33.414-6l5.95-5.95L45.95.636 40 6.586 34.05.636 32.636 2.05 38.586 8l-5.95 5.95 1.414 1.414L40 9.414l5.95 5.95 1.414-1.414L41.414 8zM40 48c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zM9.414 40l5.95-5.95-1.414-1.414L8 38.586l-5.95-5.95L.636 34.05 6.586 40l-5.95 5.95 1.414 1.414L8 41.414l5.95 5.95 1.414-1.414L9.414 40z' fill='%23b26161' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .fa-gamepad {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <!--Cabecera -->
    <header id=" cabecera " class="container">
        <!-- Image and text -->
        <nav class="navbar  bg-transparent ">
            <a class="navbar-brand text-primary" href="index.php">
                <i class="fas fa-gamepad"> Blog video juegos</i>
            </a>
            <ul class="nav justify-content-center bg-info">
                <li class="nav-item">
                    <a class="nav-link active text-primary" href="index.php">Inicio</a>
                </li>
                <?php
                $categorias = conseguirCategorias($db);
                if (!empty($categorias)) :
                    while ($categoria = mysqli_fetch_assoc($categorias)) :
                ?>
                        <li class="nav-item">
                            <a href="categoria.php?id=<?= $categoria['id'] ?>" class="nav-link text-primary"><?= $categoria['nombre'] ?></a>
                        </li>
                <?php
                    endwhile;
                endif;
                ?>

                <li class="nav-item">
                    <a class="nav-link text-primary" href="#">Contacto</a>
                </li>

            </ul>
        </nav>
        <!--Menu -->


        <!--Fin menu -->
    </header>
    <!--Fin cabecera -->