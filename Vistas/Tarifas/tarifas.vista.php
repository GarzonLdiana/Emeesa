<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Tarifas</title>
    <!-- Agrega la referencia a jQuery, DataTables CSS y JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2>Tarifas Aplicadas</h2>

        </section>

        <div class="card">
            <div class="card-header collapse-card">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>



            <div class="card-body">
                <p>En esta sección, podrás consultar el Historial de Tarifas Aplicadas.</p>

                <!-- Botón Añadir -->
                <div class="mb-3">
                    <a href="#" class="btn btn-success" onclick="abrirFormulario()">
                        <i class="fa fa-plus"></i> Ingresar registro
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-12"></div>

                    <table id="tablaTarifas" class="table display">
                        <thead>
                            <tr>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>Consultar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Datos de tarifas por año y mes
                            $tarifas = [
                                ["año" => 2024, "mes" => "ABRIL", "archivo" => "Abril2024.pdf"],
                                ["año" => 2024, "mes" => "MARZO", "archivo" => "Marzo2024.pdf"],
                                ["año" => 2024, "mes" => "FEBRERO", "archivo" => "Febrero2024.pdf"],
                                ["año" => 2024, "mes" => "ENERO", "archivo" => "Enero2024.pdf"],
                                ["año" => 2023, "mes" => "DICIEMBRE", "archivo" => "Diciembre2023.pdf"],
                                ["año" => 2023, "mes" => "NOVIEMBRE", "archivo" => "Noviembre2023.pdf"],
                                ["año" => 2023, "mes" => "OCTUBRE", "archivo" => "Octubre2023.pdf"],
                                ["año" => 2023, "mes" => "SEPTIEMBRE", "archivo" => "Septiembre2023.pdf"],
                                ["año" => 2023, "mes" => "AGOSTO", "archivo" => "Agosto2023.pdf"],
                                ["año" => 2023, "mes" => "JULIO", "archivo" => "Julio2023.pdf"],
                                ["año" => 2023, "mes" => "JUNIO", "archivo" => "Junio2023.pdf"],
                                ["año" => 2023, "mes" => "MAYO", "archivo" => "Mayo2023.pdf"],
                                ["año" => 2023, "mes" => "ABRIL", "archivo" => "Abril2023.pdf"],
                                ["año" => 2023, "mes" => "MARZO", "archivo" => "Marzo2023.pdf"],
                                ["año" => 2023, "mes" => "FEBRERO", "archivo" => "Febrero2023.pdf"],
                                ["año" => 2023, "mes" => "ENERO", "archivo" => "Enero2023.pdf"]
                            ];
                            foreach ($tarifas as $tarifa) {
                                echo "<tr>
                            <td style='text-align: center; border: 1px solid #f7eeee; padding: 10px;'>{$tarifa['año']}</td>
                            <td style='text-align: center; border: 1px solid #f7eeee; padding: 10px;'>{$tarifa['mes']}</td>
                            <td style='text-align: center; border: 1px solid #f7eeee; padding: 10px;'>
                                
                            <a href='#' class='btn btn-warning btn-sm' onclick=\"abrirPDF('{$tarifa['archivo']}')\">
                                        <i class='fa fa-file-pdf nav-icon'></i> Abrir PDF
                                    </a>
                                </td>
                        </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                // Función para abrir PDF
                function abrirPDF(archivo) {
                    let ventanaPDF = window.open(`./assets/docs/${archivo}`, '_blank');
                    ventanaPDF.focus();
                }

                // Inicializar DataTables
                $(document).ready(function () {
                    $('#tablaTarifas').DataTable();
                });
            </script>

            <!-- Agrega la referencia a Bootstrap JS y jQuery -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>