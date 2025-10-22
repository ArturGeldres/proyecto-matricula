<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I.E. 7073</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(120deg, #e9f5ec 0%, #f8fafc 100%);
        }

        header {
            background: #1b4332;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 8px rgba(27, 67, 50, 0.08);
        }

        .btn-custom {
            background: linear-gradient(90deg, #1b4332 80%, #bfa14a 100%);
            color: white;
            border-radius: 25px;
            font-weight: 600;
            letter-spacing: 1px;
            border: none;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #14532d 80%, #bfa14a 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 4px 16px rgba(27, 67, 50, 0.12);
        }

        .btn-outline-light {
            border-radius: 25px;
            font-weight: 600;
            letter-spacing: 1px;
            border: 2px solid #bfa14a !important;
            color: #bfa14a !important;
            background: transparent;
            transition: 0.3s;
        }

        .btn-outline-light:hover {
            background: #bfa14a !important;
            color: #fff !important;
        }

        .offcanvas {
            background: linear-gradient(135deg, #1b4332 80%, #14532d 100%);
        }

        .hero-banner {
            background: linear-gradient(rgba(27,67,50,0.7), rgba(191,161,74,0.15)), url('banner.jpg') no-repeat center/cover;
            min-height: 380px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            border-radius: 0 0 32px 32px;
            margin-bottom: 40px;
            position: relative;
            box-shadow: 0 6px 32px rgba(27, 67, 50, 0.10);
        }

        .hero-logo {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #bfa14a;
            background: #fff;
            box-shadow: 0 4px 24px rgba(191,161,74,0.12);
            margin-bottom: 18px;
        }

        .hero-banner h1 {
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 0 2px 8px rgba(27, 67, 50, 0.18);
        }

        .hero-banner p {
            font-size: 1.25rem;
            margin-top: 12px;
            text-shadow: 0 2px 8px rgba(27, 67, 50, 0.12);
        }

        .divider {
            border-top: 3px solid #bfa14a;
            width: 80px;
            margin: 24px auto 0 auto;
        }

        section {
            padding: 60px 0 50px 0;
        }

        .section-card {
            background: #fff;
            border-radius: 22px;
            box-shadow: 0 4px 24px rgba(27, 67, 50, 0.10);
            padding: 36px 32px;
            margin-bottom: 40px;
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .section-card:hover {
            box-shadow: 0 8px 32px rgba(191,161,74,0.14);
            transform: translateY(-4px) scale(1.01);
        }

        h2 {
            color: #1b4332;
            font-weight: 700;
            border-left: 6px solid #bfa14a;
            padding-left: 14px;
            margin-bottom: 24px;
            letter-spacing: 1px;
        }

        h5 {
            color: #bfa14a;
            font-weight: 700;
        }

        .img-fluid {
            border-radius: 18px !important;
            box-shadow: 0 4px 24px rgba(27, 67, 50, 0.10);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .img-fluid:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 32px rgba(191,161,74,0.18);
        }

        .nav-link.active, .nav-link:focus, .nav-link:hover {
            color: #bfa14a !important;
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
        }

        .shadow {
            box-shadow: 0 4px 24px rgba(27, 67, 50, 0.10) !important;
        }

        footer {
            background: #1b4332;
            color: white;
            text-align: center;
            padding: 22px 0 10px 0;
            margin-top: 40px;
            border-radius: 24px 24px 0 0;
            font-size: 1rem;
            letter-spacing: 1px;
            border-top: 3px solid #bfa14a;
        }
    </style>
</head>

<body>
    <!-- Encabezado con botón hamburguesa -->
    <header class="d-flex align-items-center">
        <button class="btn text-white fs-3 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
            <i class="bi bi-list"></i>
        </button>
        <h5 class="m-0 fw-bold">I.E. 7073 "SANTA ROSA DE LIMA"</h5>
    </header>

    <!-- Menú lateral -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="menuLateral">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">I.E. 7073</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-white" href="#reseña">Reseña</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#mision">Misión</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#vision">Visión</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#valores">Valores</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#galeria">Comunidad</a></li>

                <!-- CATEGORÍA INSTITUCIONAL -->
                <li class="nav-item">
                    <div class="accordion accordion-flush" id="accordionInstitucional">
                        <div class="accordion-item bg-dark border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-dark text-white px-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#submenuInstitucional">
                                    Institucional
                                </button>
                            </h2>
                            <div id="submenuInstitucional" class="accordion-collapse collapse"
                                data-bs-parent="#accordionInstitucional">
                                <div class="accordion-body p-0">
                                    <ul class="navbar-nav ms-3">
                                        <li><a class="nav-link text-white" href="autoridades.php">Autoridades</a></li>
                                        <li><a class="nav-link text-white"
                                                href="administrativos.php">Administrativos</a></li>
                                        <li><a class="nav-link text-white" href="inicial.php">Nivel Inicial</a></li>
                                        <li><a class="nav-link text-white" href="primaria.php">Nivel Primaria</a></li>
                                        <li><a class="nav-link text-white" href="secundaria.php">Nivel Secundaria</a>
                                        </li>
                                        <li><a class="nav-link text-white" href="funciones.php">Funciones</a></li>
                                        <li><a class="nav-link text-white" href="organigrama.php">Organigrama</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- CATEGORÍA ACTIVIDADES (ANTES MESES) -->
                <li class="nav-item">
                    <div class="accordion accordion-flush" id="accordionActividades">
                        <div class="accordion-item bg-dark border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-dark text-white px-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#submenuActividades">
                                    Actividades
                                </button>
                            </h2>
                            <div id="submenuActividades" class="accordion-collapse collapse"
                                data-bs-parent="#accordionActividades">
                                <div class="accordion-body p-0">
                                    <ul class="navbar-nav ms-3">
                                        <li><a class="nav-link text-white" href="enero.php">Enero</a></li>
                                        <li><a class="nav-link text-white" href="febrero.php">Febrero</a></li>
                                        <li><a class="nav-link text-white" href="marzo.php">Marzo</a></li>
                                        <li><a class="nav-link text-white" href="abril.php">Abril</a></li>
                                        <li><a class="nav-link text-white" href="mayo.php">Mayo</a></li>
                                        <li><a class="nav-link text-white" href="junio.php">Junio</a></li>
                                        <li><a class="nav-link text-white" href="julio.php">Julio</a></li>
                                        <li><a class="nav-link text-white" href="agosto.php">Agosto</a></li>
                                        <li><a class="nav-link text-white" href="septiembre.php">Septiembre</a></li>
                                        <li><a class="nav-link text-white" href="octubre.php">Octubre</a></li>
                                        <li><a class="nav-link text-white" href="noviembre.php">Noviembre</a></li>
                                        <li><a class="nav-link text-white" href="diciembre.php">Diciembre</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <hr class="border-light">

                <li class="nav-item mb-2">
                    <a href="login.php" class="btn btn-custom w-100">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a href="registrar.php" class="btn btn-outline-light w-100">Registrarse</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Hero Banner -->
    <div class="container-fluid hero-banner text-center">
        <img src="img/insignia.jpg" class="hero-logo" alt="Logo Colegio">
        <h1 class="fw-bold">Bienvenidos a la I.E. 7073 "SANTA ROSA DE LIMA"</h1>
        <div class="divider"></div>
        <p class="lead">Formando líderes con valores y excelencia académica</p>
    </div>

    <!-- Sección Reseña -->
    <section id="reseña" class="bg-transparent">
        <div class="container section-card">
            <div class="row align-items-center flex-md-row-reverse">
                <div class="col-md-6">
                    <h2>Reseña Histórica</h2>
                    <p class="text-muted">
                        La Institución Educativa N.° 7073 Santa Rosa de Lima inició como colegio
                        primario N.° 6058 en
                        1970, gracias al esfuerzo de la comunidad y de un grupo de docentes
                        liderados por el profesor
                        Raúl Licerio López Amorín, su primer director. En sus inicios, las aulas
                        eran de esteras y las
                        carpetas de ladrillos, pero con el compromiso de
                        padres y maestros se logró mejorar la infraestructura y obtener el
                        reconocimiento oficial en
                        1974 y 1982 como colegio nacional. A lo largo de su historia, la I.E. ha
                        impulsado importantes
                        proyectos como la creación de
                        laboratorios, biblioteca, radio escolar, vivero ecológico y aulas de
                        innovación pedagógica.
                        El 05 de noviembre del 2013 se inauguró la nueva infraestructura de
                        secundaria y la
                        complementaria en primaria, con el apoyo del gobierno central y
                        autoridades locales.
                        Hoy en día, la institución cuenta con más de 30 gallardetes ganados en
                        concursos organizados por
                        la UGEL 01, consolidándose como un referente educativo en Villa María
                        del Triunfo.
                        Nuestra patrona, Santa Rosa de Lima, guía el espíritu de fe, esfuerzo y
                        superación de toda la
                        comunidad educativa.
                    </p>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="img/insignia.jpg" class="img-fluid rounded shadow" style="max-width: 300px;" alt="Reseña">
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Misión -->
    <section id="mision" class="bg-transparent">
        <div class="container section-card">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Nuestra Misión</h2>
                    <p class="text-muted">
                        Brindar un servicio de calidad, mediante estrategias de aprendizaje
                        innovadoras, que contribuyan a la
                        formación integral de los estudiantes, fortaleciendo los valores, respetando
                        la equidad de género,
                        interculturalidad e inclusión, siendo promotora y gestora del cuidado del
                        medioambiente propiciando la
                        cultura emprendedora acorde a los avances de la ciencia y tecnología.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="mision.jpg" class="img-fluid rounded shadow" alt="Misión">
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Visión -->
    <section id="vision" class="bg-transparent">
        <div class="container section-card">
            <div class="row align-items-center flex-md-row-reverse">
                <div class="col-md-6">
                    <h2>Nuestra Visión</h2>
                    <p class="text-muted">
                        Ser reconocidos en nuestra localidad y a nivel nacional como institución
                        educativa ecológica, formadora
                        de líderes íntegros y comprometidos con la sociedad y el medio ambiente.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="vision.jpg" class="img-fluid rounded shadow" alt="Visión">
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Valores -->
    <section id="valores" class="bg-transparent">
        <div class="container section-card">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Nuestros Valores</h2>
                    <h5>Respeto:</h5>
                    <ul class="text-muted">
                        <li>Respeta la opinión de sus compañeros.</li>
                        <li>Respeta las normas y acuerdos de convivencia y la inclusión.</li>
                        <li>Respeta y cuida su I.E, las áreas verdes valorando su importancia en la
                            ambiente.</li>
                        <li>Respeta la participación de sus compañeros en las tareas educativas.</li>
                    </ul>

                    <h5 class="mt-4">Responsabilidad:</h5>
                    <ul class="text-muted">
                        <li>Asume responsablemente las actividades que se realizan en los procesos
                            de aprendizaje.</li>
                        <li>Organiza su tiempo para las horas de estudio y recreación.</li>
                        <li>Utiliza responsablemente en su aprendizaje los adelantos tecnológicos.</li>
                    </ul>

                    <h5 class="mt-4">Laboriosidad:</h5>
                    <ul class="text-muted">
                        <li>Cumple sus funciones eficientemente en el trabajo en equipo.</li>
                        <li>Trabaja con ahínco, entusiasmo y es proactivo.</li>
                        <li>Realiza acciones con esmero en favor de la comunidad educativa.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="valores.jpg" class="img-fluid rounded shadow" alt="Valores">
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Fotos -->
    <section id="galeria" class="bg-transparent">
        <div class="container section-card text-center">
            <h2>Nuestra Comunidad</h2>
            <div class="row g-3">
                <div class="col-md-4"><img src="foto1.jpg" class="img-fluid rounded shadow" alt="">
                </div>
                <div class="col-md-4"><img src="foto2.jpg" class="img-fluid rounded shadow" alt="">
                </div>
                <div class="col-md-4"><img src="foto3.jpg" class="img-fluid rounded shadow" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 IE.7073 . Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>