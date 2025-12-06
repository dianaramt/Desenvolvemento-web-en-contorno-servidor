<?php
require "./lib/base_datos.php";
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
<?php //coller da bd os datos

$mensaxes=array(); //para mostrar mensaxes informativas
    
        list($resultado, $mensaxe, $conexion)=get_conexion();
        if($resultado){//puido facerse conexion
            array_push($mensaxes, $mensaxe);

            list ($resultado, $mensaxe) =seleccionar_bd_donacion($conexion);
            if($resultado){ //puido seleccionarse a BD DONACION
                array_push($mensaxes, $mensaxe);
                $doantes= listar_doantes($conexion);
                array_push($mensaxes, "Obtiveronse os doantes da BD");

            }else{
                array_push($mensaxes, $mensaxe);

            }

        //CERRAMOS A CONEXION!!
        $mensaxe= cerrar_conexion($conexion);
         array_push($mensaxes, $mensaxe);


        }else{
            array_push($mensaxes, $mensaxe);
        }

        //amosar mensaxes informativas
        foreach($mensaxes as $m){
        echo "<p>{$m}</p>";
        }


?>
<main class=listaDoantes>
    <h3>Lista de doantes</h3>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Apelidos</th>
            <th>Idade</th>
            <th>Grupo Sanguineo</th>
            <th>Código Postal</th>
            <th>Teléfono</th>
            <th>Accións</th>
        </thead>
        <tbody>
            <?php
            foreach($doantes as $doante){
                echo "<tr>";
                echo "<td>{$doante['id']}</td>";
                echo "<td>{$doante['nombre']}</td>";
                echo "<td>{$doante['apellidos']}</td>";
                echo "<td>{$doante['edad']}</td>";
                echo "<td>{$doante['grupoSanguineo']}</td>";
                echo "<td>{$doante['codigoPostal']}</td>";
                echo "<td>{$doante['telefono']}</td>";
                echo'<td><a href=""><button>Rexistrar donación</button></a> <a href=""><button></button></a></td>'; //TODO: CONTINUAR AQUI
            }
            ?>
            
        </tbody>
    </table>
</main>

<?php  include_once("./includes/footer.php")?>
    
</body>
</html>