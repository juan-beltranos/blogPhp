<?php

//Conexion

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog';
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");


//Iniciar la Sesion
if (!isset($_SESSION)) {
    session_start();
}
