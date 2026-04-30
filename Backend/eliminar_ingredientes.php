<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_sucursal'])) {
    header("Location: ../seleccionar_sucursal.php");
    exit();
}

$id_sucursal = $_SESSION['id_sucursal'];
$id = $_GET['id'];

$sql = "DELETE FROM ingredientes 
        WHERE id_ingrediente = $id AND id_sucursal = $id_sucursal";

mysqli_query($conexion, $sql);

header("Location: ../agregar-producto.php");
exit();