<?php
function get_conexion_pdo(){ //ca base de datos xa seleccionada

    $servername = 'db';
    $username = 'root';
    $password = 'test';
    $dbname = 'tareas';

    try {
    $conPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return[$conPDO,'Conexión correcta <br>'];

    } catch(PDOException $e) {
        return[null, 'Fallo en conexión: ' . $e->getMessage(),"<br>"];
    }
}

function insertar_usuario($conexion, $nombreUsuario, $nombre, $apellidos, $contrasena){
    try{

        $stmt =  $conexion->prepare("INSERT INTO usuarios (username, nombre, apellidos, contrasena) 
        VALUES (:nombreUsuario, :nombre, :apellidos, :contrasena)");

        $stmt->bindParam(':nombreUsuario', $nombreUsuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':contrasena', $contrasena);

        $stmt->execute();
        $stmt->closeCursor();

        return [true, "Insertouse o novo usuario correctamente <br>"];

    }catch(PDOException $e){
        return [false, 'Error:'.$e->getMessage().'<br>'];

    }
}

?>