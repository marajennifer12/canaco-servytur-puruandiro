<!--Conexión a la base de datos para el inicio de sesión de los afiliados-->
<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "login_canaco";

// Crear conexión
$conn = new mysqli($host, $user, $password, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Iniciar sesión
session_start();

// Verificar si el usuario está logueado
$usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<!--Fin de la conexión a la base de datos para el inicio de sesión de los afiliados-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CANACO SERVYTUR PURUÁNDIRO</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/logo_canaco_sevytur_puruandiro.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto:wght@300;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 bg-secondary d-none d-lg-block">
                <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <img src="img/logo_canaco_sevytur_puruandiro.png" width="140px" height="140px">
                    <h1 class="m-0 display-4 text-primary text-uppercase">CANACO</h1>
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row bg-white border-bottom d-none d-lg-flex">
                    <div class="col-lg-7 text-left">
                        <div class="h-100 d-inline-flex align-items-center py-2 px-3">
                            <i class="fa fa-envelope text-primary mr-2"></i>
                            <small>canacopu@hotmail.com</small>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2 px-2">
                            <i class="fa fa-phone-alt text-primary mr-2"></i>
                            <small>+1 438-383-0238</small>
                        </div>
                    </div>
                    <div class="col-lg-5 text-right">
                        <div class="d-inline-flex align-items-center p-2">
                            <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="https://www.facebook.com/canaco.puruandiro" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="https://www.instagram.com/canacopu?igsh=a3Jtc3R0OXAyN2Fx" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
                    <a href="index.php" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary text-uppercase">CANACO</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Inicio</a>
                            <a href="negocios.php" class="nav-item nav-link">Negocios</a>
                            <a href="nosotros.php" class="nav-item nav-link">Nosotros</a>
                            <a href="tramites_y_servicios.php" class="nav-item nav-link active">Trámites y servicios</a>
                            <a href="historia.php" class="nav-item nav-link">Historia</a>
                            <a href="noticias.php" class="nav-item nav-link">Noticias</a>
                            <a href="areas_turisticas.php" class="nav-item nav-link">Áreas turísticas</a>
                            <a href="contacto.php" class="nav-item nav-link">Contacto</a>

                            <!--Botón iniciar y cerrar sesión -->
                            <div class="center-text" style="margin-left: 50px;">
                            <!-- Imagen como botón -->
                            <div class="dropdown">
                                <img 
                                    src="img/Icono_inicioSesión.png" 
                                    alt="Opciones de sesión" 
                                    class="img-fluid rounded" 
                                    style="max-width: 60px; cursor: pointer;" 
                                    onclick="toggleMenu()"
                                >
                                <!-- Submenú dinámico -->
                                <div id="sessionMenu" class="dropdown-menu" style="display: none; position: absolute; background-color: #fff; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); padding: 5px; border-radius: 5px;">
                                <?php if (!isset($_SESSION['usuario'])): ?>
                                        <!-- Opción para iniciar sesión -->
                                        <a href="login.php" class="dropdown-item text-left" style="text-decoration: none; color: #333; font-size: 13px;">Iniciar sesión</a>
                                    <?php else: ?>
                                        <!-- Opción para cerrar sesión -->
                                        <a href="cerrar_sesion.php" class="dropdown-item text-left" style="text-decoration: none; color: #333; font-size: 13px;">Cerrar sesión</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Mostrar nombre del usuario si está en sesión -->
                            <?php if (isset($_SESSION['usuario'])): ?>
                                <p><?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
                            <?php endif; ?>
                        </div>

                        <script>
                            // Función para mostrar/ocultar el submenú
                            function toggleMenu() {
                                const menu = document.getElementById('sessionMenu');
                                menu.style.display = menu.style.display === 'none' || menu.style.display === '' ? 'block' : 'none';
                            }

                            // Cerrar el submenú si se hace clic fuera de él
                            document.addEventListener('click', function(event) {
                                const menu = document.getElementById('sessionMenu');
                                const dropdown = menu.parentNode;
                                if (!dropdown.contains(event.target)) {
                                    menu.style.display = 'none';
                                }
                            });
                        </script>
                            <!--Fin de botón iniciar y cerrar sesión -->
                        </div>
                        <!--<a href="" class="btn btn-primary mr-3 d-none d-lg-block">Negocios</a>-->
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->


 <!-- Page Header Start -->
<div class="container-fluid bg-page-header" style="margin-bottom: 90px; background-image: url('img/Trámites.jpg'); background-size: cover; background-position: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div> <!-- Ajusta el valor de transparencia aquí -->
    <div class="container" style="position: relative; z-index: 2;">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px;">
            <h3 class="display-3 text-white text-uppercase">Trámites y Servicios</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="index.html">Inicio</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Trámites y Servicios</p>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3">
                    <h6 class="text-uppercase">Nuetros servicios</h6>
                    <h1 class="mb-4">Our Practice Areas</h1>
                    <p>Invidunt lorem justo clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum</p>
                    <a href="" class="btn btn-primary mt-2">Más servicios</a>
                </div>
                <div class="col-lg-9 pt-5 pt-lg-0">
                    <div class="bg-primary rounded" style="height: 200px;"></div>
                    <div class="owl-carousel service-carousel position-relative" style="margin-top: -100px; padding: 0 30px;">
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-landmark"></i>
                            </div>
                            <h5 class="mb-4 px-4">Asesoría contable y fiscal</h5>
                            <p class="m-0">Suspensión de actividades, Reactivación, Inscripción y Deeclaraciones mensuales y bimestrales.</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-users"></i>
                            </div>
                            <h5 class="mb-4 px-4">Renta de espacios para conferencias</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-hand-holding-usd"></i>
                            </div>
                            <h5 class="mb-4 px-4">Solicitud de citas al SAT</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Solicitud de citas de Pasaporte</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Pagos de Pasaporte</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Tarjeta Cinepolis</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Eventos de octubre mes del comercio y Buen Fin</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Escritorio Público</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Asesoría para el programa Jóvenes Construyendo el Futuro</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Bolsa de Trabajo</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Trámite y Revalidación de Licencia Municipal</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Trámite de CURP</h5>
                            <p class="m-0">Inf...</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Internet Inalámbrico</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Servicios de envió y mensajería por Internet</h5>
                            <p class="m-0">inf...</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Viajes Turísticos para tus Vacaciones</h5>
                            <p class="m-0">inf....</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Convenios de Colaboración con:</h5>
                            <p class="m-0">Presidencia, Tecnológico e ICATMI</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Capacitaciones constantes durante todo el año</h5>
                            <p class="m-0">inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Conferencias con funcionarios de IMSS, INFONAVIT, SAT y Desarrollo Económico</h5>
                            <p class="m-0">Inf..</p>
                        </div>
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                            <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                                <i class="fa fa-2x fa-gavel"></i>
                            </div>
                            <h5 class="mb-4 px-4">Participación de eventos Comerciales, Sociales, Culturales con Gobiernos Estatales y Municipal</h5>
                            <p class="m-0">Takim stet justo elitr sea eirmod vero ipsum. Sed Stet clita sit duo dolor stet at at. Tempor dolor sit ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Action Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-action rounded" style="height: 500px;">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-7 text-center">
                        <h1 class="text-white mb-4">Let's get started. Call us now for a Free Consultation</h1>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="#">Call Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Action End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center pb-5">
                <h6 class="text-uppercase">Testimonial</h6>
                <h1 class="mb-5">What Our Clients Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item">
                    <div class="testimonial-text position-relative bg-secondary text-light rounded p-5 mb-4">
                        Sed ea amet kasd elitr stet nonumy, stet rebum et ipsum est duo elitr clita lorem
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <img class="img-fluid rounded-circle" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="pl-4">
                            <h5>Client Name</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text position-relative bg-secondary text-light rounded p-5 mb-4">
                        Sed ea amet kasd elitr stet nonumy, stet rebum et ipsum est duo elitr clita lorem
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <img class="img-fluid rounded-circle" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="pl-4">
                            <h5>Client Name</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text position-relative bg-secondary text-light rounded p-5 mb-4">
                        Sed ea amet kasd elitr stet nonumy, stet rebum et ipsum est duo elitr clita lorem
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <img class="img-fluid rounded-circle" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="pl-4">
                            <h5>Client Name</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text position-relative bg-secondary text-light rounded p-5 mb-4">
                        Sed ea amet kasd elitr stet nonumy, stet rebum et ipsum est duo elitr clita lorem
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <img class="img-fluid rounded-circle" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="pl-4">
                            <h5>Client Name</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-secondary text-white pt-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, .05);">
                    <i class="fa fa-2x fa-map-marker-alt text-primary"></i>
                    <div class="ml-3">
                        <h5 class="text-white">Ubicación</h5>
                        <p class="m-0">Matamoros #64, Col. Centro, C.P:58500 Puruándiro, Mich.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, .05);">
                    <i class="fa fa-2x fa-envelope-open text-primary"></i>
                    <div class="ml-3">
                        <h5 class="text-white">Correo</h5>
                        <p class="m-0">canacopu@hotmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, .05);">
                    <i class="fa fa-2x fa-phone-alt text-primary"></i>
                    <div class="ml-3">
                        <h5 class="text-white">Teléfono</h5>
                        <p class="m-0">+1 438-383-0238</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="index.php" class="navbar-brand">
                    <h1 class="m-0 mt-n2 display-4 text-primary text-uppercase">CANACO</h1>
                </a>
                <p class="text-canaco" style="text-align: justify;">La Cámara Nacional de Comercio, Servicio y Turismo de Puruándiro, es una Institución de interés público, autómata, con personalidad jurídica 
                    y patrimonio propio constituido, conforme a los dispuesto en la Ley de Cámaras Empresariales y sus Confederaciones.
                </p>                                
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-lg btn-outline-canaco btn-lg-square mr-2" href="https://www.facebook.com/canaco.puruandiro" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-canaco btn-lg-square" href="https://www.instagram.com/canacopu?igsh=a3Jtc3R0OXAyN2Fx" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-semi-bold text-primary mb-4">Enlaces populares</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-canaco mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Inicio</a>
                    <a class="text-canaco mb-2" href="nosotros.html"><i class="fa fa-angle-right mr-2"></i>Nosotros</a>
                    <a class="text-canaco mb-2" href="tramites_y_servicios.html"><i class="fa fa-angle-right mr-2"></i>Trámites y servicios</a>
                    <a class="text-canaco mb-2" href="historia.html"><i class="fa fa-angle-right mr-2"></i>Historia</a>
                    <a class="text-canaco" href="noticias.html"><i class="fa fa-angle-right mr-2"></i>Noticias</a>
                    <a class="text-canaco" href="contacto.html"><i class="fa fa-angle-right mr-2"></i>Contacto</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-semi-bold text-primary mb-4">Enlaces rápidos</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-canaco mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>FAQs</a>
                    <a class="text-canaco mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Ayuda</a>
                    <a class="text-canaco mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Términos</a>
                    <a class="text-canaco mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Privacidad</a>
                    <a class="text-canaco" href="#"><i class="fa fa-angle-right mr-2"></i>Mapa del sitio</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-semi-bold text-primary mb-4">Contacto</h4>
                <p class="text-canaco">Si tienes dudas o preguntas, no dudes en contactarnos a través de nuestro correo. Te responderemos a la brevedad posible.</p>
                <div class="w-100">
                    <div class="input-group">
                            <a href="contacto.php" class="btn btn-primary mr-3 d-none d-lg-block">Contacto</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-4 mt-5 mx-0" style="background: rgba(256, 256, 256, .05);">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a class="font-weight-bold text-canaco" href="#">CANACO SERVYTUR PURUÁNDIRO</a>. Todos los Derechos Reservados.</p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <p class="m-0 text-white">Diseñado por <a class="font-weight-bold text-canaco" href="https://htmlcodex.com">HTML Codex</a></p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary px-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>