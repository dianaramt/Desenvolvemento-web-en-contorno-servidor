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

$mensaxes = array();

list($resultado, $mensaxe) = get_conexion_pdo();
if($resultado !=null){
    array_push($mensaxes, $mensaxe);
    list($usuarios, $mensaxe)= get_usuarios($resultado);
    array_push($mensaxes, $mensaxe);
    if(count($usuarios)<1){
        array_push($mensaxes, "Non hai ningún usuario rexistrado <br>");
    }
    

}else{
    array_push($mensaxes, $mensaxe);

}


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
                    <table class ="table" border="1">
                        <thead>
                            <th>Id</th>
                            <th>Nombre de usuario</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Accións</th>
                        </thead>
                        <tbody>
                            <?php
                            if($usuarios!=null){
                                foreach($usuarios as $usuario){
                                    echo "<tr>";
                                    echo "<td>".$usuario["id"]."</td>";
                                    echo "<td>".$usuario["username"]."</td>";
                                    echo "<td>".$usuario["nombre"]."</td>";
                                    echo "<td>".$usuario["apellidos"]."</td>";
                                    echo "<td> <a href='./editaUsuarioForm.php?id=".$usuario["id"]."'> <button>Editar</button></a>";
                                    echo " <a href='./borraUsuario.php?id=".$usuario["id"]."'> <button>Borrar</button></a></td>";

                                    echo "</tr>";
                                }
                            }






                            ?>
                        </tbody>


                    </table>

                    <div class="bg-dark text-white">
                        <?php
                        foreach($mensaxes as $mensaxe){
                            echo $mensaxe;
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