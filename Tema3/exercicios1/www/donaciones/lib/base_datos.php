<?php
//get_conexion()
//crear_bd_donacion(conexion)
//selecionar_bd(conexion)
//cerrar_conexion($conexion)


function get_conexion(){
    $servername = 'db';
    $username = 'root';
    $password = 'test';

    
    try {
    $conPDO = new PDO("mysql:host=$servername", $username, $password);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $resultado = true;
    $mensaxe="Conexión correcta";
    } catch(PDOException $e) {

    $resultado = false;
    $mensaxe='Fallo en conexión: ' . $e->getMessage();
    }

    return [$resultado, $mensaxe, $conPDO];
}

function crear_bd_donacion($conexion){

    try {

    $sql = 'CREATE DATABASE IF NOT EXISTS donacion';
    $conexion->exec($sql);
    return [true, "BD creada correctamente"];

    }
    catch(PDOException $e) {
        return[false, "Erro creando a BD: ".$e->getMessage()];
    }

}

function seleccionar_bd_donacion($conexion){
    try {
        $conexion->exec("USE donacion");
        return [true, "Base de datos 'donacion' seleccionada correctamente"];
    } catch (PDOException $e) {
        return [false, "Erro seleccionando a BD: " . $e->getMessage()];
    }

}

function cerrar_conexion($conexion){
    $conexion = null;
    return "Conexion cerrada";
}
?>