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

<?php
 include_once("./includes/header.php");
?>

<?php //cando ven de un doante
if(isset($_GET["id"])){
    $id_doante= $_GET["id"];

    $mensaxes=array(); //para mostrar mensaxes informativas
    
        list($resultado, $mensaxe, $conexion)=get_conexion();
        if($resultado){//puido facerse conexion
            array_push($mensaxes, $mensaxe);

            list ($resultado, $mensaxe) =seleccionar_bd_donacion($conexion);
            if($resultado){ //puido seleccionarse a BD DONACION
                array_push($mensaxes, $mensaxe);
                list($resultado, $doante) = get_info_doante($conexion, $id_doante);
                if($resultado){
                        array_push($mensaxes, "Obtivose informacion do doante");
                        $nome_doante = $doante["nombre"];
                        $apelidos_doante=$doante["apellidos"];
                        $edad_doante= $doante["edad"];
                        $telefono_doante=$doante["telefono"];
                        $grupoSanguineo_doante = $doante["grupoSanguineo"];

                        list($resultado, $doazons)=get_doazons_doante($conexion, $id_doante);
                        if ($resultado){
                             array_push($mensaxes, "Atoparonse doazons do doante");


                        }else{
                             array_push($mensaxes, "Non se atopou ningunha doazon para este doante");

                        }


                }else{
                            array_push($mensaxes, "Non se atopou o doante na BD");
                }

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

}
?>
<main class=listaDoantes>
    <h3>Doante con id= <?= $id_doante ?></h3>
    <h3><?=$nome_doante?><?=" ".$apelidos_doante?></h3>
    <h3><?="De ".$edad_doante." anos e co telefono ".$telefono_doante?></h3>
    <h3><?="O seu grupo sanguineo é ".$grupoSanguineo_doante ?></h3>
    <?php //proxima doazon

    if(isset($doazons)){

        if (count($doazons)>0){
        $proxima = date_create($doazons[0]["proximaDonacion"]);
        $proxima = date_format($proxima, 'd-m-Y');
        echo "<h3>A próxima doazón pode ser apartir do {$proxima}</h3>";
    } 


    }
       
    ?>
    <div style="padding-bottom:10px; padding-left:5px;"> 
        <?php
        $hoxe = date("Y-m-d");
    

        ?>
        <a href=<?="./lista_doazons.php?id=".$id_doante."&data=".$hoxe?>><button
        <?php 
        if (!$doazons==null){//se ten doazons mirar que poida facer agora unha
            if (strtotime($hoxe)<strtotime($doazons[0]["proximaDonacion"])){
                echo "disabled";

            }
        }

        //TODO: Continuar no de meter nova doazon na BD
        
        
        ?>
        
        >Realizar doazón</button></a> 
    </div>
    <table border="1">
        <thead>
            <th>Doazóns</th>
        </thead>
        <tbody>
            <?php

              if(isset($doazons)){

                
            foreach($doazons as $doazon){

                $fecha = date_create($doazon["fechaDonacion"]);
                $fecha =  date_format($fecha, 'd-m-Y');//para poñela no formato que queira

                echo "<tr>";
                echo "<td>".$fecha."</td>";
                echo "</tr>";
            }

    }else{

        echo "<tr><td>Non ten ningunha doazón este usuario</td></tr>";
    }
       




            ?>
            
        </tbody>
    </table>
</main>   

<?php
 include_once("./includes/footer.php");
?>
    
</body>
</html>