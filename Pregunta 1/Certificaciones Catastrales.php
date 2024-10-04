<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificaciones Catastrales</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Bebas Neue', cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #27231C; /* Fondo oscuro para contraste */
            color: #ffffff; /* Texto blanco para mejor visibilidad */
        }

        .row {
            width: 90%;
            margin: 30px auto;
            text-align: center;
        }

        h2 {
            color: #ffffff; /* Color dorado para el título */
            font-size: 3em;
            margin-bottom: 20px;
        }
        h3 {

            color: #DBFD01; /* Color dorado para el título */
            font-size: 3em;
            margin-bottom: 20px;
        }

        p {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: #fffff; 
            font-size: 2em;
            margin-bottom: 20px;
        }

        .column {
            min-width: 25%;
            padding: 20px;
            opacity: 0.7; 
            transition: opacity 0.5s ease;
            cursor: pointer;
            background: linear-gradient(to right, #ff7e5f, #6a11cb);
            border-radius: 10px;
            margin: 0 10px;
        }

        .column.active {
            opacity: 1; /* Totalmente visible para la columna activa */
            transform: scale(1.05); /* Leve aumento para la columna activa */
        }

        .prev, .next {
            position: absolute;
            font-size: 2em;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            transform: translateY(-250%);
            transition: background 0.3s;
        }

        .prev:hover, .next:hover {
            background: #6a11cb; /* Color dorado al pasar el mouse */
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
        .logo-container {
            display: flex;
            justify-content: center;
            gap: 10%; /* Ajusta el valor según el espacio que desees */
        }

    </style>
</head>

<body>
    <section>
        <div class="row">
            <h2>Trámites Certificaciones Catastrales</h2>
            <div class="nav">
                    <div class="column active">
                        <h3>Nuevo Registro Catastral mediante profesional externo</h3>
                        <div class="col-md-6 logo-container">
                            <img src="Imagen_1.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_2.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_3.jpg" alt="GAM-LP" class="logo-gamlp">
                        </div>
                        <p>GAMLP 7 de julio de 2023</p>
                        <p>Este servicio permite a los profesionales externos registrar nuevas propiedades en el sistema catastral de la ciudad.</p>
                    </div>
                    <div class="column">
                        <h3>Actualización de Registro Catastral</h3>
                        <div class="col-md-6 logo-container">
                            <img src="Imagen_4.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_5.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_6.jpg" alt="GAM-LP" class="logo-gamlp">
                        </div>
                        <p>GAMLP 6 de junio de 2023</p>
                        <p>Actualiza la información catastral de una propiedad existente para reflejar cambios recientes.</p>
                    </div>
                    <div class="column">
                        <h3>Duplicado de Certificado de Registro Catastral</h3>
                        <div class="col-md-6 logo-container">
                            <img src="Imagen_7.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_8.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_6.jpg" alt="GAM-LP" class="logo-gamlp">
                        </div>
                        
                        <p>GAMLP 18 de mayo de 2023</p>
                        <p>Obtén una copia adicional del certificado de registro catastral de tu propiedad.</p>
                    </div>
                    <div class="column">
                        <h3>Actualización de registro catastral a solicitud directa</h3>
                        <div class="col-md-6 logo-container">
                            <img src="Imagen_1.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_3.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_5.jpg" alt="GAM-LP" class="logo-gamlp">
                        </div>
                        <p>GAMLP 18 de mayo de 2023</p>
                        <p>Solicita directamente la actualización de los datos catastrales de tu propiedad.</p>
                    </div>
                    <div class="column">
                        <h3>Duplicado de Certificado de Registro Catastral - en línea</h3>
                        <div class="col-md-6 logo-container">
                            <img src="Imagen_2.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_4.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_7.jpg" alt="GAM-LP" class="logo-gamlp">
                        </div>
                        <p>GAMLP 18 de mayo de 2023</p>
                        <p>Solicita y recibe un duplicado del certificado de registro catastral de manera digital.</p>
                    </div>
                    <div class="column">
                        <h3>Servicio Municipal de Registro Catastral</h3>
                        <div class="col-md-6 logo-container">
                            <img src="Imagen_1.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_5.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_7.jpg" alt="GAM-LP" class="logo-gamlp">
                        </div>
                        
                        <p>GAMLP 18 de mayo de 2023</p>
                        <p>Accede a los servicios municipales relacionados con el registro catastral de propiedades.</p>
                    </div>
                    <div class="column">
                        <h3>Notificación de Actualización Catastral</h3>
                        <div class="col-md-6 logo-container">
                            <img src="Imagen_2.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_6.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_7.jpg" alt="GAM-LP" class="logo-gamlp">
                        </div>
                        
                        <p>GAMLP 18 de mayo de 2023</p>
                        <p>Recibe notificaciones sobre actualizaciones en el registro catastral de tu propiedad.</p>
                    </div>
                    <div class="column">
                        <h3>Consulta sobre Registro Catastral</h3>
                        <div class="col-md-6 logo-container">
                            <img src="Imagen_5.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_6.jpg" alt="GAM-LP" class="logo-gamlp">
                            <img src="Imagen_7.jpg" alt="GAM-LP" class="logo-gamlp">
                        </div>
                        
                        <p>GAMLP 18 de mayo de 2023</p>
                        <p>Realiza consultas sobre el estado y los detalles del registro catastral de tu propiedad.</p>
                    </div>

            </div>
            <div class="prev"><</div>
            <div class="next">></div>
        </div>     
    </section>

    <script>
        const dots = document.querySelectorAll('.column');
        let slideIndex = 0;

        function showSlide() {
            if (slideIndex >= dots.length) {
                slideIndex = 0;
            } else if (slideIndex < 0) {
                slideIndex = dots.length - 1;
            }
            dots.forEach((dot, index) => {
                dot.style.display = (index === slideIndex) ? 'block' : 'none';
            });
            // Resaltar el elemento activo
            dots.forEach(dot => dot.classList.remove("active"));
            dots[slideIndex].classList.add("active");
        }

        const prev = document.querySelector('.prev');
        const next = document.querySelector('.next');

        next.addEventListener('click', () => {
            slideIndex++;
            showSlide();
        });
        
        prev.addEventListener('click', () => {
            slideIndex--;
            showSlide();
        });

        showSlide(); // Inicializar la primera visualización
    </script>

</body>
</html>
