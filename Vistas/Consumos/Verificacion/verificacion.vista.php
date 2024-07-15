<?php
require_once "./controladores/Verificacion/verificacion.controller.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lectura de Contador</title>
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
            <h1>Verificaciones de Lecturas</h1>
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
          <p>En esta sección, podrás ingresar, consultar las lecturas del medidor de los últimos 12 meses:</p>
          <div class="row">
            <div class="col-md-12">
              <!-- Botón Añadir -->
              <div class="mb-3">
                <a href="#" class="btn btn-success" onclick="abrirFormulario()">
                  <i class="fa fa-plus"></i> Generar solicitud
                </a>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <!-- advanced Tables --> 
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">          
                          <thead class="table-header">
                            <tr>
                              <th width="15%">Número de Factura</th>
                              <th width="15%">Fecha de Lectura</th>
                              <th width="15%">Lectura del Medidor</th>
                              <th width="20%">Foto del Medidor</th>
                              <th width="15%">Descargar</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // Llamar al controlador para recuperar los registros de la tabla de base de datos
                            $Verificacion = VerificacionController::index();
                            foreach($Verificacion as $key => $Verificaciones){
                                echo '<tr>
                                        <td>'.$Verificaciones["factura_id_factura"].'</td>
                                        <td>'.$Verificaciones["fecha_lectura"].'</td>
                                        <td>'.$Verificaciones["detalle_lectura"].'</td>
                                        <td>'.$Verificaciones["registro_fotografico"].'</td>';
                                
                                echo '<td>
                                        <a href="#" class="btn btn-warning btn-sm">
                                        <i class="fa fa-download nav-icon"></i> <span>PDF</span>
                                        </a>
                                    </td>
                                </tr>';
                            }
                          ?>
                          </tbody>
                        </table>
                        <div id="verificacion-consulta" style="display: none;">
                          <h3>Lectura Consultada</h3>
                          <iframe id="verificacion-iframe" width="100%" height="500" frameborder="0"></iframe>
                        </div>
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
    //$(document).ready(function() {
    //     $('#datatables').DataTable({
    //        // configuración adicionales para DataTables
    //     });
    // });

    function consultarVerificacion(rutaVerificacion) {
      // Mostrar el área de consulta y cargar la factura en el iframe
      const verificacionConsulta = document.getElementById('verificacion-consulta');
      const verificacionIframe = document.getElementById('verificacion-iframe');
      verificacionIframe.src = rutaVerificacion;
      verificacionConsulta.style.display = 'block';
    }
  </script>
</body>
</html>
