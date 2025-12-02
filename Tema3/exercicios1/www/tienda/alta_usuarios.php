<?php
require "./lib/utilidades.php";
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
<?php

$mensaxe="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["nome"]) || empty($_POST["apelidos"]) || empty($_POST["idade"])){

        $mensaxe="Faltan datos";

    }
  $nome = test_input($_POST["nome"]);
  $apelidos = test_input($_POST["apelidos"]);
  $idade = test_input($_POST["idade"]);
}


?>

<?= $mensaxe; ?>

<div class="white-box">
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