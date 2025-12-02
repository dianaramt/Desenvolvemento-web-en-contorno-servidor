<?php
function get_conexion(){

    mysqli_report(MYSQLI_REPORT_OFF);//para os ERROS

    $conexion = @new mysqli('db', 'root', 'test'); //o @ para os ERROS

    $error = $conexion->connect_errno;
    if($error !=null){//se hai erro
        return [false, 0];
    }else{//se non hai erro
        return [true, $conexion];
    }
    
}

function crear_bd_tenda($conexion){
    $sql = 'CREATE DATABASE IF NOT EXISTS tenda';
    if ($conexion->query($sql)) { //creouse
        return true;
    }
    else { //non se creou
        return false;
    }
}

function crear_taboa_usuarios($conexion){
     $sql = 'CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL, 
        apellidos VARCHAR(100),
        edad INT(6),
        provincia VARCHAR(50)
    )';
    $conexion->select_db('tenda');
    if ($conexion->query($sql)) { //puido crearse
        return true;
    }
    else {//erro creando taboa
        return false;
    }
}

function seleccionar_bd_tenda($conexion)
{
    return $conexion->select_db("tenda");
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}


/*CRUD*/

function dar_alta_usuario($nome, $apelidos, $idade,$provincia, $conexion){
    $sql = "INSERT INTO usuarios (nombre, apellidos, edad, provincia) VALUES (?,?,?,?)";
    $stmt = mysqli_prepare($conexion, $sql); 


    mysqli_stmt_bind_param($stmt, "ssis", $nome, $apelidos, $idade, $provincia);
    mysqli_stmt_execute($stmt);


    mysqli_stmt_close($stmt);
}

function listar_usuarios($conexion){
    $cantidade="";
    $sql = "SELECT nombre, apellidos, edad, provincia FROM usuarios";
    $resultados = $conexion->query($sql);

        if($resultados->num_rows > 0){
        $cantidade=true;
        
        }
        else {
        $cantidade=false;
        }
    return [$cantidade, $resultados];

}




?>