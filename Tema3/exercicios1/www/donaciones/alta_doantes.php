<?php
require "./lib/base_datos.php";
require "./lib/utilidades.php";

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

<?php
include_once("./includes/header.php");
?>

<?php //Unha vez enviado o formulario
if(isset($_POST["darAlta"])){
    //nada vai estar empty pq xa o verificamos no propio form con required
    $nome = test_input($_POST["nome"]);
    $apelidos = test_input($_POST["apelidos"]);
    $idade = test_input($_POST["idade"]);
    $grupo = test_input($_POST["grupo"]);
    $codigo = test_input($_POST["codigo"]);
    $telefono = test_input($_POST["telefono"]);

    $mensaxes=array(); //para mostrar mensaxes informativas
    if(confirmar_codPostal($codigo) && confirmar_telefono($telefono)){//verificar que o son
        //PROCEDEMOS CON INTENTAR METER NA BD OS DATOS DUN NOVO DOANTE
        

        list($resultado, $mensaxe, $conexion)=get_conexion();
        if($resultado){//puido facerse conexion
            array_push($mensaxes, $mensaxe);

            list ($resultado, $mensaxe) =seleccionar_bd_donacion($conexion);
            if($resultado){ //puido seleccionarse a BD DONACION
                array_push($mensaxes, $mensaxe);
                $mensaxe= dar_alta_doante($conexion, $nome, $apelidos, $idade, $grupo, $codigo, $telefono);
                array_push($mensaxes, $mensaxe);

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
    }else{
        echo "<p>Verifica o número postal e/ou teléfono móbil</p>";

    }
}



?>

<main>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h3>Alta de usuarios</h3>
        Nome: <input type="text" name="nome" required>
        Apelidos <input type="text" name="apelidos" required>
        Idade <input type="number" name="idade" id="" min="18" required>
        Grupo sanguíneo: <select name="grupo" required>
            <option value="O-">O-</option>
            <option value="O+">O+</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="AB+">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>
        Código postal: <input type="text" name="codigo" required>
        Teléfono móbil <input type="text" name="telefono" required>


        <button type="submit" name="darAlta">Enviar</button>



    </form>
</main>

<?php
include_once("./includes/footer.php");
?>
    
</body>
</html>