<?php

if (!isset($_POST['busqueda'])) {
    header("Location: index.php");
}

?>
<?php require_once 'includes/cabecera.php' ?>

<div class="container ">
    <div class="row">
        <div class="col-md-8 bg-light shadow p-4 mb-4 bg-white rounded">
            <div class="principal container">

                <h1 class="text-center text-primary">Busqueda: <?= $_POST['busqueda'] ?></h1>

                <?php
                $entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);

                if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
                    while ($entrada = mysqli_fetch_assoc($entradas)) :
                ?>
                        <article class="entrada">
                            <a href="entrada.php?id=<?= $entrada['id'] ?>" class="text-decoration-none">
                                <h2 class="text-warning"><i class="fas fa-gamepad"></i><?= $entrada['titulo'] ?></h2>
                                <spanclass="text-info"><i class="fas fa-calendar-times"></i> <?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                                    <p>
                                        <?= substr($entrada['descripcion'], 0, 180) . "..." ?>
                                    </p>
                            </a>
                        </article>
                    <?php
                    endwhile;
                else :
                    ?>
                    <div class="bg-danger"> No hay entradas en esta categoria</div>
                <?php
                endif;
                ?>
            </div>
        </div>

        <?php require_once 'includes/lateral.php' ?>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>