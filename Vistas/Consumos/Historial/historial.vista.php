<?php
require_once "./controladores/Consumos/historial.controller.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Consumo</title>
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
            <h1>Historial de Consumo</h1>
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
          <p>En esta sección, podrás ver el comportamiento de los consumos </p>
          <div class="row">
            <div class="col-md-12">
        <!-- Botón Añadir -->
            <div class="mb-3">
            <a href="#" class="btn btn-success" onclick="abrirFormulario()">
              <i class="fa fa-plus"></i> Ingresar registro
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
                          <th width="20%">Número de Factura</th>
                          <th width="30%">Periodo de consumo</th>
                          <th width="30%">Consumo kWh</th>
                          <th width="50%">Descargar</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        // Llamar al controlador para recuperar los registros de la tabla de base de datos
                        $Historial = HistorialController::index();
                        foreach($Historial as $key => $Historiales){
                            echo '<tr>
                                    <td>'.$Historiales["id_consumo"].'</td>
                                    <td>'.$Historiales["fecha_consumo"].'</td>
                                    <td>'.$Historiales["total_consumo"].'</td>';
                            
                            echo '<td>
                                    <a href="#" class="btn btn-warning btn-sm">
                                    <i class="fa fa-download nav-icon"></i> <span>Descargas</span>
                                    </a>
                                </td>
                            </tr>';
                        }
                      ?>
                
                        </tbody>
                    </table>

                    <!-- Gráfico consolidado -->
                    <div class="card bg-gradient-info chart-card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-th mr-1"></i>
                                Gráfico de consumos
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas class="chart" id="line-chart"
                                style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.card -->

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializa DataTable si aún no está inicializada
            if (!$.fn.DataTable.isDataTable('#datatables')) {
                var table = $('#datatables').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

                // Obtén los datos de la tabla para actualizar el gráfico
                function actualizarGrafico() {
                    var periodos = [];
                    var consumos = [];
                    
                    table.rows({ search: 'applied' }).every(function() {
                        var data = this.data();
                        periodos.push(data[1]); // Asume que la columna de periodo es la segunda
                        consumos.push(parseFloat(data[2])); // Asume que la columna de consumo es la tercera
                    });

                    // Actualiza los datos del gráfico
                    lineChart.data.labels = periodos;
                    lineChart.data.datasets[0].data = consumos;
                    lineChart.update();
                }

                // Inicializa el gráfico de línea
                var ctx = document.getElementById('line-chart').getContext('2d');
                var lineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [], // Se actualizarán con los datos de la tabla
                        datasets: [{
                            label: 'Consumo kWh',
                            data: [], // Se actualizarán con los datos de la tabla
                            borderColor: 'rgba(255,99,132,1)',
                            borderWidth: 1,
                            fill: false
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#ffffff' // Cambia el color del eje Y
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#ffffff' // Cambia el color del eje X
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#ffffff' // Cambia el color de las etiquetas de la leyenda
                                }
                            }
                        }
                    }
                });

                // Actualiza el gráfico cuando la tabla se redibuja (por ejemplo, al cambiar la página)
                table.on('draw', function() {
                    actualizarGrafico();
                });

                // Actualiza el gráfico al cargar la página
                actualizarGrafico();
            }
        });
    </script>

    <!-- Agrega la referencia a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
