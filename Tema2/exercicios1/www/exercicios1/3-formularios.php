<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>
   <form action="" method="post">

    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre" required>

    <br><br>

    
    <label for="apellido">Apellido: </label>
    <input type="text" name="apellido" id="apellido" required>

    <br><br>

    <input type="submit" name="form1" value="Enviar">

    <br><br>

   </form>



<!--TAREA 2 -->
<table border="2">
    <thead><th>Bebida</th><th>PVP</th></thead>
    <tbody>
        <tr><td>Coca Cola</td><td>1€</td></tr>
        <tr><td>Pepsi Cola</td><td>0,80 €</td></tr>
        <tr><td>Fanta Naranja</td><td>0,90€</td></tr>
        <tr><td>Trina Manzana</td><td>1,10 €</td></tr>
    </tbody>
</table>
<form action="" method="post">
       <select name="opcion" required>
    <option value="cocacola">Coca Cola</option>
    <option value="pepsi">Pepsi Cola</option>
    <option value="fanta">Fanta Naranja</option>
    <option value="trina">Trina Manzana</option>
    </select>
    <input type="number" name="numero" id="numero" step="1" required>

        <input type="submit" name="form2" value="Solicitar">
</form>


  <?php

   if($_SERVER["REQUEST_METHOD"] == "POST"){

     if (isset($_POST["form1"])){

        $nombre = trim($_POST["nombre"]);
        $apellido = trim($_POST["apellido"]);

        echo "<h2> Resultados </h2>";
        echo "<p> Nombre: {$nombre} </p>";
        echo "<p> Nombre: {$apellido} </p>";
        echo "<p> Nombre y apellidos: {$nombre} {$apellido} </p>";

        $numCaracteres = strlen($nombre); 
        echo "<p> Su nombre tiene {$numCaracteres} caracteres </p>";

        $tresPrimeiros = substr($nombre, 0, 3);
        echo "<p>Los 3 primeros caracteres de tu nombre son: {$tresPrimeiros} </p>";

        $posicionA= stripos($apellido, "a");
        if ($posicionA == false){
            echo "<p>La letra A fue encontrada en sus apellidos en la posición: Non foi atopada esa letra</p>";
        }else{
    echo "<p>La letra A fue encontrada en sus apellidos en la posición: {$posicionA}</p>";
        }

        $nombreUpper = strtoupper($nombre);
        $numCaracteresA =  substr_count($nombreUpper, "A"); 
        echo "<p>Su nombre contiene {$numCaracteresA} caracteres “A”.</p>";
        echo "<p> Tu nombre en mayúsculas es: {$nombreUpper}";

        $apellidoLower = strtolower($apellido);
        echo "<p>Tu apellido en minúsculas es: {$apellidoLower}</p>";

        $apellidoUpper = strtoupper($apellido);
        echo "<p>Su nombre y apellido en mayúsculas: {$nombreUpper} {$apellidoUpper}</p>";

        $nombreReves = strrev($nombre);
        echo "<p> Su nombre al revés: {$nombreReves}</p>";
    
   } if (isset($_POST["form2"])){ //candp se envía o formulario 2

    $numero = trim($_POST["numero"]);
     $opcion = trim($_POST["opcion"]);
    

    if($numero>0){
        $valor = 0;
        switch ($opcion) {
            case 'cocacola':
                $valor =1;
                break;
            case 'pepsi':
                $valor=0.80;
                break;
            case 'fanta':
                $valor=0.90;
                break;
            case 'trina':
                $valor=1.10;
                break;

        }
        $total =$numero * $valor;

        echo "Pediste {$numero} botellas de {$opcion}. Precio total a pagar: {$total} euros.";
        
    }else{
        echo "Introduce unha cantidade adecuada";
    }

   }
}

   

   ?>

    
</body>
</html>