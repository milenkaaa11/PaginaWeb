<?php

// Inicia la sesión para guardar datos del administrador al loguearse
session_start();

// conexión a base de datos
include("conexion.php");

// almacena mensajes de error
$error = "";

// Verifica si el formulario fue enviado por el método POST
if($_SERVER["REQUEST_METHOD"]=="POST"){

    // Limpia espacios en blanco al inicio y final de las entradas
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    // Prepara la consulta para evitar inyecciones SQL
    $stmt = $conn->prepare(
        "SELECT password FROM admin WHERE usuario=?"
    );

    // Vincula el parámetro string a la consulta
    $stmt->bind_param("s",$usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Si el usuario existe en la base de datos
    if($resultado->num_rows > 0){

        $fila = $resultado->fetch_assoc();

        // Verifica si la contraseña coincide con la encriptada en la nase de datos
        if(
            password_verify(
                $password,
                $fila['password']
            )
        ){

            // Guarda el nombre del usuario en la sesión y redirige al panel
            $_SESSION['admin']=$usuario;
            header("Location: panel.php");
            exit();

        }else{
            $error = "Contraseña incorrecta";
        }

    }else{
        $error = "Usuario incorrecto";
    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Administrador</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<header>
    <h1>Administrador</h1>
</header>

<nav>
    <a href="index.php">Inicio</a>
    <a href="contacto.php">Contacto</a>
    <a href="login.php">Administrador</a>
</nav>

<section class="contenedor">

<!-- Alerta de error adaptada-->
<?php if($error != ""){ ?>
<div class="alert alert-danger">
    <?php echo $error; ?>
</div>
<?php } ?>

<form method="POST">

    <div style="margin-bottom: 25px;">
        <label class="form-label">Usuario</label>
        <input
            type="text"
            name="usuario"
            class="form-control"
            placeholder="Introduce tu usuario"
            required
        >
    </div>

    <div style="margin-bottom: 35px;">
        <label class="form-label">Contraseña</label>
        <input
            type="password"
            name="password"
            class="form-control"
            placeholder="Introduce tu contraseña"
            required
        >
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">
            Ingresar
        </button>
    </div>

</form>

</section>

</body>

</html>