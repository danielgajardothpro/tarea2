<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Estudiantil - Instituto Andrés Bello</title>
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
        <h1>Registro Estudiantil</h1>
        <?php
        // Mensaje de éxito si existe
        if (isset($_GET['mensaje'])) {
            echo "<script>alert('" . htmlspecialchars($_GET['mensaje']) . "');</script>";
        }
        ?>
        <form action="procesar_registro.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" id="rut" name="rut" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera a Cursar:</label>
                <select id="carrera" name="carrera" required>
                    <option value="Ingeniería">Ingeniería</option>
                    <option value="Derecho">Derecho</option>
                    <option value="Medicina">Medicina</option>
                    <option value="Arquitectura">Arquitectura</option>
                    <option value="Economía">Economía</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_periodo">Fecha del Período Académico:</label>
                <input type="date" id="fecha_periodo" name="fecha_periodo" required>
            </div>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
