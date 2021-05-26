<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTROS</title>
</head>

<body>
    <a href="Registro.php">Registrar Mensaje</a>
    <a href="index.html">Inicio</a>
    <br>
    <?php
    include('Consultas.php');
    $res = consultar();
    if ($res) {
    ?>

        <div class="datos">
            <?php
            foreach ($res as $val) { ?>
                <div class="dato">
                    <form action="Actualizar.php" method="post">
                        <ul>
                            <li>
                                <p>Nombre: <?php echo $val['nombre']; ?></p>
                            </li>
                            <li>
                                <p>Correo: <?php echo $val['correo']; ?></p>
                            </li>
                            <li>
                                <p>Edad: <?php echo $val['edad']; ?></p>
                            </li>
                            <li>
                                <label for="<?php echo "Mensaje_" . $val['id'] ?>">Mensaje</label>
                                <br>
                                <textarea name="<?php echo "Mensaje_" . $val['id'] ?>" id="<?php echo "Mensaje_" . $val['id'] ?>" cols="30" rows="10" readonly><?php echo $val['mensaje'] ?></textarea>
                            </li>
                            <input type="submit" value="EDITAR" name="editar">
                            <input type="submit" value="ELIMINAR" name="eliminar">
                            <input type="hidden" name="id" value="<?php echo $val['id'] ?>">
                            <input type="hidden" name="nombre" value="<?php echo $val['nombre'] ?>">
                            <input type="hidden" name="correo" value="<?php echo $val['correo'] ?>">
                            <input type="hidden" name="edad" value="<?php echo $val['edad'] ?>">
                            <input type="hidden" name="mensaje" value="<?php echo $val['mensaje'] ?>">
                        </ul>
                    </form>
                </div>
            <?php } ?>
        </div class="datos">

    <?php } ?>
</body>

</html>