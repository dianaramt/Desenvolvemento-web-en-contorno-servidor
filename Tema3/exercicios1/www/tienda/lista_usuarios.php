<?php
require "./lib/base_datos.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenda</title>
    <link rel="stylesheet" href="./style/principal.css">
</head>
<body>
    <?php

    include_once("./includes/header.php");
    ?>

    
<div class="white-box">
    <h3 class="alta">Lista de usuarios dados de alta</h3>
   <table border="1">
    <thead>
        <th>Nome</th>
        <th>Apelidos</th>
        <th>Idade</th>
        <th>Provincia</th>
        <th></th>

    </thead>
    <tbody>
        <tr>
        <td>Diana</td>
        <td>Ramos</td>
        <td>23</td>
        <td>A Coruña</td>
        <td>

            <a href="">Modificar</a><a href="">Borrar</a>
        </td>
        </tr>
        <!-- metemos os da BD tamen-->

        <?php
         list($resultado, $conexion) = get_conexion();
         if($resultado){
              seleccionar_bd_tenda($conexion);
         list($cantidade, $usuarios) = listar_usuarios($conexion);

         if($cantidade){
              while ($row = $usuarios->fetch_assoc()){
                $id = $row["id"];
                echo"<tr>";
                echo "<td>".$row["nombre"]."</td>";
                echo "<td>".$row["apellidos"]."</td>";
                echo "<td>".$row["edad"]."</td>";
                echo "<td>".$row["provincia"]."</td>";
                echo "<td><a href='./editar_usuario.php?id={$id}'>Modificar</a><a href=''>Borrar</a></td>";
                echo"</tr>";

            }
         }

         cerrar_conexion($conexion);

         }else{//non se puido facer conexion

         }
       

        ?>

    </tbody>
    

   </table>
</div>

    <?php

    include_once("./includes/footer.php");

    ?>
    
</body>
</html>