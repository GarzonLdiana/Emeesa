<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación de Rol</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    require_once "./controladores/Roles/roles.controller.php";
    
    // Inicializar variables
    $id_roles = isset($_GET['id_roles']) ? $_GET['id_roles'] : null;
    $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;
    $rol = null;

    // Recuperar datos del rol si se está editando
    if ($id_roles && $id_usuario) {
        $rol = RolesController::getRolById($id_roles, $id_usuario);
    }

    // Procesar el formulario al enviar
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        RolesController::saveRole(); // Llamar al controlador para guardar el rol
    }
    ?>
    
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $id_roles ? 'Editar' : 'Asignar'; ?> Rol</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?ruta=Roles/Roles">Inicio</a></li>
                            <li class="breadcrumb-item active"><?php echo $id_roles ? 'Editar' : 'Asignar'; ?> Rol</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="content">
            <div class="card">
                <form role="form" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCode"># ID del Rol</label>
                            <input type="text" id="inputCode" class="form-control" name="id_roles" value="<?php echo $rol && isset($rol['id_roles']) ? $rol['id_roles'] : ''; ?>" placeholder="Ingrese el número, max 8 caracteres." required minlength="1" maxlength="8">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputUsuario"># ID del Usuario</label>
                            <input type="text" id="inputUsuario" class="form-control" name="id_usuario" value="<?php echo $rol && isset($rol['id_usuario']) ? $rol['id_usuario'] : ''; ?>" placeholder="Ingrese el ID del usuario." required>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputRol">Rol</label>
                            <input type="text" id="inputRol" class="form-control" name="rol" value="<?php echo $rol && isset($rol['rol']) ? $rol['rol'] : ''; ?>" placeholder="Ingrese el nombre del rol." required>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEstadoRol">Estado del Rol</label>
                            <select id="inputEstadoRol" class="form-control" name="estado_rol" required>
                                <option value="">Seleccione el estado</option>
                                <option value="Activo" <?php echo ($rol && $rol['estado_rol'] === 'Activo') ? 'selected' : ''; ?>>Activo</option>
                                <option value="Inactivo" <?php echo ($rol && $rol['estado_rol'] === 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
                            </select>
                        </div>
                        
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save nav-icon"></i> <span>Guardar</span>
                            </button>
                            <a href="index.php?ruta=Roles/Roles" class="btn btn-warning">
                                <i class="fa fa-power-off nav-icon"></i> <span>Cancelar</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>