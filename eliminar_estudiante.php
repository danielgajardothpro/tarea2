<?php
if (isset($_GET['id'])) {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "admin", "instituto_andres_bello");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $id = $_GET['id'];

    // Eliminar el estudiante de la base de datos
    $sql = "DELETE FROM estudiantes WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al index.php con un mensaje de éxito
        header("Location: index.php?mensaje=Eliminación exitosa");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "ID de estudiante no proporcionado";
    exit;
}
?>
