<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!--header-->
    <?php include("elementos/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php include("elementos/menu.php"); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h3>Nueva Tarea</h3>
                <form class="mb-5" action="nueva.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input class="form-control" name="descripcion" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="estado" required>
                            <option>Pendiente</option>
                            <option>En proceso</option>
                            <option>Completada</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include("elementos/footer.php"); ?>
</body>
</html>