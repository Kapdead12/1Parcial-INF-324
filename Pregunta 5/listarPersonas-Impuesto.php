<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas-Impuestos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Personas-Impuestos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tipo de Impuesto</th>
                    <th>Personas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
                    $sql = "SELECT 
                                CASE 
                                    WHEN x3.codigo_catastral LIKE '%1' THEN 'Bajo'
                                    WHEN x3.codigo_catastral LIKE '%2' THEN 'Medio'
                                    WHEN x3.codigo_catastral LIKE '%3' THEN 'Alto'
                                    ELSE 'Null'
                                END AS Tipo_impuesto,
                                GROUP_CONCAT(CONCAT(x1.nombre, ' ', x1.paterno) SEPARATOR ', ') AS Personas
                            FROM 
                                persona x1
                                JOIN persona_prop x2 ON x1.id = x2.persona_id
                                JOIN propiedad x3 ON x2.propiedad_id = x3.id
                            GROUP BY Tipo_impuesto
                            ORDER BY Tipo_impuesto";

                    $resultado = $conexion->query($sql);

                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $fila['Tipo_impuesto'] . "</td>";
                            echo "<td>" . $fila['Personas'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
                    }

                    $conexion->close();
                ?>
            </tbody>
        </table>

        <h2>Personas-Impuestos Pivotizado</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Bajo</th>
                    <th>Medio</th>
                    <th>Alto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
                    $sql = "SELECT 
                                GROUP_CONCAT(CASE 
                                                WHEN x3.codigo_catastral LIKE '%1' THEN CONCAT(x1.nombre, ' ', x1.paterno)
                                                ELSE NULL
                                            END SEPARATOR '\n') AS Bajo,
                                GROUP_CONCAT(CASE 
                                                WHEN x3.codigo_catastral LIKE '%2' THEN CONCAT(x1.nombre, ' ', x1.paterno)
                                                ELSE NULL
                                            END SEPARATOR '\n') AS Medio,
                                GROUP_CONCAT(CASE 
                                                WHEN x3.codigo_catastral LIKE '%3' THEN CONCAT(x1.nombre, ' ', x1.paterno)
                                                ELSE NULL
                                            END SEPARATOR '\n') AS Alto
                            FROM persona x1
                            JOIN persona_prop x2 ON x1.id = x2.persona_id
                            JOIN propiedad x3 ON x2.propiedad_id = x3.id";

                    $resultado = $conexion->query($sql);

                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . nl2br($fila['Bajo']) . "</td>";
                            echo "<td>" . nl2br($fila['Medio']) . "</td>";
                            echo "<td>" . nl2br($fila['Alto']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No se encontraron resultados.</td></tr>";
                    }

                    $conexion->close();
                ?>
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>





