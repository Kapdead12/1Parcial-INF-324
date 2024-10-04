<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Propiedad</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .table-container {
            display: flex;
            margin: 20px; /* Margen alrededor del contenedor */
        }
        .table {
            width: 45%; /* Ajusta el ancho de cada tabla */
            margin-right: 10px; /* Margen entre las tablas */
        }
        .form-container {
            width: 50%; /* Ajusta el ancho de la sección del formulario */
        }
    </style>
</head>
<body>
    <div class="table-container">
        <div>
            <h3 class="fw-bold">Zonas</h3>
            <table data-toggle="table" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Distrito_Id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
                    $sql = "SELECT * FROM zona";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['distrito_id'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div>
            <h3 class="fw-bold">Distritos</h3>
            <table data-toggle="table" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "bdjoaquin");
                    $sql = "SELECT * FROM distrito";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="form-container">
            <h2 class="fw-bold mb-4">Buscar Propiedad</h2>
            <section class="text-center">
                <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="margin-top: 20px;">
                    <div class="card-body py-5 px-md-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <form method="POST" action="mostrarProp2.php">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="zona_id" name="zona_id" class="form-control" />
                                                <label class="form-label" for="id_persona">Zona</label>
                                            </div>
                                        </div>

                                        <button type="submit" name="accion" value="zona" class="btn btn-success btn-block mb-4">
                                          Buscar por Zona
                                        </button>

                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="distrito_id" name="distrito_id" class="form-control"  />
                                                <label class="form-label" for="id_propiedad">Distrito</label>
                                            </div>
                                        </div>
                                         <button type="submit" name="accion" value="distrito" class="btn btn-success btn-block mb-4">
                                            Buscar por Distrito
                                        </button>
                                    </div>
                                    <a class="btn btn-danger" href="../Pregunta 1/Dashboard.php">Volver Dashboard</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
