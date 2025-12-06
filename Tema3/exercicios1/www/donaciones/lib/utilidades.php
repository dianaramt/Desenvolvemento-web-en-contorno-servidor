<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function confirmar_codPostal($codigo){
    if(is_numeric($codigo)){
        if(strlen($codigo)==5){
            return true;

        }else{
            return false;
        }
    }else{
        return false;
    }
}

function confirmar_telefono($telefono){

    if(is_numeric($telefono)){
        if(strlen($telefono)==9){
            return true;

        }else{
            return false;
        }
    }else{
        return false;
    }

}

function obter_data_4meses_despois($fecha){
    $nova = date("Y-m-d", strtotime("$fecha +4 months")); //no formato xa para meter na bd
    return $nova;

}

?>

