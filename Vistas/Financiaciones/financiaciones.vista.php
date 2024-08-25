<?php
require_once "./controladores/Financiamientos/Financiaciones.controller.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Financiamientos</title>
    <!-- Incluye DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
    <!-- Estilos adicionales -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Financiamientos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Breadcrumbs -->
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Financiamientos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
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
          <p>En esta sección, podrás consultar el estado y detalles de tus solicitudes de financiación:</p>
          <div class="row">
            <div class="col-md-12">
              <!-- Botón Añadir -->
              <div class="mb-3">
                <a href="index.php?ruta=Financiaciones/financiaciones.crear" class="btn btn-success">
                  <i class="fa fa-plus"></i> Ingresar Financiación
                </a>
              </div>
              <!-- advanced Tables -->
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="table-responsive">
                    <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">
                      <thead class="table-header">
                        <tr>
                          <th width="15%">Número de acuerdo de Pago</th>
                          <th width="15%">Fecha de Respuesta</th>
                          <th width="15%">Monto Financiado</th>
                          <th width="15%">Plan de pago</th>
                          <th width="15%">Estado</th>
                          <th width="30%">Detalles</th>
                          <th width="30%">Descargar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Llamar al controlador para recuperar los registros de la tabla de base de datos
                        $financiaciones = FinanciacionesController::index();
                        foreach ($financiaciones as $financiacion) {
                          echo '<tr>
                                  <td>' . htmlspecialchars($financiacion["id_financiaciones"]) . '</td>
                                  <td>' . htmlspecialchars($financiacion["fecha_respuesta"]) . '</td>
                                  <td>' . htmlspecialchars($financiacion["monto_financiado"]) . '</td>
                                  <td>' . htmlspecialchars($financiacion["plan_pago"]) . '</td>
                                  <td>' . htmlspecialchars($financiacion["estado"]) . '</td>
                                  <td>' . htmlspecialchars($financiacion["detalles"]) . '</td>
                                  <td> <a href="assets/Docs/' . htmlspecialchars($financiacion["pdf_path"]) . '" class="btn btn-warning btn-sm" target="_blank">
                                        <i class="fa fa-download nav-icon"></i> <span>Descargar</span>
                                      </a>
                                  </td>
                                </tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                    <div id="financiaciones-consulta" style="display: none;">
                      <h3>Financiación Consultada</h3>
                      <iframe id="financiaciones-iframe" width="100%" height="500" frameborder="0"></iframe>
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
  </div> <!-- /.content-wrapper -->

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
  
  <script>
    $(document).ready(function () {
      $('#datatables').DataTable();
      // configuración adicional para DataTables
    });

    function consultarFinanciaciones(rutaFinanciaciones) {
      // Mostrar el área de consulta y cargar la financiación en el iframe
      const financiacionesConsulta = document.getElementById('financiaciones-consulta');
      const financiacionesIframe = document.getElementById('financiaciones-iframe');
      financiacionesIframe.src = rutaFinanciaciones;
      financiacionesConsulta.style.display = 'block';
    }
  </script>
</body>

</html>
