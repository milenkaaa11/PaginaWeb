<?php

// Inicia la sesión para verificar si el administrador inició sesión
session_start();


// Incluye el archivo de conexión a la base de datos
include("conexion.php");


// Verifica si existe una sesión activa del administrador
if(!isset($_SESSION['admin'])){


    // Si no existe sesión, redirecciona al login
    header("Location: login.php");


    // Finaliza ejecución
    exit();

}


// Consulta SQL para mensajes guardados
$sql = "SELECT * FROM mensajes";


// Ejecuta la consulta en la base de datos
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Configuración de caracteres -->
    <meta charset="UTF-8">


    <title>Panel Administrador</title>


    <link rel="stylesheet" href="estilos.css">

</head>

<body>

<header>

    <h1>Mensajes Recibidos</h1>

</header>


<!-- Menú de navegación -->
<nav>

    <a href="logout.php">Cerrar Sesión</a>

</nav>


<!-- Contenedor principal -->
<section class="contenedor">

<table>

<tr>

    <!-- Encabezados de la tabla -->
    <th>ID</th>

    <th>Nombre</th>

    <th>Correo</th>

    <th>Mensaje</th>

    <th>Fecha</th>

</tr>


<!-- Recorre todos los registros obtenidos -->
<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<!-- Se enseña ID-->
<td><?php echo $fila['id']; ?></td>


<!-- Se enseña el nombre -->
<td><?php echo $fila['nombre']; ?></td>


<!-- Se enseña el correo -->
<td><?php echo $fila['correo']; ?></td>


<!-- Se enseña mensaje -->
<td><?php echo $fila['mensaje']; ?></td>


<!-- Se enseña la fecha -->
<td><?php echo $fila['fecha']; ?></td>

</tr>

<?php } ?>

</table>

</section>

</body>

</html>