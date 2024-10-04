<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Propiedad</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Carga jQuery antes de usarlo -->
</head>
<body>
  <section class="text-center">
    <div class="p-5 bg-image"></div>

    <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
          margin-top: -100px;
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Registrar Propiedad</h2>
            <form method="POST" action="registerProp2.php">
              <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="xini" name="xini" class="form-control" required />
                        <label class="form-label" for="xini">Coordenada X Inicial</label>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="yini" name="yini" class="form-control" required />
                        <label class="form-label" for="yini">Coordenada Y Inicial</label>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="xfin" name="xfin" class="form-control" required />
                        <label class="form-label" for="xfin">Coordenada X Final</label>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="yfin" name="yfin" class="form-control" required />
                        <label class="form-label" for="yfin">Coordenada Y Final</label>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="superficie" name="superficie" class="form-control" required />
                        <label class="form-label" for="superficie">Superficie</label>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="codigo_catastral" name="codigo_catastral" class="form-control" required />
                        <label class="form-label" for="codigo_catastral">Código Catastral</label>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="distrito">Distrito:</label>
                        <select id="distrito" name="distrito" class="form-control" required>
                            <option value="">Seleccione un distrito</option>
                            <?php
                                $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
                                $sql = "SELECT id, nombre FROM distrito";
                                $resultado = $conexion->query($sql);
                                if ($resultado->num_rows > 0) {
                                    while ($fila = $resultado->fetch_assoc()) {
                                        echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                                    }
                                }
                                $conexion->close();
                            ?>
                        </select>
                    </div>

                    <div class="form-group mb-5">
                        <label for="zona">Zona:</label>
                        <select id="zona" name="zona" class="form-control" disabled required>
                            <option value="">Seleccione una zona</option>
                        </select>
                    </div>
                </div>

              <button type="submit" class="btn btn-danger btn-block mb-4">
                Registrar
              </button>
               <a class="btn btn-danger" href="../Pregunta 1/Dashboard.php">Volver Dashboard</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
        $('#distrito').change(function() {
            var distritoId = $(this).val();
            if (distritoId) {
                $.ajax({
                    url: '../Pregunta 6/Buscar_zonas.php', 
                    type: 'POST',
                    data: {id: distritoId},
                    dataType: 'json',
                    success: function(data) {
                        $('#zona').empty().append('<option value="">Seleccione una zona</option>');
                        $.each(data, function(key, value) {
                            $('#zona').append('<option value="' + key + '">' + value + '</option>');
                        });
                        $('#zona').prop('disabled', false);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
                    }
                });
            } else {
                $('#zona').empty().append('<option value="">Seleccione una zona</option>').prop('disabled', true);
            }
        });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
