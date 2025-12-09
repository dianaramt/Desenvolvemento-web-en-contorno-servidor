<?php 
    require './lib/pdo.php'
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

<?php

$mensaxes = array();

if(isset($_GET["id"])){
    $id_usuario = $_GET["id"];
    
    list($conexion, $mensaxe) = get_conexion_pdo();
    if($conexion !=null){
        array_push($mensaxes, $mensaxe);
        list($user, $mensaxe) = get_info_usuario($conexion, $id_usuario);
        array_push($mensaxes, $mensaxe);
        

        
    }else{
        array_push($mensaxes, $mensaxe);
    }


}


?>
    <!--header-->
    <?php include("elementos/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php include("elementos/menu.php"); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h3>Editar usuario con id = <?= $id_usuario?></h3>
                <form method="post" action="<?php echo htmlspecialchars("./editaUsuario.php");?>">
                Nombre de usuario:
                <br>
                <input type="text" name="nombreUsuario" value="<?php

                if ($user==null){
                    echo "ERROR!";
                }else{
                    echo $user["username"];
                }
                
                
                ?>"> <br>
                Nombre: 
                <br>
                <input type="text" name="nombre" 
                value="<?php

                if ($user==null){
                    echo "ERROR!";
                }else{
                    echo $user["nombre"];
                }
                
                
                ?>"> <br>
                Apellidos: 
                <br>
                <input type="text" name="apellidos" value="<?php

                if ($user==null){
                    echo "ERROR!";
                }else{
                    echo $user["apellidos"];
                }
                
                
                ?>">
                <br>
                 Contraseña: 
                <br>
                <input type="password" name="contrasinal" >
                <br><br>
                


                <input type="hidden" name="id" value=<?= $id_usuario ?>>
                <button type="submit" name="modificar">Modificar usuario</button>


                </form>
                <div class="bg-dark text-white">
                    <?php
                    foreach($mensaxes as $mensaxe){
                        echo $mensaxe;
                    }
                    if ($user == null){
                        echo "Non existe ese usuario na BD!! <br>";
                    }

                    ?>
                    
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include("elementos/footer.php"); ?>
</body>
</html>