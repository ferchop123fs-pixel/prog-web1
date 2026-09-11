<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <a href="index.php?accion=crear" class="btn">Crear nuevo usuario</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Telefono</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_usuario'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['apellido'] ?></td>
                <td><?= $row['correo'] ?></td>
                <td><?= $row['usuario'] ?></td>
                <td><?= $row['nombre_rol'] ?></td>
                <td><?= $row['telefono'] ?></td>
                <td class="estado-<?= $row['estado'] ?>"><?= ucfirst($row['estado']) ?></td>
                <td class="acciones">
                    <a href="index.php?accion=editar&id=<?= $row['id_usuario'] ?>">Editar</a>
                    <a href="index.php?accion=eliminar&id=<?= $row['id_usuario'] ?>" onclick="return confirm('Seguro que deseas eliminar este usuario?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>