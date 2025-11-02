<?php
require_once("utils.php");
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
        $descripcion = trim($_POST["descripcion"]);
        $estado = trim($_POST["estado"]);

        if (guardarTarea($descripcion, $estado)) {
            echo "<div class='alert alert-success'>✅A tarea foi gardada correctamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>❌ Error: Houbo un erro gardando a tarea</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>⚠️ No se recibieron datos del formulario.</div>";
    }
    ?>
</main>

<?php include("elementos/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
