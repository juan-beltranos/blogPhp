<?php require_once 'includes/helpers.php' ?>
<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php' ?>


<div class="container ">
    <div class="row">
        <div class="col-md-7">
            <div id="register" class="card shadow p-3 mb-5 bg-white rounded">

                <form action="actualizar-usuario.php" method="POST" class="card-body">
                    <h3 class="card-title text-center"> Mis datos</h3>

                    <!-- mostrar errores -->
                    <?php if (isset($_SESSION['completado'])) : ?>
                        <div class="bg-success text-center">
                            <?= $_SESSION['completado'] ?>
                        </div>
                    <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                        <div class="bg-danger text-center">
                            <?= $_SESSION['errores']['general'] ?>
                        </div>
                    <?php endif; ?>
                    <!-- Cerrar mostrar errores -->
                    <label for="nombre">Nombres:</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $_SESSION['usuario']['nombre']; ?>">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                    <label for="apellido">Apellidos:</label>
                    <input type="apellido" name="apellidos" class="form-control" value="<?= $_SESSION['usuario']['apellidos']; ?>">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="<?= $_SESSION['usuario']['email']; ?>">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
                    <br>
                    <input type="submit" name="submit" value="Actualizar" class="btn btn-warning btn-block">
                </form>
                <?php borrarErrores(); ?>
            </div>
        </div>
        <div class="col-md-1"></div>
        <?php require_once 'includes/lateral.php' ?>
    </div>




</div>


<?php require_once 'includes/footer.php'; ?>