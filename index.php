<?php

require_once 'includes/cabecera.php' ?>

<div class="container ">
    <div class="row">
        <div class="col-md-8 bg-light shadow p-4 mb-4 bg-white rounded">
            <div class="principal container">
                <h1 class="text-center text-primary">Ultimas Entradas</h1>

                <?php
                $entradas = conseguirEntradas($db, true);
                if (!empty($entradas)) :
                    while ($entrada = mysqli_fetch_assoc($entradas)) :

                ?>
                        <div class="py-1">
                            <a href="entrada.php?id=<?=$entrada['id']?>" class="text-decoration-none">
                                <article class="entrada">
                                    <h2 class="text-warning"><i class="fas fa-gamepad"></i><?= $entrada['titulo'] ?></h2>
                                    <span class="text-info"><i class="fas fa-calendar-times"></i> <?= $entrada['categoria'] . '|' . $entrada['fecha'] ?></span>
                                    <p> <?= substr($entrada['descripcion'], 0, 200) . "..." ?> </p>
                                </article>
                            </a>
                        </div>
                <?php
                    endwhile;
                endif;

                ?>
                <div class="py-2 ">
                   <a href="entradas.php" class="btn btn-primary"> Ver todas las entradas</a>
                </div>
            </div>
        </div>

        <?php require_once 'includes/lateral.php' ?>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>