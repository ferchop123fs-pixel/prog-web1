<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="index.php?accion=crear" method="POST">
        <label>ID Rol:</label>
        <input type="number" name="id_rol" required>

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Apellido:</label>
        <input type="text" name="apellido" required>

        <label>Correo:</label>
        <input type="email" name="correo" required>

        <label>Usuario:</label>
        <input type="text" name="usuario" required>

        <label>Contrasena:</label>
        <input type="password" name="contrasena" required>

        <label>Telefono:</label>
        <input type="text" name="telefono">

        <label>Estado:</label>
        <select name="estado">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>

        <button type="submit">Guardar</button>
    </form>
    <br>
    <a href="index.php?accion=index">Volver</a>
</body>
</html>