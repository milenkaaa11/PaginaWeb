# Catálogo Dinámico de Productos con PHP y MySQL

## Descripción del Proyecto

Consiste en el desarrollo de una página web personal utilizando HTML5, CSS, PHP y MySQL.

El sistema incluye una página principal con información personal, un formulario de contacto funcional y un sistema de login para administrador que permite visualizar de forma privada los mensajes enviados por los usuarios.

Además, se implementaron medidas básicas de seguridad como validación de formularios, uso de sesiones y contraseñas cifradas con `password_hash()` y `password_verify()`.

---

# Tecnologías Utilizadas

* HTML
* CSS
* PHP
* MySQL
* XAMPP
* phpMyAdmin
* Visual Studio Code

---

# Funcionalidades

* Página principal con biografía e imagen.
* Formulario de contacto funcional.
* Almacenamiento de mensajes en MySQL.
* Sistema de login para administrador.
* Panel privado para consultar mensajes.
* Validación de datos y protección mediante sesiones.

---

# Instalación y Uso

## 1. Crear la base de datos

Ingresar a phpMyAdmin:

http://localhost/phpmyadmin

Se creo la base de datos llamada:

sitio_web

Después ejecutamos las siguientes consultas SQL:

```sql
CREATE TABLE mensajes(

    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre VARCHAR(100) NOT NULL,

    correo VARCHAR(100) NOT NULL,

    mensaje TEXT NOT NULL,

    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
```

```sql
CREATE TABLE admin(

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario VARCHAR(50) NOT NULL,

    password VARCHAR(255) NOT NULL

);
```

---

## 2. Crear usuario administrador

Generar una contraseña cifrada utilizando:

```php
<?php

echo password_hash(
    "Milenkabm30",
    PASSWORD_DEFAULT
);

?>
```

Despues se copia el hash generado y se inserta en la tabla `admin` junto al nombre de usuario, todo esto en la base de datos.

---

## 3. Abrir en navegador el proyecto


http://localhost/sitioweb

---

# Credenciales del Administrador

## Usuario y Contraseña

mabotines 

Milenkabm30


# Hosting del Proyecto

PEGAR_AQUI_EL_LINK_DEL_HOSTING
