<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
  <section class="text-center">
    <div class="p-5 bg-image"></div>

    <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="margin-top: -100px; backdrop-filter: blur(30px);">
      <div class="card-body py-5 px-md-3">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-4">Regístrate</h2>
            <form method="POST" action="register.php">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-outline">
                    <input type="text" id="nombre" name="nombre" class="form-control" required />
                    <label class="form-label" for="nombre">Nombre</label>
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-outline">
                    <input type="text" id="paterno" name="paterno" class="form-control" required />
                    <label class="form-label" for="paterno">Paterno</label>
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-outline">
                    <input type="text" id="ci" name="ci" class="form-control" required />
                    <label class="form-label" for="ci">Ci</label>
                  </div>
                </div>
              </div>

              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control" required />
                <label class="form-label" for="email">Email</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" required />
                <label class="form-label" for="password">Password</label>
              </div>

              <button type="submit" class="btn btn-danger btn-block mb-4">Registrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
  $conexion = new mysqli("localhost", "root", "", "bdjoaquin");

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nombre = $_POST['nombre'];
      $apellido = $_POST['paterno'];
      $ci = $_POST['ci']; 
      $email = $_POST['email']; 
      $password = $_POST['password'];

      $sql = "INSERT INTO persona (nombre, paterno, ci, email, password) VALUES (?, ?, ?, ?, ?)";
      $stmt = $conexion->prepare($sql);
      $stmt->bind_param("sssss", $nombre, $apellido, $ci, $email, $password);

      if ($stmt->execute()) {
          header("Location: login.php?mensaje=adicionado");
          exit();
      }else{
          header("Location: login.php?mensaje=Noadicionado");
          exit();
      }

      $stmt->close();
  }
  $conexion->close();
?>