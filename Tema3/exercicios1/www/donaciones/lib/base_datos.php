<?php
//get_conexion()
//crear_bd_donacion(conexion)
//selecionar_bd(conexion)
//cerrar_conexion($conexion)

//taboas

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

/*TABOAS */

function crear_taboa_donantes($conexion){
    $sql = 'CREATE TABLE IF NOT EXISTS donantes (
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(30) NOT NULL, 
        apellidos VARCHAR(30) NOT NULL,
        edad INT(3) NOT NULL,
        grupoSanguineo VARCHAR(3) NOT NULL,
        codigoPostal INT(5) NOT NULL,
        telefono INT(9) NOT NULL
    )';

    if ($conexion->query($sql)) {
        return [true, "Taboa 'donantes' creada correctamente"];
    }
    else {
        return [false, "Erro creando a taboa donantes: ".$conexion->error ];
    }

}

function crear_taboa_historico($conexion){
     $sql = "CREATE TABLE IF NOT EXISTS historico(
    idDonante INT(6) NOT NULL,
    fechaDonacion DATE NOT NULL,
    proximaDonacion DATE NOT NULL,
    PRIMARY KEY (idDonante, fechaDonacion),
    FOREIGN KEY (idDonante) REFERENCES donantes(id) ON DELETE CASCADE
    )";

    if ($conexion->query($sql)) {
        return [true, "Taboa 'historico' creada correctamente"];
    }
    else {
        return [false, "Erro creando a taboa historico: ".$conexion->error ];
    }

}

function crear_taboa_administradores($conexion){
      $sql = "CREATE TABLE IF NOT EXISTS administradores(
    nomeUsuario VARCHAR(50) PRIMARY KEY,
    contrasinal VARCHAR(200) NOT NULL
    )";

    if ($conexion->query($sql)) {
        return [true, "Taboa 'administradores' creada correctamente"];
    }
    else {
        return [false, "Erro creando a taboa administradores: ".$conexion->error ];
    }

}

/*ALTA DONANTE */

function dar_alta_doante($conexion, $nome, $apelidos, $idade, $grupo, $codigo, $telefono){

    $stmt = $conexion->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupoSanguineo, codigoPostal, telefono) VALUES (:nome, :apelidos, :idade, :grupo, :codigo, :telefono)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':apelidos', $apelidos);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':grupo', $grupo);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':telefono', $telefono);


    $stmt->execute();

    $stmt->closeCursor();

   return "Foi dado de alta o doante {$nome} {$apelidos}";




}

/*LISTA DOANTES*/
function listar_doantes($conexion){

    $stmt = $conexion->prepare("SELECT id, nombre, apellidos,edad,grupoSanguineo,codigoPostal,telefono FROM donantes");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultados = $stmt->fetchAll();
    return $resultados;

}
?>