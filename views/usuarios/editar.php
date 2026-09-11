<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="index.php?accion=editar&id=<?= $datos['id_usuario'] ?>" method="POST">
        <label>ID Rol:</label>
        <input type="number" name="id_rol" value="<?= $datos['id_rol'] ?>" required>

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= $datos['nombre'] ?>" required>

        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?= $datos['apellido'] ?>" required>

        <label>Correo:</label>
        <input type="email" name="correo" value="<?= $datos['correo'] ?>" required>

        <label>Usuario:</label>
        <input type="text" name="usuario" value="<?= $datos['usuario'] ?>" required>

        <label>Telefono:</label>
        <input type="text" name="telefono" value="<?= $datos['telefono'] ?>">

        <label>Estado:</label>
        <select name="estado">
            <option value="activo" <?= $datos['estado'] == 'activo' ? 'selected' : '' ?>>Activo</option>
            <option value="inactivo" <?= $datos['estado'] == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>
    <br>
    <a href="index.php?accion=index">Volver</a>
</body>
</html>