<?php

  require "./lib/base_datos.php";
?>
<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenda</title>
    <link rel="stylesheet" href="./style/principal.css">
</head>
<body>

<?php
    list($resultado, $conexion) = get_conexion();
    if($resultado){
        echo "<h3> CONEXION </h3>";
        $resultado_creacion = crear_bd_tenda($conexion);
        if($resultado_creacion){
            echo "<h3> Creouse a BD ou xa estaba creada </h3>";
            $resultado_taboa= crear_taboa_usuarios($conexion);
            if($resultado_taboa){
                  echo "<h3> Creouse a taboa  </h3>";

            }else{
                  echo "<h3> Non puido crearse a taboa </h3>";
            }
        }else{
            echo "<h3> Non se puido crear a BD </h3>";
        }

    }else{
         echo "<h3> NON  </h3>";
    }

?>

<?php
    include_once("./includes/header.php");
?>
    
    

    <p>
        <button>Dar de alta usuario</button>
        <button>Lista de usuarios</button>
    </p>


<?php
    include_once("./includes/footer.php");
?>
    
</body>
</html>