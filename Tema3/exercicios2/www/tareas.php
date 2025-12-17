<?php
require_once("./lib/utils.php");
require_once("./lib/mysqli.php");
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
                <div class="table">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>                            
                                <th>Identificador</th>
                                <th>Título</th>
                                <th>Nome de usuario</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Accións</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            list($resultado, $conexion)= get_conexion_mysqli();
                            if($resultado!=null){
                                $conexion =$resultado;
                                list($resultado, $tareas) = obter_tareas($conexion);
                                if($resultado){
                                    foreach($tareas as $tarea){

                                        list($resultado, $nome_usuario) = obter_nomeusuario($conexion, $tarea["id_usuario"]);
                                        echo "<tr>";
                                        echo "<td>".$tarea["id"]."</td>";
                                        echo "<td>".$tarea["titulo"]."</td>";
                                        echo "<td>".$nome_usuario."</td>";
                                        echo "<td>".$tarea["descripcion"]."</td>";
                                        echo "<td>".$tarea["estado"]."</td>";
                                         echo "<td><a><button>Editar</button> </a> <a><button>Eliminar</button> </a></td>";


                                        echo "</tr>";

                                    }
                                    
                                }

                            }else{
                                //problema ca conexion
                            }
                           
                            ?>

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include("elementos/footer.php"); ?>
</body>
</html>