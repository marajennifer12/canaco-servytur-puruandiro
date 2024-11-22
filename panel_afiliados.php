<?php
// Iniciar sesión
session_start();

// Datos de conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$db = "login_canaco";

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Validar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    echo "Error: Usuario no autenticado. Inicia sesión.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <title>CANACO SERVYTUR PURUÁNDIRO</title>

    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .mensaje {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            color: #333;
        }
        .preview {
            margin-top: 20px;
            text-align: center;
        }
        .preview img {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }
        .social-preview {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .social-preview a {
            text-decoration: none;
            color: #007BFF;
        }
        </style>
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

    <!--  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Afiliados</title>
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
                            <a href="index.php" class="nav-item nav-link active">Inicio</a>
                            <a href="negocios.php" class="nav-item nav-link">Negocios</a>
                            <a href="nosotros.php" class="nav-item nav-link">Nosotros</a>
                            <a href="tramites_y_servicios.php" class="nav-item nav-link">Trámites y servicios</a>
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



    <form id="afiliadosForm" action="" method="POST" enctype="multipart/form-data">
        <label for="servicio">Servicio:</label>
        <input type="text" id="servicio" name="servicio" placeholder="Ejemplo: Reparación de celulares" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="5" placeholder="Describe los servicios que ofreces..." required></textarea>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)" required>
        <div class="preview">
            <p>Previsualización:</p>
            <img id="imagePreview" src="#" alt="Previsualización de la imagen" style="display:none;">
        </div>

        <label for="facebook">Enlace de Facebook:</label>
        <input type="url" id="facebook" name="facebook" placeholder="https://facebook.com/mi_pagina">

        <label for="instagram">Enlace de Instagram:</label>
        <input type="url" id="instagram" name="instagram" placeholder="https://instagram.com/mi_perfil">

        <label for="twitter">Enlace de Twitter:</label>
        <input type="url" id="twitter" name="twitter" placeholder="https://twitter.com/mi_perfil">

        <button type="submit">Guardar</button>
    </form>

    <?php if (!empty($mensaje)): ?>
        <div class="mensaje"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>

    <a href="cerrar_sesion.php">Cerrar sesión</a>


<?php
        // Obtener datos del usuario logueado
        $usuario = $_SESSION['usuario'];

        // Manejo de mensajes
        $mensaje = "";

        // Procesar formulario si se envió
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio = trim($_POST['servicio']);
            $descripcion = trim($_POST['descripcion']);
            $facebook = trim($_POST['facebook']);
            $instagram = trim($_POST['instagram']);
            $twitter = trim($_POST['twitter']);
            $imagen = $_FILES['imagen'];

            // Validaciones del formulario
            if (empty($servicio) || empty($descripcion)) {
                $mensaje = "El servicio y la descripción son obligatorios.";
            } elseif ($imagen['error'] !== UPLOAD_ERR_OK) {
                $mensaje = "Por favor, selecciona una imagen.";
            } else {
                $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($imagen['type'], $tiposPermitidos)) {
                    $mensaje = "Formato de imagen no permitido. Solo se aceptan JPG, PNG y GIF.";
                } else {
                    // Subir imagen
                    $nombreImagen = time() . "_" . basename($imagen['name']);
                    $rutaDestino = "uploads/" . $nombreImagen;

                    // Crear carpeta si no existe
                    if (!is_dir('uploads')) {
                        mkdir('uploads', 0755, true);
                    }

                    if (move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {
                        // Guardar datos en la base de datos
                        $sql = "INSERT INTO afiliados (usuario, servicio, descripcion, imagen, facebook, instagram, twitter) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);

                        if ($stmt) {
                            $stmt->bind_param("sssssss", $usuario, $servicio, $descripcion, $nombreImagen, $facebook, $instagram, $twitter);

                            if ($stmt->execute()) {
                                $mensaje = "Datos guardados correctamente.";
                            } else {
                                $mensaje = "Error al guardar en la base de datos: " . $stmt->error;
                            }

                            $stmt->close();
                        } else {
                            $mensaje = "Error en la preparación de la consulta: " . $conn->error;
                        }
                    } else {
                        $mensaje = "Error al subir la imagen.";
                    }
                }
            }
        }

        // Mostrar servicios del usuario
        $sql = "SELECT * FROM afiliados WHERE usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo "<div style='border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); display: flex; align-items: center; background-color: #fff;'>";
            
            // Imagen del servicio (a la izquierda)
            echo "<div style='flex: 0 0 200px; margin-right: 20px;'>";
            echo "<img src='uploads/" . htmlspecialchars($row['imagen']) . "' alt='Imagen del servicio' style='max-width: 150px; height: auto; display: block; margin: 0 auto; border-radius: 5px;'>";
            echo "</div>";
            
            // Información del servicio (a la derecha)
            echo "<div style='flex: 1;'>";
            echo "<h3 style='font-family: Arial, sans-serif; color: #333;'>" . htmlspecialchars($row['servicio']) . "</h3>";
            echo "<p style='font-family: Arial, sans-serif; color: #555;'>" . htmlspecialchars($row['descripcion']) . "</p>";
            
            // Fondo azul translúcido para los enlaces sociales
            echo "<div style='background-color: rgba(0, 123, 255, 0.1); padding: 10px; border-radius: 5px;'>";
            echo "<p style='font-family: Arial, sans-serif; color: #555;'>Facebook: <a href='" . htmlspecialchars($row['facebook']) . "' target='_blank' style='color: #1a0dab;'>" . htmlspecialchars($row['facebook']) . "</a></p>";
            echo "<p style='font-family: Arial, sans-serif; color: #555;'>Instagram: <a href='" . htmlspecialchars($row['instagram']) . "' target='_blank' style='color: #1a0dab;'>" . htmlspecialchars($row['instagram']) . "</a></p>";
            echo "<p style='font-family: Arial, sans-serif; color: #555;'>Twitter: <a href='" . htmlspecialchars($row['twitter']) . "' target='_blank' style='color: #1a0dab;'>" . htmlspecialchars($row['twitter']) . "</a></p>";
            echo "</div>"; // Cierre del fondo azul
            
            echo "</div>"; // Cierre del div de la información
            echo "</div>"; // Cierre del div principal
        }

        $stmt->close();
        $conn->close();

        // Mostrar mensaje
        if (!empty($mensaje)) {
            echo "<p>$mensaje</p>";
        }
?>
    


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
                <a href="index.html" class="navbar-brand">
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
                    <a class="text-canaco mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Inicio</a>
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
                <h4 class="font-weight-semi-bold text-primary mb-4">Inicio de sesión</h4>
                <p class="text-canaco">Puedes iniciar sesión desde aquí.</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-0" style="padding: 25px; width: 100px;" placeholder="Correo">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Iniciar sesión</button>
                        </div>
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

