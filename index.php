<?php
  try {
    require_once('funciones/bd_conexion.php');
    $sql = 'SELECT * from contactos';
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
        <div id="crear_contacto" class="crear">
          <h2>Nuevo Contacto</h2>
          <form action="crear.php" method="post" id="formulario_crear_usuario">
            <div class="campo">
              <label for="nombre">Nombre
              </label>
              <input type="text" name="nombre" id="nombre" placeholder="nombre">
            </div>
            <div class="campo">
              <label for="numero">Numero
              </label>
              <input type="text" name="numero" id="numero" placeholder="numero">
            </div>
            <input type="submit" value="Agregar" id="agregar" class="boton">
          </form>
        </div>
      </div>
      <div class="contenido existentes">
        <div class="buscar">
          <h2>Buscar</h2>
          <input type="text" id="buscador" name="buscador" placeholder="Buscar" class="buscador">
        </div>
        <h2>Contactos Existentes</h2>
        <p>Resultados: <span id="total"><?php echo $resultado->num_rows; ?></span></p>
        <table id="registrados">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Teléfono</th>
              <th>Editar</th>
              <th>
                <button type="button" name="Borrar" id="btn_borrar" class="borrar">Borrar</button>
                <input type="checkbox" id="borrar_todos">
              </th>
            </tr>
          </thead>

          <tbody>
            <?php while ($registros = $resultado->fetch_assoc()){ ?>
              <tr id="<?php echo $registros['id']; ?>">
                <td>
                  <p><?php echo $registros['nombre']; ?></p>
                  <input type="text" class="nombre_contacto" name="contacto_<?php echo $registros['id']; ?>" value="<?php echo $registros['nombre']; ?>">
                </td>
                <td>
                  <p><?php echo $registros['telefono']; ?></p>
                  <input type="text" class="telefono_contacto" name="telefono_<?php echo $registros['id']; ?>" value="<?php echo $registros['telefono']; ?>">
                </td>
                <td>
                  <a href="#" class="editarBtn">Editar</a>
                  <a href="#" class="guardarBtn">Guardar</a>
                </td>
                <td class="borrar">
                    <input class="borrar_contacto" type="checkbox" name="<?php echo $registros['id']; ?>">
                </td>
              </tr>
            <?php   }?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
      $conn->close();
     ?>
    <script src="js/app.js"></script>
  </body>
</html>
