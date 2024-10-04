<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades Totales</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
            margin: 30px;
        }
    </style>
</head>
<body>
  <h2 class="fw-bold mb-4">Propiedades Totales Registradas</h2>
  <table data-toggle="table" class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Superficie</th>
          <th>Xini</th>
          <th>Yini</th>
          <th>Xfin</th>
          <th>Yfin</th>
          <th>Cod_Catastral</th>
          <th>Zona id</th>
        </tr>
      </thead>
      <tbody>
        <?php
           $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
           $sql = "SELECT *
                   FROM Propiedad";
           $resultado = mysqli_query($conexion, $sql);
           while ($fila = $resultado->fetch_assoc()) {
               echo "<tr>";
               echo "<td>" . $fila['id'] . "</td>";
               echo "<td>" . $fila['superficie'] . "</td>";
               echo "<td>" . $fila['xini'] . "</td>";
               echo "<td>" . $fila['yini'] . "</td>";
               echo "<td>" . $fila['xfin'] . "</td>";
               echo "<td>" . $fila['yfin'] . "</td>";
               echo "<td>" . $fila['codigo_catastral'] . "</td>";
               echo "<td>" . $fila['zona_id'] . "</td>";
               echo "<td>";
               echo "</td>";
               echo "</tr>";
            }
         ?>
      </tbody>
    </table>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>