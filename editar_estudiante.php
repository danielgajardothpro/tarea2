<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "admin", "instituto_andres_bello");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del estudiante
    $sql = "SELECT * FROM estudiantes WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Estudiante no encontrado";
        exit;
    }
} else {
    echo "ID de estudiante no proporcionado";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $direccion = $_POST['direccion'];
    $carrera = $_POST['carrera'];
    $fecha_periodo = $_POST['fecha_periodo'];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', rut='$rut', direccion='$direccion', carrera='$carrera', fecha_periodo='$fecha_periodo' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al index.php con un mensaje de éxito
        header("Location: index.php?mensaje=Actualización exitosa");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante - Instituto Andrés Bello</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Registro Estudiantil</a></li>
            <li><a href="listar_estudiantes.php">Listar Estudiantes</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Editar Estudiante</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($row['apellido']); ?>" required>
            </div>
            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" id="rut" name="rut" value="<?php echo htmlspecialchars($row['rut']); ?>" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($row['direccion']); ?>" required>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera a Cursar:</label>
                <select id="carrera" name="carrera" required>
                    <option value="Ingeniería" <?php if($row['carrera'] == 'Ingeniería') echo 'selected'; ?>>Ingeniería</option>
                    <option value="Derecho" <?php if($row['carrera'] == 'Derecho') echo 'selected'; ?>>Derecho</option>
                    <option value="Medicina" <?php if($row['carrera'] == 'Medicina') echo 'selected'; ?>>Medicina</option>
                    <option value="Arquitectura" <?php if($row['carrera'] == 'Arquitectura') echo 'selected'; ?>>Arquitectura</option>
                    <option value="Economía" <?php if($row['carrera'] == 'Economía') echo 'selected'; ?>>Economía</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_periodo">Fecha del Período Académico:</label>
                <input type="date" id="fecha_periodo" name="fecha_periodo" value="<?php echo htmlspecialchars($row['fecha_periodo']); ?>" required>
            </div>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
