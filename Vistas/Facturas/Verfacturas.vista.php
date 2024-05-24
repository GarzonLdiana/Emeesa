<?php
		require_once "./controladores/Facturas/Facturas.controller.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Facturas</title>
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
            <h1>Facturas</h1>
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
          <p>En esta sección, podrás consultar y descargar tus facturas:</p>
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
                          <th width="10%">Fecha de emisión</th>
                          <th width="5%">Descargar</th>
                          <th width="5%">Consultar</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                    
                    /**Llamar al controlador para recuperar los registros de la tabla de base de datos */

                        $Facturas = FacturasController::index();
												        foreach($Facturas as $key => $Factura){
													echo ' <tr>
																	<td>'.$Factura["id_factura"].'</td>
																	<td>'.$Factura["fecha_emision"].'</td>
                            			<td>
																		<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-eye nav-icon"></i> <span>Consultar</a>
																		<a href="#" class="btn btn-primary btn-sm"><i class="far fa-edit nav-icon"></i> <span></i> <span>Editar</a>
																		<a href="#" class="btn btn-danger btn-sm" Id =""><i class="fa fa-trash nav-icon"></i> <span>Eliminar</span></a>
																	</td>
																</tr>';
												
                              }
                              ?>

                        <tr>
                          <td>001</td>
                          <td>2023-10-01</td>
                          <td><a href="factura_001.pdf" target="_blank">Descargar</a></td>
                          <td><button onclick="consultarFactura('factura_001.pdf')">Consultar</button></td>
                        </tr>
                        <tr>
                          <td>002</td>
                          <td>2023-10-05</td>
                          <td><a href="factura_002.pdf" target="_blank">Descargar</a></td>
                          <td><button onclick="consultarFactura('factura_002.pdf')">Consultar</button></td>
                        </tr>
                        <tr>
                          <td>003</td>
                          <td>2023-10-10</td>
                          <td><a href="factura_003.pdf" target="_blank">Descargar</a></td>
                          <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                        </tr>

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

  <!-- Incluye  script  -->
  <script src="plantilla.js"></script>

  <script>
    //$(document).ready(function() {
   //     $('#datatables').DataTable({
    //        // configuración adicionales para DataTables
   //     });
   // });

    function consultarFactura(rutaFactura) {
      // Mostrar el área de consulta y cargar la factura en el iframe

      const facturaConsulta = document.getElementById('factura-consulta');
      const facturaIframe = document.getElementById('factura-iframe');
      facturaIframe.src = rutaFactura;
      facturaConsulta.style.display = 'block';
    }
  </script>
</body>
</html>
