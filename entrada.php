<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>

<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);
if (!isset($entrada_actual['id'])) {
    header("location: index.php");
}
?>
<?php require_once 'includes/cabecera.php' ?>

<div class="container ">
    <div class="row">
        <div class="col-md-8 bg-light shadow p-4 mb-4 bg-white rounded">
            <div class="principal container">

                <h1 class="text-center text-primary"> <?= $entrada_actual['titulo'] ?></h1>
                <h2 class="text-warning"> <?= $entrada_actual['titulo'] ?></h2>
                <h4 class="text-info"> <?= $entrada_actual['fecha']  ?> |<?= $entrada_actual['usuario'] ?></h4>
                <p>
                    <?= $entrada_actual['descripcion'] ?>
                </p>

            </div>
            <?php if (isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>

                <a href="editar-entrada.php?id=<?= $entrada_actual['id'] ?>" class="btn btn-success">Editar entrada</a>
                <a href="borrar-entrada.php?id=<?= $entrada_actual['id'] ?>" class="btn btn-danger">Eliminar entrada</a>
            <?php endif; ?>
        </div>
        <?php require_once 'includes/lateral.php' ?>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</div>