<?php
session_start();
include("conexion.php");

$id = $_GET['id'];

// eliminar relación
mysqli_query($conexion, "DELETE FROM usuario_sucursal WHERE id_usuario = $id");

// eliminar usuario
mysqli_query($conexion, "DELETE FROM usuarios WHERE id_usuario = $id");

header("Location: ../empleados.php");
exit();