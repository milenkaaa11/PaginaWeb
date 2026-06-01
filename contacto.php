<?php

// Conexión a la base de datos
include("conexion.php");

// Variable para almacenar el texto de las alertas de respuesta
$mensaje_confirmacion = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Limpia los espacios en blanco adicionales de cada campo
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $mensaje = trim($_POST['mensaje']);

    // Comprueba que no existan campos vacíos
    if(
        empty($nombre) ||
        empty($correo) ||
        empty($mensaje)
    ){

        $mensaje_confirmacion = "Todos los campos son obligatorios";

    }elseif(
        // Valida que el formato del correo electrónico sea el correcto
        !filter_var(
            $correo,
            FILTER_VALIDATE_EMAIL
        )
    ){

        $mensaje_confirmacion = "Correo inválido";

    }else{

        // Prepara consulta SQL de inserción segura
        $stmt = $conn->prepare(
            "INSERT INTO mensajes(nombre,correo,mensaje) VALUES(?,?,?)"
        );

        // Asocia valores limpios a los comodines de la consulta
        $stmt->bind_param(
            "sss",
            $nombre,
            $correo,
            $mensaje
        );

        if($stmt->execute()){

            $mensaje_confirmacion = "Mensaje enviado correctamente";

        }else{

            $mensaje_confirmacion = "Error al enviar mensaje";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>

<body>

<header>
    <h1>Formulario de Contacto</h1>
</header>

<nav>
    <a href="index.php">Inicio</a>
    <a href="contacto.php">Contacto</a>
    <a href="login.php">Administrador</a>
</nav>

<section class="contenedor">

<?php if($mensaje_confirmacion != ""){ 
    // Determina si la respuesta es de éxito para cambiar el color de la alerta
    $clase_alerta = ($mensaje_confirmacion == "Mensaje enviado correctamente") ? "alert-success" : "alert-danger";
?>
<div class="alert <?php echo $clase_alerta; ?>">
    <?php echo $mensaje_confirmacion; ?>
</div>
<?php } ?>

<form method="POST">

    <div style="margin-bottom: 25px;">
        <label class="form-label">Nombre</label>
        <input
            type="text"
            name="nombre"
            class="form-control"
            placeholder="Tu nombre completo"
            required
        >
    </div>

    <div style="margin-bottom: 25px;">
        <label class="form-label">Correo</label>
        <input
            type="email"
            name="correo"
            class="form-control"
            placeholder="ejemplo@correo.com"
            required
        >
    </div>

    <div style="margin-bottom: 35px;">
        <label class="form-label">Mensaje</label>
        <textarea
            name="mensaje"
            class="form-control"
            placeholder="Escribe tu mensaje aquí..."
            required
        ></textarea>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">
            Enviar Mensaje
        </button>
    </div>

</form>

</section>

</body>

</html>