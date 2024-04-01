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
                         </div>
                         
                      </div>
                      <div class="card-body">
                        <p>En esta sección, podrás consultar y descargar tus facturas:</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Número de Factura</th>
                                    <th>Fecha</th>
                                    <th>Descargar</th>
                                    <th>Consultar</th>
                                </tr>
                            </thead>
                            <tbody>
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
                      <!-- /.card-body -->
                      
                      <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
              
                  </section>
                  <!-- /.content -->
                  <script>
                      function consultarFactura(rutaFactura) {
                          // Mostrar el área de consulta y cargar la factura en el iframe
                          const facturaConsulta = document.getElementById('factura-consulta');
                          const facturaIframe = document.getElementById('factura-iframe');
                          facturaIframe.src = rutaFactura;
                          facturaConsulta.style.display = 'block';
                      }
                  </script>

            </div>  <!-- /.content-wrapper -->