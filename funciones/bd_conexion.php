<?php
  $conn = new mysqli('localhost', 'root', '123456', 'contactos');
  if($conn->connect_error) {
    echo $error = $conn->connect_error;
  }

//  function peticion_ajax() {
//    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
//  }
 ?>
