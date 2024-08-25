<?php
require_once "./controladores/Facturas/Facturas.controller.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Facturas</title>
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
                        <h1>Facturas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Breadcrumbs -->
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Facturas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
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
          <p>En esta sección, podrás consultar y descargar tus facturas:</p>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                 <!-- Botón Añadir -->
                <a href="index.php?ruta=Facturas/Verfacturas.crear" class="btn btn-success">
                  <i class="fa fa-plus"></i> Ingresar Factura
                </a>
              </div>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="table-responsive">
                    <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">
                      <thead class="table-header">
                        <tr>
                          <th width="20%">Número de Factura</th>
                          <th width="20%">Fecha de emisión</th>
                          <th width="20%">Monto</th>
                          <th width="30%">Detalle</th>
                          <th width="10%">Descargar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Llamar al controlador para recuperar los registros de la tabla de base de datos
                        $facturas = FacturasController::index();
                        foreach ($facturas as $factura) {
                          echo '<tr>
                                  <td>' . htmlspecialchars($factura["id_factura"]) . '</td>
                                  <td>' . htmlspecialchars($factura["fecha_emision"]) . '</td>
                                  <td>' . htmlspecialchars($factura["monto"]) . '</td>
                                  <td>' . htmlspecialchars($factura["detalle"]) . '</td>
                                  <td> <a href="assets/Docs/' . htmlspecialchars($factura["pdf_path"]) . '" class="btn btn-warning btn-sm" target="_blank">
                                      <i class="fa fa-download nav-icon"></i> <span>Descargar</span>
                                    </a>
                                  </td>
                                </tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                    <div id="factura-consulta" style="display: none;">
                      <h3>Factura Consultada</h3>
                      <iframe id="factura-iframe" width="100%" height="500" frameborder="0"></iframe>
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
    $(document).ready(function () {
      $('#datatables').DataTable();
    });

    function consultarFactura(rutaFactura) {
      const facturaConsulta = document.getElementById('factura-consulta');
      const facturaIframe = document.getElementById('factura-iframe');
      facturaIframe.src = rutaFactura;
      facturaConsulta.style.display = 'block';
    }
  </script>
</body>

</html>