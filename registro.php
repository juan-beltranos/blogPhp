<?php

if (isset($_POST['submit'])) {

    // Conexión a la base de datos
	require_once 'includes/conexion.php';

	// Iniciar sesión
	if(!isset($_SESSION)){
		session_start();
	}

    //Recoger los valores del registro

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

    //Array de Errores
    $errores = array();

    //Validar los datos antes de guardarlos en la bd

    //validar nombre 
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    //validar apellidos 
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apeliidos_validado = false;
        $errores['apellidos'] = "Los apellidos no es valido";
    }

    //validar email 
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    //validar password
    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "La contraseña esta vacia";
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;

        //Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        // Insertar usuario a la BD
        $sql = "INSERT INTO usuarios VALUES (null,'$nombre', '$apellidos','$email','$password_segura',CURDATE());";
        $guardar = mysqli_query($db, $sql);

        if ($guardar) {
            $_SESSION['completado'] = 'EL registro se ha completado con exito';
        } else {
            $_SESSION['errores']['general'] = 'Fallo al guaedar el usuario !!';
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}
header('location:index.php');
