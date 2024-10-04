
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMLP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .gradient-custom-2 {
        background: #fccb90;

        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        background: linear-gradient(to right, #fcd34d,#ff7e5f, #6a11cb);
      }

      @media (min-width: 768px) {
        .gradient-form {
        height: 100vh !important;
        }
      }
      @media (min-width: 769px) {
        .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
        }
      }
    </style>

</head>
<body>

  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <h4 class="mt-1 mb-5 pb-1">Iniciar Sesion</h4>
                  </div>

                  <form action="login.php" method="POST">
                    <p>Por favor ingresa tus datos</p>

                      <div data-mdb-input-init class="form-outline mb-4">
                          <input type="email" id="form2Example11" name="email" class="form-control" />
                          <label class="form-label" for="form2Example11">Email</label>
                      </div>

                      <div data-mdb-input-init class="form-outline mb-4">
                          <input type="password" id="form2Example22" name="password" class="form-control" />
                          <label class="form-label" for="form2Example22">Password</label>
                      </div>

                      <div class="text-center pt-1 mb-5 pb-1">
                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Iniciar Sesion</button>
                      </div>

                      <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">No tienes cuenta?</p>
                          <a type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger" href="register.php">Registrarte</a>
                      </div>
                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>

<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bdjoaquin");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Envemail = $_POST['email'];
    $Envpassword = $_POST['password'];

    // Consulta para verificar el usuario
    $stmt = $conn->prepare("SELECT id, nombre, paterno ,password, rol FROM persona WHERE email = ?");
    $stmt->bind_param("s", $Envemail);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre,$paterno, $password, $rol);
        $stmt->fetch();

        // Verifica la contraseña
        if ($password === $Envpassword) {
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['rol'] = $rol;
            $_SESSION['paterno'] = $paterno;
            header("Location: ../Pregunta 1/dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
        header("Location: login.php");
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>
