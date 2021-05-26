<?php
if (!$_POST) {
    header("Location: Datos.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $_POST['editar'] ? "EDICION" : "ELIMINACION" ?></title>
</head>

<body>
    <a href="index.html">Regresar al inicio</a>
    <a href="Datos.php">Ver Registros</a>
    <?php
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $mensaje = $_POST['mensaje'];
    ?>
    <?php
    if ($_POST['editar']) { ?>

        <form action="Actualizar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input id="nombre" name="nombre" type="text" value="<?php echo $nombre ?>" placeholder="NOMBRE COMPLETO" required />
            <br />

            <label for="Correo">Correo:</label>
            <input type="email" name="correo" id="correo" value="<?php echo $correo ?>" required />
            <br />

            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="1" max="120" value="<?php echo $edad ?>" required />
            <br />

            <label for="mensaje">Mensaje:</label>
            <br />
            <textarea name="mensaje" id="mensaje" cols="30" rows="10" required><?php echo $mensaje ?></textarea>
            <br />
            <input type="submit" value="EDITAR" name="guardar" />
            <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
        </form>

    <?php } else if ($_POST['eliminar']) { ?>

        <form action="Actualizar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input id="nombre" name="nombre" type="text" value="<?php echo $nombre ?>" readonly />
            <br />

            <label for="Correo">Correo:</label>
            <input type="email" name="correo" id="correo" value="<?php echo $correo ?>" readonly />
            <br />

            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="1" max="120" value="<?php echo $edad ?>" readonly />
            <br />

            <label for="mensaje">Mensaje:</label>
            <br />
            <textarea name="mensaje" id="mensaje" cols="30" rows="10" readonly><?php echo $mensaje ?></textarea>
            <br />
            <p>¿DESEA ELIMINAR ESTE REGISTRO?</p>
            <br />
            <input type="submit" value="SI" name="si" />
            <input type="submit" value="NO" name="no" />
            <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
        </form>
    <?php } ?>

    <?php
    if ($_POST['no']) {
        header("Location: Datos.php");
    } else if ($_POST['si']) {
        include('Consultas.php');
        eliminar(intval($_POST['id']));
        header("Location: Datos.php");
    } else if($_POST['guardar']){
        include('Consultas.php');
        actualizar($_POST['id'], $_POST['nombre'], $_POST['correo'], intval($_POST['edad']), $_POST['mensaje']);
        header("Location: Datos.php");
    }
    ?>
</body>

</html>