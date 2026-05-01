<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$rol = $_POST['rol'];
$id_sucursal = $_POST['id_sucursal'];

// INSERT USUARIO
$sql = "INSERT INTO usuarios (usuario, contrasena, rol) 
        VALUES ('$usuario', '$contrasena', '$rol')";
mysqli_query($conexion, $sql);

$id_usuario = mysqli_insert_id($conexion);

// RELACIÓN CON SUCURSAL
$sql2 = "INSERT INTO usuario_sucursal (id_usuario, id_sucursal) 
         VALUES ($id_usuario, $id_sucursal)";
mysqli_query($conexion, $sql2);

header("Location: ../empleados.php");
exit();