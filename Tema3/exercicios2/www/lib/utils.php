<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function encriptarContrasinal($contrasinal){

    $encriptada= password_hash($contrasinal, PASSWORD_DEFAULT);
    return $encriptada;
}
?>