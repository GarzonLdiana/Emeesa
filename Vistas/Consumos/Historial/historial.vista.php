<?php
require_once "./controladores/Consumos/historial.controller.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Consumos</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Incluye Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            <h2>Historial de Consumos</h2>

            <p>En esta sección, podrás ver el comportamiento de los consumos de los últimos 6 meses:</p>
            <div class="card">
                <div class="card-header collapsed-card">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id consumo</th> 
                                <th>Periodo de Consumo</th>
                                <th>Consumo kWh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>65</td> 
                                <td>2022-12</td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>73</td>
                                <td>2023-01</td>
                            </tr>
                            <tr>
                                <td>003</td>
                                <td>61</td>
                                <td>2023-02</td>
                            </tr>
                            <tr>
                                <td>004</td>
                                <td>34</td>
                                <td>2023-03</td>
                            </tr>
                            <tr>
                                <td>005</td>
                                <td>89</td>
                                <td>2023-04</td>
                            </tr>
                            <tr>
                                <td>006</td>
                                <td>84</td>
                                <td>2023-05</td>
                            </tr>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Datos de la tabla
            const periodos = ['2022-12', '2023-01', '2023-02', '2023-03', '2023-04', '2023-05'];
            const consumos = [65, 73, 61, 34, 89, 84];

            // Inicializa el gráfico de línea
            var ctx = document.getElementById('line-chart').getContext('2d');
            var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: periodos,
                    datasets: [{
                        label: 'Consumo kWh',
                        data: consumos,
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
        });
    </script>

    <!-- Agrega la referencia a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
