<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "Dou.270905";
    $basededatos = "Ayala_Dzib_Canul";

    // Crear conexión
    $conexion = new mysqli($servidor, $usuario, $password, $basededatos);

    // Verificar conexión
    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }

    // Obtener datos del formulario
    $id_musico = $_POST['id_musico'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $instrumento = $_POST['instrumento'];
    $estado = $_POST['estado'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha_ingreso = $_POST['fecha_ingreso'];

    // Crear consulta para ejecutar procedimiento almacenado
    $sql = "CALL Crear_Musico('$nombre','$apellido','$genero','$instrumento','$estado','$nacionalidad','$fecha_ingreso')";

    // Ejecutar consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "
" . $conexion->error;
    }

    // Cerrar conexión
    $conexion->close();
?>
