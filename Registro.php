<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
</head>

<body>
  <a href="index.html">Regresar al inicio</a>
  <a href="Datos.php">Ver Registros</a>
  <form action="Registro.php" method="post">
    <label for="nombre">Nombre:</label>
    <input id="nombre" name="nombre" type="text" placeholder="NOMBRE COMPLETO" required />
    <br />

    <label for="Correo">Correo:</label>
    <input type="email" name="correo" id="correo" required />
    <br />

    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" min="1" max="120" value="18" required />
    <br />

    <label for="mensaje">Mensaje:</label>
    <br />
    <textarea name="mensaje" id="mensaje" cols="30" rows="10" required></textarea>
    <br />
    <input type="submit" value="REGISTRAR" />
  </form>

  <?php
  if ($_POST) {
    include('Consultas.php');
    if (registrar($_POST['nombre'], $_POST['correo'], intval($_POST['edad']), $_POST['mensaje'])) {
    }
  }
  ?>
</body>

</html>