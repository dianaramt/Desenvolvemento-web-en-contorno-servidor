<?php
function get_conexion_mysqli(){
    try {
    $conexion = new mysqli('db', 'root', 'test');
    return [$conexion,'Conexión correcta <br>' ]; }
    catch (mysqli_sql_exception $e) {
    return [null,'Error en la conexión: ' . $e->getMessage() . '<br>' ];
}
    
}

function crear_bd_tareas($conexion){

    $sql = 'CREATE DATABASE IF NOT EXISTS tareas';
    if ($conexion->query($sql)) {
        return [true, 'Base de datos creada correctamente (ou xa estaba creada) <br>'];
    }
    else {
        return [false, 'Error creando la base de datos: ' . $conexion->error . '<br>'];
    }
}



function crear_tabla_usuarios($conexion){
    try {
    $sql = 'CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(50) NOT NULL, 
        nombre VARCHAR(50) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        contrasena VARCHAR(100) NOT NULL

    )';
    $conexion->select_db('tareas');
    if ($conexion->query($sql)) {
        return [true, 'Tabla de usuarios creada correctamente <br>'];
    }
    else {
        return [false, 'Error creando la tabla usuarios ' . $conexion->error . '<br>'];
    }
    } catch(mysqli_sql_exception $e){
        return [false, 'Error: '. $e->getMessage()];
    }

}

function crear_tabla_tareas($conexion){
    try {
    $sql = 'CREATE TABLE IF NOT EXISTS tareas(
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        titulo VARCHAR(50) NOT NULL, 
        descripcion VARCHAR(250) NOT NULL,
        estado VARCHAR(50) NOT NULL,
        id_usuario INT(6) NOT NULL,
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id)

    )';
    $conexion->select_db('tareas');
    if ($conexion->query($sql)) {
        return [true, 'Tabla de tareas creada correctamente <br>'];
    }
    else {
        return [false, 'Error creando la tabla tareas ' . $conexion->error . '<br>'];
    }
    } catch(mysqli_sql_exception $e){
         return [false, 'Error: '. $e->getMessage()];
    }

}

?>