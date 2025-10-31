<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio2</title>
</head>
<body>

<!--TAREA 1. Uso de arrays -->
<?php
$pares=[];
$init=1;

while($init<=10){
    if($init%2==0){
        array_push($pares, $init);
    }
    $init=$init+1;
}

echo "Os pares son: "."<br>";
foreach ($pares as $par) {
    echo $par."<br>";
}

#######################

$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';

foreach ($v as $key => $value) {
    echo "Chave: {$key} /Valor: {$value} <br>";
}


?>

<!-- TAREA 2. Arrays multidimensionales -->
 <?php

 $usuarios = [
    [
        "nombre" => "John",
        "email" => "john@demo.com",
        "website" => "www.john.com",
        "age" => 22,
        "password" => "pass"
    ],
    [
        "nombre" => "Anna",
        "email" => "anna@demo.com",
        "website" => "www.anna.com",
        "age" => 24,
        "password" => "pass"
    ],
    [
        "nombre" => "Peter",
        "email" => "peter@mail.com",
        "website" => "www.peter.com",
        "age" => 42,
        "password" => "pass"
    ],
    [
        "nombre" => "Max",
        "email" => "max@mail.com",
        "website" => "www.max.com",
        "age" => 33,
        "password" => "pass"
    ]
];


foreach ($usuarios as $usuario) {
    echo "<strong>Nombre:</strong> " . $usuario["nombre"] . "<br>";
    echo "<strong>Email:</strong> " . $usuario["email"] . "<br>";
    echo "<strong>Website:</strong> " . $usuario["website"] . "<br>";
    echo "<strong>Edad:</strong> " . $usuario["age"] . "<br>";
    echo "<strong>Password:</strong> " . $usuario["password"] . "<br>";
    echo "<hr>"; // Línea separadora
}

 ?>

 <!-- TAREA 3. Uso de Arrays-->

 <?php
$init =1;
$aleatorio=[];

while($init<=30){
    array_push($aleatorio, rand(0, 20)); #inclue o 0 e o 20
    $init=$init +1;
}

foreach ($aleatorio as $item) {
    echo "{$item} <br>";
}


#####################

$personaxes= ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];
array_pop($personaxes);
print_r($personaxes); #para imprimir rapido un array

echo "<br>";
echo array_search("Superman", $personaxes). "<br>";

array_push($personaxes, "Carl", "Lenny", "Burns", "Lisa");
print_r($personaxes);

echo "<br>";

sort($personaxes);
print_r($personaxes);

echo "<br>";

array_unshift($personaxes,"Apple", "Melon", "Watermelon");
print_r($personaxes);
echo "<br>";

$copia= array_slice($personaxes, 2,3); //o ultimo parametro é numero de elementos
array_push($copia, "Pera");

print_r($copia);
echo "<br>";


 ?>

<!--Tarea 4. Uso de arrays e Strings-->
<table border="1">
    <thead>
        <tr><th>Ciudad</th> <th>País</th><th>Continente</th></tr>
        
    </thead>
    <tbody>
        <?php
        $informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";
        $elementos = explode(";", $informacion);
        $sitios =[]; //array onde se almacena todo
        foreach ($elementos as $elemento) {
            $sitio= explode(",", $elemento);
            array_push($sitios, $sitio);
        }

        //foreach para imprimir
        foreach ($sitios as $lugar) {
            echo "<tr>";
            echo"<td>".$lugar[0]."</td>";
            echo"<td>".$lugar[1]."</td>";
            echo"<td>".$lugar[2]."</td>";
            echo"</tr>";
        }
        ?>
       
    </tbody>
</table>

    
</body>
</html>