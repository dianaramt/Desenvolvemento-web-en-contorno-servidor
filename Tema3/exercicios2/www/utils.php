<?php

$tareas=[ //para visualizar xa que non se poden gardar
    [1,"facer un exercicio", "En proceso"],
    [2,"ir ao ximnasio", "Completada"]
];

function devolverTareas(){
    global $tareas;
    return $tareas;

}
function filtrarTarea($id, $descripcion, $estado){
    return [$id, $descripcion, $estado]; //xa filtrados

}

function comprobarTarea($tarea){
    return true;

}


function guardarTarea($descripcion, $estado){
    global $tareas;
    $id = count($tareas) +1;
    $tarea = filtrarTarea($id, $descripcion, $estado);
    if(comprobarTarea($tarea)){
        array_push($tareas, $tarea);
        return true;
    }else{
        return false;
    }

}

?>