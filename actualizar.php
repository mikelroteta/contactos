<?php
  function peticion_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  $datos = $_GET['datos'];
  $datos = json_decode( $datos, true );

  $nombre = $datos['nombre'];
  $numero = $datos['telefono'];
  $id = $datos['id'];

  if (peticion_ajax()) {
    try {
        require_once('funciones/bd_conexion.php');
        $sql = "UPDATE `contactos` SET ";
        $sql .= "`nombre` = '{$nombre}', ";
        $sql .= "`telefono` = '{$numero}' ";
        $sql .= "WHERE `id` = '{$id}' ";
        $resultado = $conn->query($sql);
        echo json_encode( array(
          'respuesta' => $resultado,
          'nombre' => $nombre,
          'id' => $id,
          'telefono' => $numero
        ) );
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
    $conn->close();
  }else {
    exit;
  }
?>
