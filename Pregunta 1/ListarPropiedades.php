<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Propiedades</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Propiedades Adquiridas</h2>
        <form action="http://localhost:8090/impuestoCatastral/tipoImpuesto.jsp" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Paterno</th>
                        <th>X Inicio</th>
                        <th>Y Inicio</th>
                        <th>X Fin</th>
                        <th>Y Fin</th>
                        <th>Superficie</th>
                        <th>Código Catastral</th>
                        <th>Zona</th>
                        <th>Distrito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Conectar a la base de datos
                        $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");

                        // Verificar conexión
                        if (!$conexion) {
                            die("Conexión fallida: " . mysqli_connect_error());
                        }

                        // Verificar que 'id' esté definido en POST
                        if (isset($_POST['id'])) {
                            $persona_id = $_POST['id'];

                            // Consulta para obtener propiedades por ID de persona
                            $sql = "SELECT x1.nombre AS persona_nombre,
                                           x1.paterno AS persona_paterno,
                                           x3.xini,
                                           x3.yini,
                                           x3.xfin,
                                           x3.yfin,
                                           x3.superficie,
                                           x3.codigo_catastral,
                                           x4.nombre AS zona_nombre,
                                           x5.nombre AS distrito_nombre
                                    FROM persona x1
                                    JOIN persona_prop x2 ON x1.id = x2.persona_id
                                    JOIN propiedad x3 ON x2.propiedad_id = x3.id
                                    JOIN zona x4 ON x3.zona_id = x4.id
                                    JOIN distrito x5 ON x4.distrito_id = x5.id
                                    WHERE x1.id = ?;";

                            // Preparar y ejecutar la consulta
                            $stmt = $conexion->prepare($sql);
                            $stmt->bind_param("i", $persona_id); // "i" indica que es un entero
                            $stmt->execute();
                            $resultado = $stmt->get_result(); 

                            // Arreglo para almacenar códigos catastrales
                            $codigos_catastrales = [];

                            // Verificar si hay resultados
                            if ($resultado->num_rows > 0) {
                                while ($fila = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($fila['persona_nombre']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['persona_paterno']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['xini']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['yini']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['xfin']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['yfin']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['superficie']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['codigo_catastral']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['zona_nombre']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['distrito_nombre']) . "</td>";
                                    echo "</tr>";

                                    // Almacena el código catastral en el arreglo
                                    $codigos_catastrales[] = $fila['codigo_catastral'];
                                }
                            } else {
                                echo "<tr><td colspan='10'>No se encontraron propiedades.</td></tr>";
                            }

                            // Cerrar la declaración
                            $stmt->close();
                        } else {
                            echo "<tr><td colspan='10'>No se proporcionó un ID de persona.</td></tr>";
                        }

                        // Cerrar la conexión
                        $conexion->close();
                    ?>
                </tbody>
            </table>
            
            <?php foreach ($codigos_catastrales as $codigo): ?>
                <input type="hidden" name="codigos_catastrales[]" value="<?php echo $codigo; ?>">
            <?php endforeach; ?>

            <button type="submit" class="btn btn-danger">Obtener Tipo de Impuesto</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
