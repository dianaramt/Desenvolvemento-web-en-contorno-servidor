<?php
require_once("./lib/utils.php");
require_once("./lib/mysqli.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de creación de tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include("elementos/header.php"); ?>
<?php include("elementos/menu.php"); ?>

<main class="container my-4 text-center">
    <h2 class="text-primary mb-4">Resultado</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $descripcion = test_input(trim($_POST["descripcion"]));
        $titulo = test_input(trim($_POST["titulo"]));
        $estado =  test_input(trim($_POST["estado"]));
        $id_usuario =  test_input(trim($_POST["usuario"]));

        list($conexion, $mensaxe) = get_conexion_mysqli();
        if($conexion!=null){
            list($resultado, $mensaxe) = meter_tarefa($conexion, $titulo, $descripcion, $estado, $id_usuario);


        }else{
            //non se puido facer conexion
        }




    

        
    }
    ?>
    <div>
        <?php
        if(isset($resultado)){
            echo $mensaxe;
        }
        ?>
    </div>
</main>

<?php include("elementos/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
