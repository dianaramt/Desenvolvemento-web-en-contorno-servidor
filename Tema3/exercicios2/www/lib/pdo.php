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
function get_usuarios($conexion){

    try{
    $stmt = $conexion->prepare("SELECT id, username, nombre, apellidos FROM usuarios");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultados = $stmt->fetchAll();
    return[$resultados, "Obtiveronse os usuarios da BD <br>" ];

    }catch(PDOException $e){
        return [null, 'Error:'.$e->getMessage().'<br>'];

    }
    
    
    

}

function get_info_usuario($conexion, $id){
     try{

        $stmt =  $conexion->prepare("SELECT username, nombre, apellidos FROM usuarios WHERE id = :id");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);//é un int

        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC); //obtemos info DUN usuario
        $stmt->closeCursor();

        return [$usuario, "Obtiveronse os datos para modificar <br>"];

    }catch(PDOException $e){
        return [null, 'Error:'.$e->getMessage().'<br>'];

    }

}

function modificar_usuario_sen_contrasinal($conexion, $id ,$nombreUsuario, $nombre, $apellidos){
    try{
        $stmt = $conexion->prepare("UPDATE usuarios SET username = :username, nombre = :nombre, apellidos = :apellidos WHERE id = :id");
    $stmt->bindParam(':username', $nombreUsuario);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    $stmt->closeCursor();

    return [true, 'Foi modificado o usuario pero non o seu contrasinal <br>'] ;


    }catch(PDOException $e){
        return [false, 'Error:'.$e->getMessage().'<br>'];

    }
    

}
function modificar_usuario_con_contrasinal($conexion, $id ,$nombreUsuario, $nombre, $apellidos, $contrasinal){
    try{
        $stmt = $conexion->prepare("UPDATE usuarios SET username = :username, nombre = :nombre, apellidos = :apellidos, contrasena = :contrasinal WHERE id = :id");
    $stmt->bindParam(':username', $nombreUsuario);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':contrasinal', $contrasinal);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);


    $stmt->execute();
    $stmt->closeCursor();

    return [true, 'Foi modificado o usuario así como o seu contrasinal <br>'] ;


    }catch(PDOException $e){
        return [false, 'Error:'.$e->getMessage().'<br>'];

    }
    

}

function borrar_usuario($conexion, $id){

    try{

    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id=:id");
     $stmt->bindParam(':id', $id, PDO::PARAM_INT);

     $stmt->execute();
     $stmt->closeCursor();
     return [true, "Rexistro borrado correctamente <br>"];

    }catch(PDOException $e){
        return [false, 'Error:'.$e->getMessage().'<br>'];

    }
     

}

?>