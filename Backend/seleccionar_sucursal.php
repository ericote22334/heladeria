<?php
session_start();
include("conexion.php");

$id_usuario = $_SESSION['user_id'];
$rol = $_SESSION['rol'];

// Si es superadmin → ver todas
if ($rol == 'admin') {
    $sql = "SELECT * FROM sucursales";
} else {
    $sql = "SELECT s.* FROM sucursales s
            INNER JOIN usuario_sucursal us ON s.id_sucursal = us.id_sucursal
            WHERE us.id_usuario = $id_usuario";
}

$resultado = mysqli_query($conexion, $sql);
?>

<form method="POST" action="guardar_sucursal.php">
    <select name="sucursal">
        <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
            <option value="<?php echo $fila['id_sucursal']; ?>">
                <?php echo $fila['nombre']; ?>
            </option>
        <?php } ?>
    </select>

    <button type="submit">Entrar</button>
</form>