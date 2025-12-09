<?php
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

<?php



?>
    <!--header-->
    <?php include("elementos/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php include("elementos/menu.php"); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Lista de usuarios</h2>
                </div>
                <div class="container">
                    
                    <div class="bg-dark text-white">
                        <?php
                         if(isset($_GET["id"])){
                            $id = $_GET["id"];
                            list($conexion, $mensaxe)= get_conexion_pdo();
                            echo $mensaxe;
                            if($conexion !=null){
                                list($resultado, $mensaxe)= borrar_usuario($conexion, $id);
                                echo $mensaxe;

                                //TODO: Borrar as tarefas de ese usuario tamén
                            }
                         }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include("elementos/footer.php"); ?>
</body>
</html>