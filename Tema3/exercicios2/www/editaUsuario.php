<?php 
    require './lib/pdo.php';
    require './lib/utils.php';
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
$informacion= array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $id = $_POST["id"];

  if (empty($_POST["nombreUsuario"])) {
    array_push($mensaxes,"NombreUsuario is required <br>" ) ;
  } else {
    $nombreUsuario = test_input($_POST["nombreUsuario"]);
  }

  if (empty($_POST["nombre"])) {
    array_push($mensaxes,"NombreUsuario is required <br>" ) ;
  } else {
    $nombre = test_input($_POST["nombre"]);
  }
   if (empty($_POST["apellidos"])) {
    array_push($mensaxes,"Apellidos is required <br>" ) ;
  } else {
    $apellidos = test_input($_POST["apellidos"]);
  }

  if (!empty($_POST["contrasinal"])) { //opcional cambiar o contrasinal

    $contrasinal = encriptarContrasinal(test_input($_POST["contrasinal"]));
    if (count($mensaxes)==0){
        list($conexion, $error) = get_conexion_pdo();
        if($conexion!=null){
           list($resultado, $error)= modificar_usuario_con_contrasinal($conexion, $id, $nombreUsuario, $nombre, $apellidos, $contrasinal);
           array_push($informacion, $error);
        }
    }
  }else{
    if (count($mensaxes)==0){
        list($conexion, $error) = get_conexion_pdo();
        if($conexion!=null){
            list($resultado, $error)=modificar_usuario_sen_contrasinal($conexion, $id, $nombreUsuario, $nombre, $apellidos);
        array_push($informacion, $error);
        }
        
    }

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
                <h3>Editar usuario con id = <?= $id?></h3>
                <form method="post" action="<?php echo htmlspecialchars("./editaUsuario.php");?>">
                Nombre de usuario:
                <br>
                <input type="text" name="nombreUsuario" value="<?php

                echo $_POST["nombreUsuario"];
                
                
                ?>"> <br>
                Nombre: 
                <br>
                <input type="text" name="nombre" 
                value="<?php

                echo $_POST["nombre"];
                
                
                ?>"> <br>
                Apellidos: 
                <br>
                <input type="text" name="apellidos" value="<?php

               echo $_POST["apellidos"];
                
                
                ?>">
                <br>
                 Contraseña: 
                <br>
                <input type="password" name="contrasinal" >
                <br><br>
                



                <button type="submit" name="modificar">Modificar usuario</button>


                </form>
                <div class="bg-dark text-white"
                <?php
                if (count($mensaxes)==0){
                    echo "hidden";
                }

                ?>
                
                >

                <?php
                    foreach($mensaxes as $mensaxe){
                        echo $mensaxe;
                    }
                ?>
                </div>
                <div bg-primary text-dark
                <?php

                if(count($informacion)==0){
                    echo "hidden";
                }

                ?>
                
                >
                <?php
                 foreach($informacion as $info){
                    echo $info;
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