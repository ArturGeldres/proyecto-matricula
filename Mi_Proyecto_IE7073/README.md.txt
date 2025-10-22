# Sistema de Matrícula Híbrido (PHP + Java) - IE 7073

Este proyecto implementa un sistema de gestión de matrículas utilizando una arquitectura híbrida:

* **Frontend (PHP):** Un portal web para estudiantes y administradores, construido en PHP.
* **Backend (Java):** Un conjunto de microservicios RESTful (construidos con Spring Boot) para manejar la lógica de negocio pesada, como la autenticación y el procesamiento de matrículas.

## Requisitos

* XAMPP (con PHP 8.0+ y MySQL)
* IDE de Java (NetBeans 12+ o similar)
* JDK 17 o superior

## Instrucciones de Instalación

Para ejecutar este proyecto, ambos componentes (backend y frontend) deben estar corriendo simultáneamente.

### 1. Base de Datos

1.  Inicia el módulo de **MySQL** en XAMPP.
2.  Ve a `http://localhost/phpmyadmin`.
3.  Crea una nueva base de datos llamada `sistemaie7073`.
4.  Importa el archivo `/database/sistemaie7073.sql` en la base de datos que acabas de crear.

### 2. Backend (Microservicios en Java)

1.  Abre el IDE de Java (NetBeans).
2.  Selecciona "Open Project" y abre la carpeta `/backend-java`.
3.  Espera a que NetBeans cargue las dependencias de Maven (definidas en `pom.xml`).
4.  Ejecuta el proyecto (corriendo la clase `SistemaApplication.java`).
5.  El servicio se iniciará en `http://localhost:8081`.

### 3. Frontend (Portal en PHP)

1.  Copia la carpeta `/frontend-php` completa dentro de tu directorio `htdocs` de XAMPP (ej. `C:\xampp\htdocs\frontend-php`).
2.  Inicia el módulo de **Apache** en XAMPP.
3.  Abre tu navegador y ve a: `http://localhost/frontend-php/index.php` (o la ruta que corresponda).

¡El sistema ya está listo para usarse!