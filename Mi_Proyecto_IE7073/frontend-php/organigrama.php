<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigrama - I.E. 7073</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(120deg, #e9f5ec 0%, #f8fafc 100%);
        }

        header {
            background-color: #1b4332;
            color: white;
            box-shadow: 0 2px 8px rgba(27, 67, 50, 0.2);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        h4 {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .pdf-container {
            width: 100%;
            height: 90vh;
            border: 4px solid #bfa14a;
            border-radius: 12px;
            box-shadow: 0 6px 32px rgba(27, 67, 50, 0.15);
        }

        footer {
            background: #1b4332;
            color: white;
            text-align: center;
            padding: 18px 0 10px 0;
            margin-top: 20px;
            font-size: 1rem;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>

    <!-- Encabezado -->
    <header class="py-3 text-center">
        <h4 class="m-0">Organigrama de la I.E. 7073 "Santa Rosa de Lima"</h4>
    </header>

    <!-- Contenedor PDF -->
    <main class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <embed src="docs/organigrama.pdf" type="application/pdf" class="pdf-container">
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 IE.7073 . Todos los derechos reservados.</p>
    </footer>

</body>

</html>