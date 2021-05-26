<?php
function registrar(string $nombre, string $correo, int $edad, string $mensaje)
{
    $conn = new mysqli('localhost', 'root', 'mysql', 'CRUD');

    if (mysqli_connect_errno()) {
        return 0;
    }

    $stmt = $conn->prepare('INSERT INTO datos VALUES (NULL, ?, ?, ?, ?)');
    $stmt->bind_param('ssis', $nombre, $correo, $edad, $mensaje);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return 1;
}

function consultar()
{
    $conn = new mysqli('localhost', 'root', 'mysql', 'CRUD');

    if (mysqli_connect_errno()) {
        return 0;
    }

    if ($res = $conn->query("SELECT * FROM DATOS")) {
        $datos = array();
        while ($fila = $res->fetch_row()) {
            $datos[$fila[0]]['id'] = $fila[0];
            $datos[$fila[0]]['nombre'] = $fila[1];
            $datos[$fila[0]]['correo'] = $fila[2];
            $datos[$fila[0]]['edad'] = $fila[3];
            $datos[$fila[0]]['mensaje'] = $fila[4];
        }
        $conn->close();
        return $datos;
    }
}

function eliminar(int $id){
    $conn = new mysqli('localhost', 'root', 'mysql', 'CRUD');

    if (mysqli_connect_errno()) {
        return;
    }

    $stmt = $conn->prepare('DELETE FROM datos WHERE ID=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function actualizar(int $id, string $nombre, string $correo, int $edad, string $mensaje){
    $conn = new mysqli('localhost', 'root', 'mysql', 'CRUD');

    if (mysqli_connect_errno()) {
        return 0;
    }

    $query = 'UPDATE datos SET Nombre=?, Correo=?, Edad=?, Mensaje=? WHERE ID=?';

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssisi', $nombre, $correo, $edad, $mensaje, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return 1;
}
