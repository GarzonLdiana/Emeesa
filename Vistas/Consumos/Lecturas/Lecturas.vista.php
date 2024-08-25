<?php
require_once "./controladores/Lecturas/Lectura.controller.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lectura del Medidor</title>
    <!-- Incluye DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css"/>
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
            <h1>Verificaciones de Lecturas</h1>
          </div>
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
                            <!-- Breadcrumbs -->
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Verificación de</li>
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
          <p>En esta sección, podrás ingresar, consultar y descargar las lecturas del medidor de los últimos 12 meses:</p>
          <div class="row">
            <div class="col-md-12">
              <!-- Botón Añadir -->
              <div class="mb-3">
                <a href="index.php?ruta=Consumos/Lecturas/Lecturas.crear" class="btn btn-success">
                  <i class="fa fa-plus"></i> Ingresar Lectura
                </a>
              </div>
              <!-- Advanced Tables --> 
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="table-responsive">
                    <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">          
                      <thead class="table-header">
                        <tr>
                          <th width="15%">Número de la Lectura</th>
                          <th width="15%">Código Interno</th>
                          <th width="15%">Fecha de la Lectura</th>
                          <th width="15%">Lectura</th>
                          <th width="10%">Descargar</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        // Llamar al controlador para recuperar los registros de la tabla de base de datos
                        $Lecturas = LecturaController::index();
                        foreach($Lecturas as $Lectura){
                            echo '<tr>
                                    <td>'.htmlspecialchars($Lectura["id_lectura"]).'</td>
                                    <td>'.htmlspecialchars($Lectura["consumo_id_consumo"]).'</td>
                                    <td>'.htmlspecialchars($Lectura["fecha_lectura"]).'</td>
                                    <td>'.htmlspecialchars($Lectura["lectura"]).'</td>
                                    <td>
                                      <a href="assets/Docs/' . htmlspecialchars($Lectura["pdf_path"]) . '" class="btn btn-warning btn-sm" target="_blank">
                                        <i class="fa fa-download nav-icon"></i> <span>Descargar</span>
                                      </a>
                                    </td>
                                  </tr>';
                        }
                      ?>
                      </tbody>
                    </table>
                    <div id="lectura-consulta" style="display: none;">
                      <h3>Lectura Consultada</h3>
                      <iframe id="lectura-iframe" width="100%" height="500" frameborder="0"></iframe>
                    </div>
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
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="plantilla.js"></script>

  <script>
    $(document).ready(function() {
      $('#datatables').DataTable();
    });

    function consultarLectura(rutaLectura) {
      const lecturaConsulta = document.getElementById('lectura-consulta');
      const lecturaIframe = document.getElementById('lectura-iframe');
      lecturaIframe.src = rutaLectura;
      lecturaConsulta.style.display = 'block';
    }
  </script>
</body>
</html>
