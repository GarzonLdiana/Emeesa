<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Consumo</title>
    <!-- Incluye SweetAlert desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Incluye Bootstrap CSS para los estilos (opcional, pero recomendado si usas Bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los íconos (opcional, pero recomendado si usas íconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <?php
    // Ruta del controlador
    require_once "./controladores/Consumos/historial.controller.php";
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nuevo Consumo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?ruta=Consumos/Historial/historial.crear">Inicio</a></li>
                            <li class="breadcrumb-item">Historial de Consumo</li>
                            <li class="breadcrumb-item active">Ingresar Nuevo Consumo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <form role="form" method="post" enctype="multipart/form-data" action="index.php?ruta=Consumos/Historial/historial.crear">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCode">Código Interno</label>
                            <input type="text" id="inputCode" class="form-control" name="addInputCode" placeholder="Ingrese el número, max 8 caracteres." required minlength="1" maxlength="8">
                        </div>
                        <div class="form-group">
                            <label for="inputPeriodoConsumo">Periodos de Consumos</label>
                            <input type="text" id="inputPeriodoConsumo" class="form-control" name="addInputPeriodoConsumo" placeholder="Ingrese el rango de consumos." required>
                        </div>
                        <div class="form-group">
                            <label for="inputRangoFacturas">Periodos de Facturación</label>
                            <input type="text" id="inputRangoFacturas" class="form-control" name="addInputRangoFacturas" placeholder="Ingrese el rango de facturación." required>
                        </div>
                        <div class="form-group">
                            <label for="inputTotalConsumo">Consumo kWh</label>
                            <input type="text" id="inputTotalConsumo" class="form-control" name="addInputTotalConsumo" placeholder="Ingrese el consumo." required minlength="1" maxlength="8">
                        </div>
                        <div class="form-group">
                            <label for="inputPdf">Subir PDF del Historial de Consumo</label>
                            <input type="file" id="inputPdf" class="form-control" name="inputPdf" required>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save nav-icon"></i> <span>Guardar</span></button>
                            <a href="index.php?ruta=/Historial/historial" class="btn btn-warning"><i class="fa fa-power-off nav-icon"></i> <span>Cancelar</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <?php
    // Llamar a la función del controlador: Crear
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        HistorialController::create();
    }
    ?>
    

    <!-- Incluye Bootstrap JS y jQuery (opcional, pero recomendado si usas Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
