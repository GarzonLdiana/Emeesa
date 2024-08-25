<?php
require_once "./controladores/Tarifas/tarifas.controller.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tarifas Aplicadas</title>
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
                        <h1>Tarifas Aplicadas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Tarifas Aplicadas</li>
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
                    <p>En esta sección, podrás consultar y descargar la información de las tarifas.</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <a href="index.php?ruta=Tarifas/tarifas.crear" class="btn btn-success">
                                    <i class="fa fa-plus"></i> Ingresar Tarifa
                                </a>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">
                                            <thead class="table-header">
                                                <tr>
                                                    <th width="20%">Código Tarifa</th>
                                                    <th width="20%">Mes - Año</th>
                                                    <th width="20%">Descargar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $Tarifas = TarifasController::index();
                                                foreach ($Tarifas as $Tarifa) {
                                                    echo '<tr>
                                                            <td>' . htmlspecialchars($Tarifa["id_tarifa"]) . '</td>
                                                            <td>' . htmlspecialchars($Tarifa["mes_año_tarifa"]) . '</td>
                                                            <td> <a href="assets/Docs/' . htmlspecialchars($Tarifa["pdf_path"]) . '" class="btn btn-warning btn-sm" target="_blank">
                                                                    <i class="fa fa-download nav-icon"></i> <span>Descargar</span>
                                                                </a>
                                                            </td>
                                                        </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>
</body>

</html>