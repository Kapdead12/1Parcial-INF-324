
<?php
    $conexion = new mysqli("localhost", "root", "", "bdjoaquin");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $xini = $_POST['xini'];
        $yini = $_POST['yini'];
        $xfin = $_POST['xfin'];
        $yfin = $_POST['yfin'];
        $superficie = $_POST['superficie'];
        $codigo_catastral = $_POST['codigo_catastral'];
        $zona_id = $_POST['zona']; 

        $sql = "INSERT INTO propiedad (xini, yini, xfin, yfin, superficie, codigo_catastral, zona_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Cambia 'dddddsi' según los tipos de datos correctos
            $stmt->bind_param("dddddsi", $xini, $yini, $xfin, $yfin, $superficie, $codigo_catastral, $zona_id);

            if ($stmt->execute()) {
                header("Location: registerProp.php?mensaje=adicionado");
                exit();
            } else {
                header("Location: registerProp.php?mensaje=Noadicionado");
            }
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $conexion->error;
        }
    }

    $conexion->close(); 
?>
