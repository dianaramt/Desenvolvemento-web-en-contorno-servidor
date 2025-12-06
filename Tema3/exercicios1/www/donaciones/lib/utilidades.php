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

?>

