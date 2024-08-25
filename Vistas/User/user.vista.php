<?php
require_once "./Controladores/User/user.controller.php"; // Asegúrate de que la ruta sea correcta
session_start(); // Iniciar sesión para acceder a la información del usuario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Usuarios</h1>

        <!-- Formulario para crear un nuevo usuario -->
        <h2>Crear Usuario</h2>
        <form action="index.php?ruta=User/create" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Email:</label>
                <input type="email" class="form-control" id="correo" name="correo" required autocomplete="email">
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>

        <!-- Lista de usuarios -->
        <h2 class="mt-5">Lista de Usuarios</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarios = UserController::getUsers(); // Obtener la lista de usuarios
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>" . $usuario['id_usuario'] . "</td>";
                    echo "<td>" . $usuario['nombre'] . "</td>";
                    echo "<td>" . $usuario['correo'] . "</td>";
                    echo "<td>" . $usuario['estado'] . "</td>";
                    echo "<td>";
                    echo "<a href='index.php?ruta=User/edit&id=" . $usuario['id_usuario'] . "' class='btn btn-warning btn-sm'>Editar</a>";
                    echo "<a href='index.php?ruta=User/delete&id=" . $usuario['id_usuario'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>