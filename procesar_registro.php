<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $direccion = $_POST['direccion'];
    $carrera = $_POST['carrera'];
    $fecha_periodo = $_POST['fecha_periodo'];

    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "admin", "instituto_andres_bello");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO estudiantes (nombre, apellido, rut, direccion, carrera, fecha_periodo) 
            VALUES ('$nombre', '$apellido', '$rut', '$direccion', '$carrera', '$fecha_periodo')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al index.php con un mensaje de éxito
        header("Location: index.php?mensaje=Registro exitoso");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
