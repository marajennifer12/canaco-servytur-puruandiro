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
                            <a href="historia.php" class="nav-item nav-link active">Historia</a>
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
<div class="container-fluid bg-page-header" style="margin-bottom: 90px; background-image: url('img/Expresidentes.jpg'); background-size: cover; background-position: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div> <!-- Ajusta el valor de transparencia aquí -->
    <div class="container" style="position: relative; z-index: 2;">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px;">
            <h3 class="display-3 text-white text-uppercase">Nuestra historia</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="index.html">Inicio</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Historia</p>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->





    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center pb-2">
                <h6 class="text-uppercase">Ex presidentes</h6>
                <h1 class="mb-4">Conoce a nuestros Ex presidentes</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bg-primary rounded" style="height: 200px;"></div>
                    <div class="owl-carousel team-carousel position-relative" style="margin-top: -97px; padding: 0 30px;">
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. José Guiza</h5>
                            <p class="mb-3 px-4">1927,1928,1930,1932 y 1933 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-1.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">r. José Jesús Flores </h5>
                            <p class="mb-3 px-4">1929 Y 1942</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-2.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Enrique Ponce de León </h5>
                            <p class="mb-3 px-4">1929 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-3.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Gaspar Corral </h5>
                            <p class="mb-3 px-4"> 1931</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Dr. Alfonso Esquivel L.</h5>
                            <p class="mb-3 px-4">1934</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-5.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Austreberto Vázquez  </h5>
                            <p class="mb-3 px-4">  1935, 1939 y 1940</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Álvaro García </h5>
                            <p class="mb-3 px-4"> 1936</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Pascual Gómez Delgado </h5>
                            <p class="mb-3 px-4"> 1936</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Salvador Morales Cerda</h5>
                            <p class="mb-3 px-4"> 1937</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Carlos García G. </h5>
                            <p class="mb-3 px-4"> 1938</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4"> Sr. Luis Hinojosa M. </h5>
                            <p class="mb-3 px-4"> 1941</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Francisco Ponce Zepeda</h5>
                            <p class="mb-3 px-4"> 1943-1944</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Mauricio E. García</h5>
                            <p class="mb-3 px-4">  1945 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Manuel Valtierra V </h5>
                            <p class="mb-3 px-4"> 1946 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Francisco Pérez S.</h5>
                            <p class="mb-3 px-4"> 1947 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Salvador Morales R.</h5>
                            <p class="mb-3 px-4">1948-1949</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Antonio Ceballos </h5>
                            <p class="mb-3 px-4"> 1950,1951 y 1953 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Dionisio González Barrera  </h5>
                            <p class="mb-3 px-4"> </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. José González González  </h5>
                            <p class="mb-3 px-4"> 1954-1955,1957-1958</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Mariano Gómez C. </h5>
                            <p class="mb-3 px-4"> 1956</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Adalberto González</h5>
                            <p class="mb-3 px-4"> 1959</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Luís Galván G.</h5>
                            <p class="mb-3 px-4"> 1960 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Alfonso Esquivel P.</h5>
                            <p class="mb-3 px-4"> 1963,1970-1971 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Miguel Aguirre A.</h5>
                            <p class="mb-3 px-4">1972,1974,1977-1978,1988-1989 </p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Salvador Fuentes M.</h5>
                            <p class="mb-3 px-4">1973</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Ubaldo Lara López</h5>
                            <p class="mb-3 px-4"> 1975, 1977</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Manuel Guillen M.</h5>
                            <p class="mb-3 px-4">1979</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Alfonso Zavala M.</h5>
                            <p class="mb-3 px-4">1980</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Ignacio Ponce Orozco</h5>
                            <p class="mb-3 px-4">1981</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Ing. Arturo Ponce Vargas</h5>
                            <p class="mb-3 px-4">1982</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4"> Sr. Héctor González Vázquez</h5>
                            <p class="mb-3 px-4">1983</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">MVZ Rogelio Ceballos M.</h5>
                            <p class="mb-3 px-4">1984</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Rubén Pérez Anaya</h5>
                            <p class="mb-3 px-4">1985-1986</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">C.P. Gustavo Parra Lara</h5>
                            <p class="mb-3 px-4">1987</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Dionisio González Vázquez</h5>
                            <p class="mb-3 px-4">1990</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Arq. Guillermo Madrigal</h5>
                            <p class="mb-3 px-4">1991</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Ramón Cisneros T.</h5>
                            <p class="mb-3 px-4">1992</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Victorino González García</h5>
                            <p class="mb-3 px-4">1993</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Lic. Víctor Godínez Uribe</h5>
                            <p class="mb-3 px-4">1994-1995</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. Juan González García</h5>
                            <p class="mb-3 px-4">1996-1997</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">C.P. Héctor Manuel Haro Negrete</h5>
                            <p class="mb-3 px-4">1998-1999</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">C.P.J. Jesús Madrigal Hinojosa</h5>
                            <p class="mb-3 px-4">2000-2001</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">C.P. Julio Cesar Martínez Ortega</h5>
                            <p class="mb-3 px-4">2002-2004</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Srita. Ma. De los Ángeles Serrato G.</h5>
                            <p class="mb-3 px-4"> 2004-2006</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                            <h5 class="mb-2 px-4">Sr. José Enrique González Pérez</h5>
                            <p class="mb-3 px-4">2007-2009</p>
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Appointment Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-appointment rounded">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6 py-5">
                        <div class="rounded p-5 my-5" style="background: rgba(55, 55, 63, .7);">
                            <h2 class="text-center text-white mb-4">HISTORIA</h2>
                            <!-- Imagen añadida -->
                              <img src="img/Galeria.jpeg" alt="Imagen relacionada con la historia" class="img-fluid mb-4" style="background: rgba(55, 55, 63, .7);">
                            
                           <form> 
                            <!-- Párrafo añadido --> 
                             <p class="text-white text-justify"> El día 03 de Octubre del año 1927, a iniciativa de los señores José Guiza Tapia y Alberto Estrada, se reunieron varios comerciantes de esta cuidad, en la casa marcada con el número 25, propiedad de don José Guiza, en la avenida José María Morelos. En dicha reunión toma la palabra el señor Alberto Estrada para manifestar a todos allí reunidos el objeto de aquella reunión: Formar una Cámara de Comercio, a fin de poder disfrutar de todos los beneficios que esta clase de instituciones otorgan. Enseguida se leyó la Ley de Cámaras de Comercio, de fecha 12 de Junio de 1908, y se les explicó los requisitos que deberían de llenar para que estas agrupaciones fueran reconocidas por la Secretaría de Comercio Industria y Trabajo. <br> 
                                Aprobada la idea por todos los concurrentes, de inmediato procedieron a formar la mesa directiva, quedando de Presidente el señor José Guiza Tapia; Vicepresidente, Dr. Jesús Flores; Secretario, Alberto Estrada y Tesorero, don Enrique Ponce de León; nombrando también a los respectivos Vocales y Comisiones. <br>
                                Se estableció la cuota de inscripción por socio, que en esos buenos tiempos alcanzaba la suma de 3 pesos, acordando que la Mesa Directiva se encargaría de fijar la cuota mensual, misma que no excedería de cinco pesos, ni sería menor de 2, para los socios fundadores, y un peso para los socios contribuyentes, como se les llamó a los que se inscribieron posteriormente. <br>
                                Ese mismo día se dio lectura de estatutos, mismos después de ser discutidos por la asamblea, fueron aprobados. <br> 
                                En otro renglón se aprobó que el nombre de esta institución fuera "Cámara Nacional del Comercio e Industria", dado que en aquel entonces había en esta ciudad varias manufacturas, tales como: fábrica de refrescos limonadas -como se les denominaba en ese entonces-, una fábrica de cigarros, varias rebocerías, tenerías, sastrerías, telares para la confección de zarapes y cobijas de lana, se elaboraban tablillas de chocolate, harina, pastas y zapatos entre otras cosas. <br> 
                                Asimismo, se acordó que dicha institución no podría ocuparse de asuntos extraños a los que se determina la ley de Cámara de Comercio y de manera especial, que no se mezclara en asuntos políticos o religiosos. 
                            </p> 
                            <!-- Continuar con el formulario --> 
                            <h5 class="text-right text-white mb-4">José Antonio Zavala Bucio</h5>
                            <h6 class="text-right text-white mb-4">Cronista de la ciudad</h6>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="img/Galeria.jpeg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="feature-text bg-white rounded p-lg-5">
                        <h6 class="text-uppercase">Our Features</h6>
                        <h1 class="mb-4">Why Choose Us</h1>
                        <div class="d-flex mb-4">
                            <div class="btn-primary btn-lg-square px-3" style="border-radius: 50px;">
                                <h5 class="text-secondary m-0">01</h5>
                            </div>
                            <div class="ml-4">
                                <h5>Best Law Practices</h5>
                                <p class="m-0">Ipsum duo tempor elitr rebum stet magna amet kasd. Ipsum magna ipsum ipsum stet ipsum</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="btn-primary btn-lg-square px-3" style="border-radius: 50px;">
                                <h5 class="text-secondary m-0">02</h5>
                            </div>
                            <div class="ml-4">
                                <h5>Efficiency & Trust</h5>
                                <p class="m-0">Ipsum duo tempor elitr rebum stet magna amet kasd. Ipsum magna ipsum ipsum stet ipsum</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="btn-primary btn-lg-square px-3" style="border-radius: 50px;">
                                <h5 class="text-secondary m-0">03</h5>
                            </div>
                            <div class="ml-4">
                                <h5>Results You Deserve</h5>
                                <p class="m-0">Ipsum duo tempor elitr rebum stet magna amet kasd. Ipsum magna ipsum ipsum stet ipsum</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


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