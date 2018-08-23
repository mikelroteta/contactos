<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
  try {
    require_once('funciones/bd_conexion.php');
    $sql = "SELECT * from contactos WHERE `id` = {$id}";
    $resultado = $conn->query($sql);
  } catch (Exception $e) {
    $error = $e->getMessage();
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda PHP</title>
    <link rel="stylesheet" href="css/estilos.css" media="screen">
  </head>
  <body>
    <div class="contenedor">
      <h1>Agenda de Contactos</h1>
      <div class="contenido">
        <h2>Editar Contacto</h2>
        <form action="actualizar.php" method="get">
          <?php while($registro = $resultado->fetch_assoc()) { ?>
            <div class="campo">
              <label for="nombre">Nombre
              </label>
              <input type="text" value="<?php echo $registro['nombre'] ?>" name="nombre" id="nombre" placeholder="nombre">
            </div>
            <div class="campo">
              <label for="numero">Numero
              </label>
              <input type="text" value="<?php echo $registro['telefono'] ?>" name="numero" id="numero" placeholder="numero">
            </div>
            <input type="hidden" name="id" value="<?php echo $registro['id'];?>">
            <input type="submit" value="Modificar">
          <?php } ?>
        </form>
      </div>
    </div>
    <?php
      $conn->close();
     ?>
  </body>
</html>
