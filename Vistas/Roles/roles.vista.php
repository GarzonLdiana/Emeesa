<?php
require_once "./controladores/Roles/roles.controller.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Seguridad</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Seguridad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?ruta=Roles/Roles">Inicio</a></li>
              <li class="breadcrumb-item active">Roles</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <p>En esta sección, podrás consultar, asignar y editar los roles de los usuarios:</p>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <a href="index.php?ruta=Roles/Roles.crear" class="btn btn-success">
                  <i class="fa fa-plus"></i> Asignar Rol
                </a>
              </div>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="table-responsive">
                    <table id="datatables" class="table table-sm table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="15%"># ID del Rol</th>
                          <th width="25%">Usuario</th>
                          <th width="25%"># ID del Usuario</th>
                          <th width="20%">Estado Usuario</th>
                          <th width="20%">Rol</th>
                          <th width="15%">Estado Rol</th>
                          <th width="5%">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $roles = RolesController::index();
                        if (empty($roles)) {
                            echo '<tr><td colspan="7" class="text-center">No hay datos disponibles</td></tr>';
                        } else {
                            foreach ($roles as $rol) {
                                echo '<tr>
                                        <td>' . htmlspecialchars($rol["id_roles"]) . '</td>
                                        <td>' . htmlspecialchars($rol["usuario_nombre"]) . '</td>
                                        <td>' . htmlspecialchars($rol["id_usuario"]) . '</td>
                                        <td>' . htmlspecialchars($rol["usuario_estado_usuario"]) . '</td>
                                        <td>' . htmlspecialchars($rol["rol"]) . '</td>
                                        <td>' . htmlspecialchars($rol["estado_rol"]) . '</td>
                                        <td>
                                            <a href="index.php?ruta=Roles/Roles.crear&id_roles=' . htmlspecialchars($rol["id_roles"]) . '&id_usuario=' . htmlspecialchars($rol["id_usuario"]) . '" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                        </td>
                                    </tr>';
                            }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
      });
    });
  </script>
</body>

</html>