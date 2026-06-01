<?php

$host = "sql103.infinityfree.com";   
$usuario = "if0_42060756";
$password = "U5dEJW0YvriDK";
$bd = "if0_42060756_misitioweb";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


?>