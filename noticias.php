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
                            <a href="tramites_y_servicios.php" class="nav-item nav-link">Trámites y servicios</a>
                            <a href="historia.php" class="nav-item nav-link">Historia</a>
                            <a href="noticias.php" class="nav-item nav-link active">Noticias</a>
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
<div class="container-fluid bg-page-header" style="margin-bottom: 90px; background-image: url('img/.jpg'); background-size: cover; background-position: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div> <!-- Ajusta el valor de transparencia aquí -->
    <div class="container" style="position: relative; z-index: 2;">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px;">
            <h3 class="display-3 text-white text-uppercase">Noticias</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="index.html">Inicio</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Noticias</p>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

    <!-- New Section Start -->
<div class="container my-5">
    <div class="row">
        <!-- Repeat this block 6 times -->
        <div class="col-lg-12 mb-5">
            <div class="row align-items-center">
                <!-- Left Side: Title and Description -->
                <div class="col-lg-6">
                    <h3 class="text-primary"> Inauguración Mes del Comercio</h3>
                    <p>CANACO Puruándiro inicia actividades de su 97 aniversario. Inauguración oficial a nuestra actividades del Mes Del Comercio 2024</p>
                </div>
                <!-- Right Side: Carousel -->
                <div class="col-lg-6">
                    <div id="carouselExample1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/Inaguracion.jpg"  width="500" height="250" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/Inaguracion4.jpg" width="500" height="250" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/Inaguracion2.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/Inaguracion13.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/Inaguracion5.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Block -->

        <!-- Copia y pega este bloque para los demás apartados, cambiando IDs y contenidos -->
    </div>
</div>
<!-- New Section End -->

    <!-- New Section Start -->
    <div class="container my-5">
        <div class="row">
            <!-- Repeat this block 6 times -->
            <div class="col-lg-12 mb-5">
                <div class="row align-items-center">
                    <!-- Left Side: Title and Description -->
                    <div class="col-lg-6">
                        <h3 class="text-primary">Feria de la Salud en TECNM Campus Puruándiro</h3>
                        <p>09 de octubre, se realizó la 𝗙𝗲𝗿𝗶𝗮 𝗱𝗲 𝗹𝗮 𝗦𝗮𝗹𝘂𝗱 𝗽𝗮𝗿𝗮 𝗹𝗼𝘀 𝗝𝗼́𝘃𝗲𝗻𝗲𝘀 en la explanada del edifico y en la Sala Audiovisual de TECNM Campus Puruandiro, donde se presentaron Platicas y exposición de Stand informativos, coordinada por la Cámara Nacional de Comercio de Puruándiro, el H. Ayuntamiento, Centro de salud, Hospital Regional, Instancia de la mujer Laboratorio Guimed.</p>
                    </div>
                    <!-- Right Side: Carousel -->
                    <div class="col-lg-6">
                        <div id="carouselExample1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="img/Tec.jpg" width="500" height="250" alt="Imagen 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Tec1.jpg" width="500" height="250" alt="Imagen 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Tec2.jpg" width="500" height="250" alt="Imagen 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Tec3.jpg" width="500" height="250" alt="Imagen 3">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Block -->
    
            <!-- Copia y pega este bloque para los demás apartados, cambiando IDs y contenidos -->
        </div>
    </div>
    <!-- New Section End -->

         <!-- New Section Start -->
<div class="container my-5">
    <div class="row">
        <!-- Repeat this block 6 times -->
        <div class="col-lg-12 mb-5">
            <div class="row align-items-center">
                <!-- Left Side: Title and Description -->
                <div class="col-lg-6">
                    <h3 class="text-primary">Inauguración de la Feria de la Salud</h3>
                    <p>10 de octubre de 2024, se Inaugura la Feria de la salud la cuál fue organizada por Cámara de Comercio Servicios, y Turismo  de Puruándiro que en coordinación con el H. Ayuntamiento de Puruándiro e instancias de salud coadyuvaron para que se realizará. 
                        En esta actividad participaron: <br>
                        Lic. Víctor Manuel Vázquez Tapia, presidente municipal de Puruándiro.<br>
                        C. Esmeralda Vázquez Tapia presidenta honorífica del Sistema DIF municipal.<br>
                        C. Marcela Lopez Acevedo Presidenta de la Canaco Puruandiro <br>
                        Dra. Viridiana Sánchez Mejía directora del centro de Salud de Puruándiro.<br>
                        Dr. Fernando Delgado Borja director de la clínica IMSS de Puruándiro. <br>
                        Personal de orientación del hospital regional de Puruándiro.<br>
                        Personal del TECNM Campus Puruándiro <br>
                        Guimed Laboratorios <br>
                        Personal del Sistema DIF municipal. <br>
                        Personal de orientación del hospital regional de Puruándiro</p>
                </div>
                <!-- Right Side: Carousel -->
                <div class="col-lg-6">
                    <div id="carouselExample1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/FeriaSalud.jpg" width="500" height="250" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/FeriaSalud1.jpg" width="500" height="250" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/FeriaSalud2.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/FeriaSalud5.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/FeriaSalud12.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Block -->

        <!-- Copia y pega este bloque para los demás apartados, cambiando IDs y contenidos -->
    </div>
</div>
<!-- New Section End -->

     <!-- New Section Start -->
<div class="container my-5">
    <div class="row">
        <!-- Repeat this block 6 times -->
        <div class="col-lg-12 mb-5">
            <div class="row align-items-center">
                <!-- Left Side: Title and Description -->
                <div class="col-lg-6">
                    <h3 class="text-primary">Reunión de mujeres Empresarias</h3>
                    <p>Sábado 19 de Octubre,  se llevó a cabo la reunión de mujeres empresarias la cual la sede fue en el restaurante campestre el campanario donde asistieron emprendedoras para compartir sus experiencias donde asistieron grandes personalidades como la ing. Ana Cristina Ledesma integrante del comité directivo del consejo coordinador de mujeres empresarias del estado de Michoacán.
                        El lic. Daniel Caravantes vicepresidente de vinculación gubernamental de canaco Servytur Morelia.<br>
                        Lic. Ilse beatriz torres Aguilar presidenta de canaco Servytur Uruapan Michoacán.<br>
                        Y la lic. María Fernanda Mancera vocal de la cámara nacional de la industria y transformación en Morelia.</p>
                </div>
                <!-- Right Side: Carousel -->
                <div class="col-lg-6">
                    <div id="carouselExample1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/ReunionMujeres.jpg" width="500" height="250" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/ReunionMujeres1.jpg" width="500" height="250" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/ReunionMujeres2.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/ReunionMujeres10.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/ReunionMujeres14.jpg" width="500" height="250" alt="Imagen 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Block -->

        <!-- Copia y pega este bloque para los demás apartados, cambiando IDs y contenidos -->
    </div>
</div>
<!-- New Section End -->

    <!-- New Section Start -->
    <div class="container my-5">
        <div class="row">
            <!-- Repeat this block 6 times -->
            <div class="col-lg-12 mb-5">
                <div class="row align-items-center">
                    <!-- Left Side: Title and Description -->
                    <div class="col-lg-6">
                        <h3 class="text-primary">EXPO Comercial CANACO 2024</h3>
                        <p>El día lunes 21 de Octubre, se llevo acabo la 𝗘𝗫𝗣𝗢 𝗖𝗼𝗺𝗲𝗿𝗰𝗶𝗮𝗹 𝗖𝗔𝗡𝗔𝗖𝗢 𝟮𝟬𝟮𝟰</p>
                    </div>
                    <!-- Right Side: Carousel -->
                    <div class="col-lg-6">
                        <div id="carouselExample1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="img/Expo.jpg" width="500" height="250" alt="Imagen 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Expo1.jpg" width="500" height="250" alt="Imagen 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Expo4.jpg" width="500" height="250" alt="Imagen 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Expo7.jpg" width="500" height="250" alt="Imagen 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Expo3.jpg" width="500" height="250" alt="Imagen 3">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Block -->
    
            <!-- Copia y pega este bloque para los demás apartados, cambiando IDs y contenidos -->
        </div>
    </div>
    <!-- New Section End -->

        <!-- New Section Start -->
        <div class="container my-5">
            <div class="row">
                <!-- Repeat this block 6 times -->
                <div class="col-lg-12 mb-5">
                    <div class="row align-items-center">
                        <!-- Left Side: Title and Description -->
                        <div class="col-lg-6">
                            <h3 class="text-primary">Conferencia "Si no eres feliz, has fallado como lombriz"</h3>
                            <p>El día martes 22 de Octubre, se llevó a cabo la conferencia "Si no eres feliz, has fallado como lombriz" fue la conferencia presentada por la joven  emprendedora, estudiante y, visionaria Valeria Loeza Sánchez.
                                Actividad gestionada por la CANACO Puruándiro, y presentada en el CECyTE 04 plantel #Puruandiro.</p>
                        </div>
                        <!-- Right Side: Carousel -->
                        <div class="col-lg-6">
                            <div id="carouselExample1" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="img/Cecytem.jpg" width="500" height="250" alt="Imagen 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/Cecytem1.jpg" width="500" height="250" alt="Imagen 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/Cecytem2.jpg" width="500" height="250" alt="Imagen 3">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/Cecytem3.jpg" width="500" height="250" alt="Imagen 3">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Siguiente</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Block -->
        
                <!-- Copia y pega este bloque para los demás apartados, cambiando IDs y contenidos -->
            </div>
        </div>
        <!-- New Section End -->

            <!-- New Section Start -->
    <div class="container my-5">
        <div class="row">
            <!-- Repeat this block 6 times -->
            <div class="col-lg-12 mb-5">
                <div class="row align-items-center">
                    <!-- Left Side: Title and Description -->
                    <div class="col-lg-6">
                        <h3 class="text-primary">Reunión de Federación de Cámaras de Comercio de Michoacán</h3>
                        <p>Sábado 26 de Octubre, se llevó acabo reunión De Federación de Cámaras de Comercio de Michoacán siendo sede Puruándiro en su 97 Aniversario, entrego reconocimientos al Merito Empresarial a dos grandes, PYBSA y FARMACIA ESQUIVEL .
                            <br>Así mismo otorgo reconocimientos al Merito Laboral, siendo la galardonada Carmelita de la empresa Fierro, Perfiles y Soleras, Ya con mas de 20 años</p>
                    </div>
                    <!-- Right Side: Carousel -->
                    <div class="col-lg-6">
                        <div id="carouselExample1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="img/Fecanaco.jpg" width="500" height="250" alt="Imagen 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Fecanaco1.jpg" width="500" height="250" alt="Imagen 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Fecanaco2.jpg" width="500" height="250" alt="Imagen 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Fecanaco10.jpg" width="500" height="250" alt="Imagen 3">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="img/Fecanaco3.jpg" width="500" height="250" alt="Imagen 3">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Block -->
    
            <!-- Copia y pega este bloque para los demás apartados, cambiando IDs y contenidos -->
        </div>
    </div>
    <!-- New Section End -->


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