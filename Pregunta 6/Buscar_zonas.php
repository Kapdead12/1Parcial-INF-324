<?php
    if (isset($_POST['id'])) {
        $distrito_id = intval($_POST['id']); 
        $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
        $sql = "SELECT id, nombre FROM zona WHERE distrito_id = ?";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $distrito_id);
            $stmt->execute();
            $resultado = $stmt->get_result();

            $zonas = [];
            while ($fila = $resultado->fetch_assoc()) {
                $zonas[$fila['id']] = $fila['nombre'];
            }
            echo json_encode($zonas);

            $stmt->close();
        } else {
            echo json_encode(["error" => "Error en la preparación de la consulta: " . $conexion->error]);
        }

        $conexion->close();
    }
?>
