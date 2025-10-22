<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoridades - I.E. 7073</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(120deg, #e9f5ec 0%, #f8fafc 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            background-color: #1b4332;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 8px rgba(27, 67, 50, 0.2);
        }
        .titulo-principal {
            font-size: 1.8rem;
            font-weight: 700;
            color: #bfa14a;
            text-align: center;
            margin: 30px 0 40px 0;
        }
        .card-authoridad {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(27, 67, 50, 0.10);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            background: white;
        }
        .card-authoridad:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 32px rgba(27, 67, 50, 0.14);
        }
        .foto-authoridad {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #bfa14a;
            margin-bottom: 15px;
        }
        .nombre-cargo {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1b4332;
            margin: 5px 0;
        }
        .puesto {
            color: #bfa14a;
            font-weight: 600;
            font-size: 0.95rem;
        }
        footer {
            background: #1b4332;
            color: white;
            text-align: center;
            padding: 18px 0 10px 0;
            margin-top: auto;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header class="py-3 text-center">
        <h4 class="m-0">Autoridades Educativas</h4>
    </header>

    <!-- Contenido -->
    <main class="container py-4 flex-grow-1">
        <h2 class="titulo-principal">Institución Educativa N.° 7073 "Santa Rosa de Lima"</h2>
        <div class="row gy-4">

            <!-- Ministro -->
            <div class="col-md-6 col-lg-4">
                <div class="card-authoridad h-100">
                    <img src="img/autoridades/ministro.jpg" alt="Ministro de Educación" class="foto-authoridad">
                    <p class="nombre-cargo">Morgan Niccolo Quero Gaime</p>
                    <p class="puesto">Ministro de Educación (2025)</p>
                </div>
            </div>

            <!-- Director UGEL -->
            <div class="col-md-6 col-lg-4">
                <div class="card-authoridad h-100">
                    <img src="img/autoridades/ugel01.jpg" alt="Director UGEL 01" class="foto-authoridad">
                    <p class="nombre-cargo">Mg. Pedro Recuay Sánchez</p>
                    <p class="puesto">Director UGEL 01 – SJM</p>
                </div>
            </div>

            <!-- Director IE -->
            <div class="col-md-6 col-lg-4">
                <div class="card-authoridad h-100">
                    <img src="img/autoridades/director.jpg" alt="Director IE 7073" class="foto-authoridad">
                    <p class="nombre-cargo">Vicente Emilio Pari Coripuna</p>
                    <p class="puesto">Director de la I.E. 7073</p>
                </div>
            </div>

            <!-- Subdirectora Primaria -->
            <div class="col-md-6 col-lg-4">
                <div class="card-authoridad h-100">
                    <img src="img/autoridades/primaria.jpg" alt="Subdirectora Primaria" class="foto-authoridad">
                    <p class="nombre-cargo">Pilar Guerrero Obregón</p>
                    <p class="puesto">Subdirectora Nivel Primaria</p>
                </div>
            </div>

            <!-- Subdirectora Secundaria -->
            <div class="col-md-6 col-lg-4">
                <div class="card-authoridad h-100">
                    <img src="img/autoridades/secundaria.jpg" alt="Subdirectora Secundaria" class="foto-authoridad">
                    <p class="nombre-cargo">Teresa Huillca Velázquez</p>
                    <p class="puesto">Subdirectora Formación General – Secundaria</p>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 IE.7073. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
