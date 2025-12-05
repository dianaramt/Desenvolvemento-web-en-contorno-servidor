<?php 
require './lib/base_datos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doazón de sangue</title>
    <link rel="stylesheet" href="./estilo/style.css">
</head>
<body>
<?php  include_once("./includes/header.php")?>

<main>
    <a href="./alta_doantes.php"><button>Alta de nov@ doante</button></a>
    <a href="./lista_doantes.php"><button>Lista de doantes</button></a>

</main>

 <div class="consola">
    <?php
        list($resultado, $mensaxe, $conexion)= get_conexion();
        if($resultado){
            echo "<p>>{$mensaxe}</p>";
            list($resultado, $mensaxe)= crear_bd_donacion($conexion);
            if($resultado){
                echo "<p>>{$mensaxe}</p>";
                list($resultado, $mensaxe)= seleccionar_bd_donacion($conexion);
                if($resultado){
                    list($resultado, $mensaxe)=crear_taboa_donantes($conexion);
                     echo "<p>>{$mensaxe}</p>";

                    if($resultado){
                        list($resultado, $mensaxe)=crear_taboa_historico($conexion);
                        echo "<p>>{$mensaxe}</p>";

                    }else{
                        echo "<p>>Non se puido crear a taboa do historico porque non se creou a de doantes antes</p>";
                        
                    }
                

                    list($resultado, $mensaxe)=crear_taboa_administradores($conexion);
                    echo "<p>>{$mensaxe}</p>";

                }else{ //non se puido seleccionar
                    echo "<p>>{$mensaxe}</p>";

                }


            }else{
                 echo "<p>>{$mensaxe}</p>";
            }
        
            //cerrar a conexion
            $mensaxe = cerrar_conexion($conexion);
            echo "<p>>{$mensaxe}</p>";


        }else{
            echo "<p>>{$mensaxe}</p>";
        }

    ?>
    

    </div>


<?php  include_once("./includes/footer.php")?>
    
</body>
</html>