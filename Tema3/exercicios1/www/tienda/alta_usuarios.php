<?php
require "./lib/utilidades.php";
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
<?php //LOXICA UNHA VEZ SE ENVIA O FORMULARIO

$info="";
$error="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["nome"]) || empty($_POST["apelidos"]) || empty($_POST["idade"]) ||empty($_POST["provincia"])){

        $error="Faltan datos";

    }else{
         $nome = test_input($_POST["nome"]);
        $apelidos = test_input($_POST["apelidos"]);
        $idade = test_input($_POST["idade"]);
        $provincia = test_input($_POST["provincia"]);

        list($resultado, $conexion) = get_conexion();
            if($resultado){
            
                seleccionar_bd_tenda($conexion);//IMPORTANTE
                dar_alta_usuario($nome, $apelidos, $idade, $provincia, $conexion);

                $info= "Douse de alta a un usuario";

                cerrar_conexion($conexion);
               

            }else{
                echo "<h3> NON HAI CONEXION</h3>";
            }

    }
 
}


?>

<?php
echo "<h3 class='info'>".$info."</h3>";
echo "<h3 class='error'>".$error."</h3>";

?>

<div class="white-box"> <!-- FORMULARIO A MANDAR -->
    <h3 class="alta">Alta de usuarios</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> <!--Para mandalo á mesma paxina de forma segura mediante POST -->
    Nome: <input type="text" name="nome"> <!--Non necesita id -->
    <br> <br>
    Apelidos: <input type="text" name="apelidos">
    <br> <br>
    Idade: <input type="text" name="idade">
    <br> <br>
    Provincia:
    <input type="radio" name="provincia" value="corunha">A Coruña
    <input type="radio" name="provincia" value="pontevedra">Pontevedra
    <input type="radio" name="provincia" value="ourense">Ourense
    <input type="radio" name="provincia" value="lugo">Lugo
    <br><br>
    <input type="submit" name="submit" value="Dar de alta"> 
    </form>
</div>

<?php
include_once("./includes/footer.php");
?>
    
</body>
</html>