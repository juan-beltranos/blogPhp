<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>

<?php
$categoria_actual = conseguirCategoria($db, $_GET['id']);
if (!isset($categoria_actual['id'])) {
    header("location: index.php");
}
?>
<?php require_once 'includes/cabecera.php' ?>

<div class="container ">
    <div class="row">
        <div class="col-md-8 bg-light shadow p-4 mb-4 bg-white rounded">
            <div class="principal container">
                <?php
                $categoria = conseguirCategoria($db, $_GET['id'])
                ?>
                <h1 class="text-center text-primary"> Entradas de <?= $categoria_actual['nombre'] ?></h1>

                <?php
                $entradas = conseguirEntradas($db, null, $_GET['id']);
                if (!empty($entradas) && mysqli_num_rows($entradas) >1) :
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
                else :;

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