<?php
require_once "./controladores/Roles/roles.controller.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Roles de Usuario</title>
    <!-- Incluye DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css"/>
    <!--  estilos adicionales -->
</head>
<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Seguridad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- Breadcrumbs -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button> 
          </div>
        </div>
        <div class="card-body">
          <p>En esta sección, podrás consultar y verificar los diferentes Roles de Usuario:</p>
          <div class="row">
            <div class="col-md-12">
              <!-- Botón Añadir -->
              <div class="mb-3">
                <a href="#" class="btn btn-success" onclick="abrirFormulario()">
                  <i class="fa fa-plus"></i> Ingresar Rol
                </a>
              </div>
              <div class="row">
                <div class="col-md-12"></div>

                <!-- advanced Tables --> 
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">          
                        <thead class="table-header">
                          <tr>
                            <th width="20%">Número de ID</th>
                            <th width="30%">Nombre del Rol</th>
                            <th width="20%">Estado</th>
                            <th width="10%">Ver</th>
                            <th width="10%">Editar</th>
                            <th width="10%">Cancelar</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          // Llamar al controlador para recuperar los registros de la tabla de base de datos
                          $Roles = RolesController::index();
                          foreach($Roles as $key => $Rol){
                              echo '<tr>
                                      <td>'.$Rol["id_roles"].'</td>
                                      <td>'.$Rol["nombre_de_usuario"].'</td>
                                      <td>'.$Rol["estado"].'</td>
                                      <td>
                                        <a href="#" class="btn btn-warning btn-sm">
                                          <i class="fa fa-eye nav-icon"></i> <span>Ver</span>
                                        </a>
                                      </td>
                                      <td>
                                        <a href="#" class="btn btn-primary btn-sm">
                                          <i class="fa fa-edit nav-icon"></i> <span>Editar</span>
                                        </a>
                                      </td>
                                      <td>
                                        <a href="#" class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash nav-icon"></i> <span>Cancelar</span>
                                        </a>
                                      </td>
                                    </tr>';
                          }
                        ?>
                        </tbody>
                      </table>
                      <div id="Roles-consulta" style="display: none;">
                        <h3>Factura Consultada</h3>
                        <iframe id="Roles-iframe" width="100%" height="500" frameborder="0"></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>  <!-- /.content-wrapper -->

  <!-- Incluye jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Incluye DataTables JS -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

  <!-- Incluye script -->
  <script src="plantilla.js"></script>

  <script>
    function consultarRoles(rutaRoles) {
      // Mostrar el área de consulta y cargar roles en el iframe
      const RolesConsulta = document.getElementById('Roles-consulta');
      const RolesIframe = document.getElementById('Roles-iframe');
      RolesIframe.src = rutaRoles;
      RolesConsulta.style.display = 'block';
    }
  </script>
</body>
</html>
