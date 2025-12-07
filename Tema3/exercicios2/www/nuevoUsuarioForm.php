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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Dar de alta a un nuevo usuario</h2>
                </div>
                <div class="container">
                    <form method="post" action="<?php echo htmlspecialchars('./nuevoUsuario.php');?>">
                        Nombre de usuario: <input type="text" name="nombreUsuario" required>
                        <br><br>
                        Nombre: <input type="text" name="nombre" required>
                        <br><br>
                        Apellidos: <input type="text" name="apellidos" required>
                        <br><br>
                        Contraseña: <input type="text" name="contrasena" required>
                        <br><br>


                    <button type="submit">Dar de alta</button>
                 
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include("elementos/footer.php"); ?>
</body>
</html>