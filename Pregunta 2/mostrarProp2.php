<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Propiedad</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Resultados de Propiedades</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Superficie</th>
                <th>X Inicio</th>
                <th>Y Inicio</th>
                <th>X Fin</th>
                <th>Y Fin</th>
                <th>Código Catastral</th>
                <th>Zona ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
            $zona_nombre = $_POST['zona_id'];
            $distrito_nombre = $_POST['distrito_id']; 

            if ($zona_nombre) {
                echo "Zona: <strong>$zona_nombre</strong>";
                $sql_zona = "SELECT x1.* 
                              FROM propiedad x1, zona x2
                              WHERE x1.zona_id = x2.id
                              AND x2.nombre LIKE ?";
                
                $stmt = $conexion->prepare($sql_zona);
                $zona_nombre_param = "%{$zona_nombre}%"; 
                $stmt->bind_param("s", $zona_nombre_param);
                $stmt->execute();
                $resultado_zona = $stmt->get_result(); // Obtiene el resultado

               
                while ($fila = $resultado_zona->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['superficie'] . "</td>";
                        echo "<td>" . $fila['xini'] . "</td>";
                        echo "<td>" . $fila['yini'] . "</td>";
                        echo "<td>" . $fila['xfin'] . "</td>";
                        echo "<td>" . $fila['yfin'] . "</td>";
                        echo "<td>" . $fila['codigo_catastral'] . "</td>";
                        echo "<td>" . $fila['zona_id'] . "</td>";
                        echo "</tr>";
                }
                

            } elseif($distrito_nombre) {
                echo "Distrito: <strong>$distrito_nombre</strong>";
                $sql_distrito = "SELECT x1.* 
                                  FROM propiedad x1
                                  JOIN zona x2 ON x1.zona_id = x2.id
                                  JOIN distrito x3 ON x2.distrito_id = x3.id
                                  WHERE x3.nombre LIKE ?";

                $stmt = $conexion->prepare($sql_distrito);
                $distrito_nombre_param = "%{$distrito_nombre}%"; 
                $stmt->bind_param("s", $distrito_nombre_param);
                $stmt->execute();
                $resultado_distrito = $stmt->get_result(); 

                while ($fila = $resultado_distrito->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['superficie'] . "</td>";
                        echo "<td>" . $fila['xini'] . "</td>";
                        echo "<td>" . $fila['yini'] . "</td>";
                        echo "<td>" . $fila['xfin'] . "</td>";
                        echo "<td>" . $fila['yfin'] . "</td>";
                        echo "<td>" . $fila['codigo_catastral'] . "</td>";
                        echo "<td>" . $fila['zona_id'] . "</td>";
                        echo "</tr>";
                }
                
            }
            $stmt->close();
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
