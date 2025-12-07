<?php
require './lib/utils.php';
require './lib/pdo.php';

?>
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

                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $nombreUsuario = test_input($_POST["nombreUsuario"]);
                    $nombre = test_input($_POST["nombre"]);
                    $apellidos = test_input($_POST["apellidos"]);
                    $contrasena = encriptarContrasinal(test_input($_POST["contrasena"]));

                    list($conexion, $mensaxe)=get_conexion_pdo();
                    if($conexion != null){
                        echo $mensaxe;
                        list($resultado, $mensaxe)= insertar_usuario($conexion, $nombreUsuario, $nombre, $apellidos, $contrasena);
                        echo $mensaxe;


                    }else{
                        echo $mensaxe;
                    }

                    
                }

                ?>

        
                   
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include("elementos/footer.php"); ?>
</body>
</html>