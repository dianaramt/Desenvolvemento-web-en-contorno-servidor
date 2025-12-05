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
        $id = test_input($_POST["id"]);
         $nome = test_input($_POST["nome"]);
        $apelidos = test_input($_POST["apelidos"]);
        $idade = test_input($_POST["idade"]);
        $provincia = test_input($_POST["provincia"]);

        list($resultado, $conexion) = get_conexion();
            if($resultado){
            
                seleccionar_bd_tenda($conexion);//IMPORTANTE
                list($resultado, $mensaxe) = modificar_usuario($conexion, $id, $nome, $apelidos, $idade, $provincia);
                if ($resultado){
                    $info = $mensaxe; 

                    echo '<meta http-equiv="refresh" content="3; url=lista_usuarios.php">';
                }else{
                    $error=$mensaxe;
                }
              

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

<?php
if (isset($_GET["id"])){
    $id_usuario=$_GET["id"];

    list($resultado, $conexion) = get_conexion();
        if($resultado){
           seleccionar_bd_tenda($conexion);
           $resultados = obter_usuario($conexion, $id_usuario);
           $row = $resultados->fetch_assoc();

           //cada un dos valores
           $nombre = $row["nombre"];
           $apellidos = $row["apellidos"];
           $edad =$row["edad"];
           $provincia=$row["provincia"];
        }
    cerrar_conexion($conexion);
    

}

?>


<div class="white-box"> <!-- FORMULARIO A MANDAR -->
    <h3 class="alta">Editar usuario con id = <?php if (isset($id_usuario)){echo "{$id_usuario}";} else{echo "{$id}";}?> </h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> <!--Para mandalo á mesma paxina de forma segura mediante POST -->
    Nome: <input type="text" name="nome" value="<?php if (isset($nombre)){echo "{$nombre}";} else{echo "{$nome}";}?> ">
    <br> <br>
    Apelidos: <input type="text" name="apelidos" value="<?php if (isset($apellidos)){echo "{$apellidos}";} else{echo "{$apelidos}";}?> ">
    <br> <br>
    Idade: <input type="text" name="idade" value="<?php if (isset($edad)){echo "{$edad}";} else{echo "{$idade}";}?> ">
    <br> <br>
    Provincia:
    <?php 
    if ($provincia == "corunha"){
        echo '<input type="radio" name="provincia" value="corunha" checked>A Coruña';
        echo '<input type="radio" name="provincia" value="pontevedra">Pontevedra';
        echo ' <input type="radio" name="provincia" value="ourense">Ourense';
        echo '<input type="radio" name="provincia" value="lugo">Lugo';
    }else if ($provincia == "pontevedra"){
        echo '<input type="radio" name="provincia" value="corunha">A Coruña';
        echo ' <input type="radio" name="provincia" value="pontevedra" checked>Pontevedra';
        echo '<input type="radio" name="provincia" value="ourense">Ourense';
        echo '<input type="radio" name="provincia" value="lugo">Lugo';

    }else if ($provincia == "ourense"){
         echo '<input type="radio" name="provincia" value="corunha">A Coruña';
        echo ' <input type="radio" name="provincia" value="pontevedra">Pontevedra';
        echo '<input type="radio" name="provincia" value="ourense" checked>Ourense';
        echo '<input type="radio" name="provincia" value="lugo">Lugo';

    }else if ($provincia =="lugo"){
         echo '<input type="radio" name="provincia" value="corunha">A Coruña';
        echo ' <input type="radio" name="provincia" value="pontevedra">Pontevedra';
        echo '<input type="radio" name="provincia" value="ourense">Ourense';
        echo '<input type="radio" name="provincia" value="lugo" checked>Lugo';

    }else{

        echo '<input type="radio" name="provincia" value="corunha">A Coruña';
        echo ' <input type="radio" name="provincia" value="pontevedra">Pontevedra';
        echo '<input type="radio" name="provincia" value="ourense">Ourense';
        echo '<input type="radio" name="provincia" value="lugo">Lugo';

    }


    ?>
    <br><br>
    <input type="hidden" name="id" value="<?php if (isset($id_usuario)){echo "{$id_usuario}";} else{echo "{$id}";}?> ">
    <input type="submit" name="submit" value="Modificar usuario"> 
    
    </form>
</div>

<?php
include_once("./includes/footer.php");
?>
    
</body>
</html>