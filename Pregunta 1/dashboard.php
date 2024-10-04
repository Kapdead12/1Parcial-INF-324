<?php
session_start(); 

if (!isset($_SESSION['id'])) {
    header("Location: login.php"); 
    exit();
}

$id=$_SESSION['id'];
$nombre=$_SESSION['nombre'] ;
$rol=$_SESSION['rol'];
$paterno=$_SESSION['paterno'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="https://www.lapaz.bo">
            <img src="Logo_2.png" alt="GAM-LP" class="logo-gamlp">
        </a>
        <a class="navbar-brand" href="https://www.lapaz.bo">
            <img src="Logo_1.png" alt="GAM-LP" class="logo-gamlp">
        </a>
        <a class="" href="https://www.lapaz.bo">
            <img src="Logo_3.jpg" alt="GAM-LP" class="logo-gamlp">
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-4">
                    <a class="btn btn-dark nav-link" href="#">Inicio</a>
                </li>
                <?php if ($rol == 'funcionario'): ?>
                    <li class="nav-item mr-4">
                        <a class="btn btn-dark nav-link" href="../Pregunta 2/registerCatastro.php">Registrar Propiedad</a>
                    </li>
                <?php endif; ?>
                    <li class="nav-item mr-4">
                        <form action="ListarPropiedades.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                            <button type="submit" class="btn btn-dark nav-link">Ver Propiedades Adquiridas</button>
                        </form>
                    </li>

                    <li class="nav-item mr-4">
                        <a class="btn btn-dark nav-link" href="../Pregunta 5/listarPersonas-Impuesto.php">Personas-Impuestos</a>
                    </li>
                
                <li class="nav-item mr-4" >
                    <a class="btn btn-dark nav-link" href="../Pregunta 2/cerrar sesion.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container mt-4">
        <div class="row mb-5">
            <div class="col-md-6 d-flex justify-content-center">
                <video id="introVideo" controls autoplay muted style="width: 100%;">
                    <source src="video.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h2 class="text-white">Bienvenido a la Plataforma GAMLP</h2>
                <p class="text-white">Explora nuestros servicios y trámites para mejorar tu experiencia como ciudadano. Accede a la información de manera rápida y eficiente con nuestra plataforma digital.</p>
                <p class="text-white"><strong>ID:</strong> <?php echo $id; ?></p>
                <p class="text-white"><strong>Nombre:</strong> <?php echo $nombre." ".$paterno; ?></p>
                <p class="text-white"><strong>Rol:</strong> <?php echo $rol; ?></p>

                <a href="#" class="btn btn-light nav-link">Conoce más</a>
            </div>


        </div>

        <!-- Información General -->
        <div class="row">
            <!-- Primer Jumbotron -->
            <div class="col-md-6">
                <div class="jumbotron text-center">
                    <h1 class="display-4">Misión Institucional</h1>
                    <p class="lead">Somos una institución pública municipal renovada, dinámica, transparente e incluyente, que brinda servicios públicos modernos, eficientes, ágiles y planificados, con concertación y participación ciudadana, impulsando una convivencia pacífica en búsqueda de una mejor calidad de vida de la población paceña por el Bien Común.</p>
                    <hr class="my-4">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Visitar Sitio Web</a>
                </div>
            </div>

            <!-- Segundo Jumbotron -->
            <div class="col-md-6">
                <div class="jumbotron text-center">
                    <h1 class="display-4">Visión Institucional</h1>
                    <p class="lead">Ser una institución pública modelo de gestión municipal democrática, eficiente, innovadora y tecnológica, que dinamiza la economía, el desarrollo social y territorial; consolidando una La Paz saludable, competitiva, biodiversa y resiliente, ordenada e interconectada, con diálogo y reconciliación por el Bien Común.</p>
                    <hr class="my-4">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Explorar Servicios</a>
                </div>
            </div>
        </div>

        <!-- Tipos de Trámites -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        Legalizaciones
                    </div>
                    <div class="card-body">
                        <p class="card-text">Obtén información sobre los procesos de legalización de propiedades y documentos.</p>
                        <a href="legalizacion.php" class="btn btn-primary">Más Información</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        Certificaciones Catastrales
                    </div>
                    <div class="card-body">
                        <p class="card-text">Solicita certificaciones relacionadas con el catastro de propiedades.</p>
                        <a href="certificaciones catastrales.php" class="btn btn-primary">Más Información</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        Servicios Territoriales
                    </div>
                    <div class="card-body">
                        <p class="card-text">Accede a servicios relacionados con la planificación territorial y urbanística.</p>
                        <a href="Servicios Territoriales.php" class="btn btn-primary">Más Información</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer style="background: linear-gradient(to right, #6a11cb, #ff7e5f, #6a11cb); color: white; padding: 20px 0; text-align: center;">
        <div style="max-width: 1200px; margin: auto; display: flex; justify-content: space-between; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 100px; margin: 5px;">
                <h3 style="color: #fcd34d;">Sobre Nosotros</h3>
                <p>Información general 155 Seguimiento de trámites 155 opción 1 
                    Registro IGOB ciudadano 155 opción 2 
                    Administración tributaria - ATM 155 opción 3 
                    Actividades económicas 155 opción 4</p>
            </div>
            <div style="flex: 1; min-width: 200px; margin: 5px;">
                <h3 style="color: #fcd34d;">Enlaces Útiles</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none;">Inicio</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Productos</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Contacto</a></li>
                    <li><a href="#" style="color: white; text-decoration: none;">Blog</a></li>
                </ul>
            </div>
            <div style="flex: 1; min-width: 100px; margin: 5px;">
                <h3 style="color: #fcd34d;">Contacto</h3>
                <p>Email: jgriezmann77@gmail.com</p>
                <p>Teléfono: +591 78875594</p>
                <div>
                    <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-twitter"></i></a>
                    <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <p style="margin-top: 20px;">© 2024 Tu Chocolatería. Todos los derechos reservados.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>