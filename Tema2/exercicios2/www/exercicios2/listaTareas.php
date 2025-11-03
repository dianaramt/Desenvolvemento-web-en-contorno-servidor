<?php
require_once("utils.php");
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
                                <th>Descripción</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tareas = devolverTareas();
                            if(!empty($tareas)){
                                foreach ($tareas as $tarea) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $tarea[0];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $tarea[1];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $tarea[2];
                                    echo "</td>";


                                    echo "</tr>";

                            
                                }
                            }else{
                                echo "<p >Ainda non hai tareas</p>";
                            }
                            
                                #solo se visualizan as tareas que aparecen no array de utils e non as "gardadas"
                                #xa que o script reiníciase e volve a inicializar o array
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