<div class="col-md-4 py-4">

    <div id="login" class="card shadow p-3 mb-5 bg-white rounded">

        <form action="buscar.php" method="POST" class=" card-body">
            <h3 class="card-title text-center">Buscar</h3>

            <label for="text" class="">Buscar:</label>
            <input type="text" name="busqueda" class="form-control">
            <br>
            <input type="submit" value="Buscar" class="btn btn-warning btn-block">
        </form>
    </div>

    <?php if (isset($_SESSION['usuario'])) : ?>
        <div id="login" class="card shadow p-3 mb-5 bg-white rounded text-center">
            <h3><i class="fas fa-hand-sparkles">Bienvenido,</i> <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>
            <!--Botones-->
            <a href=crear-entradas.php class="btn btn-info"> Crear entradas</a>
            <a href="crear-categoria.php" class="btn btn-primary"> Crear categoria</a>
            <a href="mis-datos.php" class="btn btn-warning"> Mis datos</a>
            <a href="cerrar.php" class="btn btn-danger"> Cerrar Sesion</a>
        </div>

    <?php endif; ?>


    <?php if (!isset($_SESSION['usuario'])) : ?>



        <div id="login" class="card shadow p-3 mb-5 bg-white rounded">

            <form action="login.php" method="POST" class=" card-body">
                <h3 class="card-title text-center">Identificate</h3>

                <?php if (isset($_SESSION['error_login'])) : ?>
                    <div id="login" class="bg-danger text-center">
                        <?= $_SESSION['error_login']; ?>
                    </div>

                <?php endif; ?>

                <label for="email" class="">Email:</label>
                <input type="email" name="email" class="form-control">

                <label for="password">Contraseña:</label>
                <input type="password" name="password" class="form-control">
                <br>
                <input type="submit" value="Entrar" class="btn btn-warning btn-block">
            </form>
        </div>

        <div id="register" class="card shadow p-3 mb-5 bg-white rounded">

            <form action="registro.php" method="POST" class="card-body">
                <h3 class="card-title text-center"> Registrate</h3>

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
                <input type="text" name="nombre" class="form-control">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="apellido">Apellidos:</label>
                <input type="apellido" name="apellidos" class="form-control">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" class="form-control">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
                <br>
                <input type="submit" name="submit" value="Registrar" class="btn btn-warning btn-block">
            </form>
            <?php borrarErrores(); ?>
        </div>
    <?php endif; ?>
</div>
</div>