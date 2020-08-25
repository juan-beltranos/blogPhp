<?php require_once 'includes/helpers.php' ?>
<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php' ?>

<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div id="principal">
                <h1 class="text-center">Crear Entradas</h1>
                <p class="text-center">Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido</p>
                <form action="guardar-entrada.php" method="POST">
                    <div class="card">
                        <div class="card-body">

                            <input type="text" name="titulo" placeholder="titulo de la entrada" class="form-control form-group">
                            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
                            <textarea name="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion de la entrada"></textarea>
                            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

                            <label for="categoria"> Categoria:</label>
                            <select name="categoria" class="form-control">
                                <?php $categorias = conseguirCategorias($db);
                                if (!empty($categorias)) :
                                    while ($categoria = mysqli_fetch_assoc($categorias)) :
                                ?>
                                        <option value="<?= $categoria['id'] ?>">
                                            <?= $categoria['nombre'] ?>
                                        </option>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </select>

                            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

                        </div>
                        <input type="submit" value="Guardar" class="btn btn-primary ">
                    </div>
                </form>
                <?php borrarErrores(); ?>
            </div>
        </div>

        <?php require_once 'includes/lateral.php' ?>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</div>