<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php' ?>

<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div id="principal">
                <h1 class="text-center">Crear Categorias</h1>
                <p class="text-center">Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus categorias</p>
                <form action="guardar-categoria.php" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" name="nombre" placeholder="Nombre de la categoria" class="form-control form-group">
                            <input type="submit" value="Guardar" class="btn btn-primary ">
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <?php require_once 'includes/lateral.php' ?>
    </div>
    <?php require_once 'includes/footer.php'; ?>