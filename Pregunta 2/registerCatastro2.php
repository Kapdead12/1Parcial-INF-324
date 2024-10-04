
<?php

$conexion = new mysqli("localhost", "root", "", "bdjoaquin");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $persona_id = $_POST['id_persona'];
    $propiedad_id = $_POST['id_propiedad'];

    if ($_POST['accion'] == 'adicionar'){
        $sql = "INSERT INTO persona_prop (persona_id, propiedad_id) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $persona_id, $propiedad_id);

        if ($stmt->execute()) {
            header("Location: ../Pregunta 2/registerCatastro.php?mensaje=adicionado");  
            exit();
        } else {
            header("Location: ../Pregunta 2/registerCatastro.php?mensaje=Noadicionado");  
            exit();
        }
    } elseif ($_POST['accion'] == 'eliminar'){

        $sql = "DELETE FROM persona_prop WHERE persona_id = ? AND propiedad_id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $persona_id, $propiedad_id);

        if ($stmt->execute()) {
            header("Location: ../Pregunta 2/registerCatastro.php?mensaje=eliminado");
            exit();
        }
    }

    $stmt->close();
}
$conexion->close();
?>
