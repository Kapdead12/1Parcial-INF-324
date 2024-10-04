<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Propiedad</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
            margin: 30px;
        }
    </style>
</head>
<body>
  <h2 class="fw-bold mb-4">Regístrar Catastro a Persona</h2>
  <h3 class="fw-bold">Personas</h3>
  <a class="btn btn-success" href="register.php">Agregar Persona</a>
  <a class="btn btn-warning" href="registerProp.php">Agregar Propiedad</a>
  <a class="btn btn-dark" href="mostrarProp.php">Buscar Propiedad</a>
  <a class="btn btn-primary" href="propTotales.php">Mostrar Propiedades Totales</a>
  <table data-toggle="table" class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Paterno</th>
          <th>Ci</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
        $sql = "SELECT * FROM persona";
        $resultado = mysqli_query($conexion, $sql);
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['paterno'] . "</td>";
            echo "<td>" . $fila['ci'] . "</td>";
            echo "<td>" . $fila['email'] . "</td>";
            echo "<td>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
      </tbody>

    </table>

    <h3 class="fw-bold">Propiedades Disponibles</h3>
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
                  FROM Propiedad
                  WHERE id NOT IN (SELECT propiedad_id FROM persona_prop)";
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

    <h3 class="fw-bold">Personas y Propiedades</h3>
      <table data-toggle="table" class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Persona_id</th>
              <th>Propiedad_id</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
            $sql = "SELECT * FROM persona_prop";
            $resultado = mysqli_query($conexion, $sql);
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['persona_id'] . "</td>";
                echo "<td>" . $fila['propiedad_id'] . "</td>";
                echo "<td>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
    </table>

    <section class="text-center">
      <!-- Background image -->
      <div class="p-5 bg-image"></div>

      <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
            margin-top: -100px;
            backdrop-filter: blur(30px);
            ">
        <div class="card-body py-5 px-md-5">

          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <form method="POST" action="registerCatastro2.php">
                <div class="row">

                  <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="id_persona" name="id_persona" class="form-control" required />
                            <label class="form-label" for="id_persona">ID Persona</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="id_propiedad" name="id_propiedad" class="form-control" required />
                            <label class="form-label" for="id_propiedad">ID Propiedad</label>
                        </div>
                    </div>
                </div>


                 <button type="submit" name="accion" value="adicionar" class="btn   btn-success btn-block mb-4">
                    Registrar Propiedad a Persona
                  </button>
                  <button type="submit" name="accion" value="eliminar" class="btn btn-danger btn-block mb-4">
                    Eliminar Propiedad a Persona
                  </button>
                <a class="btn btn-danger" href="../Pregunta 1/Dashboard.php">Volver Dashboard</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  
    

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
