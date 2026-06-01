<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
    
    <!-- Estilos adicionales para la foto y listas -->
    <style>
        .foto {
            display: block;
            max-width: 200px;
            height: auto;
            margin: 0 auto 30px auto;
            border-radius: 0; 
            border: 1px solid #dcd7cc;
            padding: 6px;
            background-color: #f9f8f5;
        }
        p {
            font-size: 16px;
            line-height: 1.8;
            color: #4a524f;
            margin-bottom: 40px;
        }
        ul {
            list-style: none; 
            padding-left: 15px;
        }
        ul li {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #5c6460;
            margin-bottom: 12px;
            position: relative;
        }
        ul li::before {
            content: "—"; 
            color: #4a5d4e;
            margin-right: 10px;
        }
    </style>
</head>

<body>

<!-- Encabezado del sitio -->
<header>
    <h1>Mi Página Personal</h1>
</header>

<!-- Menú de navegación -->
<nav>
    <a href="index.php">Inicio</a>
    <a href="contacto.php">Contacto</a>
    <a href="login.php">Administrador</a>
</nav>

<!-- contenido central -->
<section class="contenedor">

    <!-- foto-->
    <img src="foto.jpeg" class="foto" alt="Foto personal">

    <h2>Biografía</h2>
    <p>
      Hola, mi nombre es Milenka Botines, tengo 20 años y cumplo años el 30 de enero. Nací y actualmente vivo en Ecuador, en la ciudad de Manta, provincia de Manabí.
      Mi familia está conformada por mi madre María Molina, mi padre Alejandro Botines y mi hermano menor, Josnaider de 18 años. Además, tengo un perro llamado Zeus de raza husky siberiano color blanco que cuenta con 9 años de vida.
      Actualmente estudio en la Universidad Técnica Particular de Loja (UTPL), donde curso la carrera de Tecnologías de la Información (TI). En este momento me encuentro en el quinto semestre de un total de nueve. 
      Me interesan las diferentes tecnologías, áreas en las que busco seguir aprendiendo y desarrollando nuevas habilidades.


    </p>

    <h2>Hobbies</h2>
    <ul>
        <li>Ver videos</li>
        <li>Videojuegos</li>
        <li>Música</li>
        <li>Leer</li>
        <li>Voleibol</li>
    </ul>

</section>

</body>

</html>