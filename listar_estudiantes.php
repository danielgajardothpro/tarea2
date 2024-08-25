<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Estudiantes - Instituto Andrés Bello</title>
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
        <h1>Listado de Estudiantes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>RUT</th>
                    <th>Dirección</th>
                    <th>Carrera</th>
                    <th>Fecha del Período Académico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conn = new mysqli("localhost", "root", "admin", "instituto_andres_bello");

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Obtener los datos de la base de datos
                $sql = "SELECT * FROM estudiantes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['apellido'] . "</td>";
                        echo "<td>" . $row['rut'] . "</td>";
                        echo "<td>" . $row['direccion'] . "</td>";
                        echo "<td>" . $row['carrera'] . "</td>";
                        echo "<td>" . $row['fecha_periodo'] . "</td>";
                        echo "<td><a href='editar_estudiante.php?id=" . $row['id'] . "'>Editar</a> | <a href='eliminar_estudiante.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este estudiante?\");'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay estudiantes registrados</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
