<?php
require_once "./controladores/Tarifas/tarifas.controller.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tarifa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nueva Tarifa</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <form role="form" method="post" enctype="multipart/form-data" action="index.php?ruta=Tarifas/tarifas.crear">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCode">Código Tarifa</label>
                            <input type="text" id="inputCode" class="form-control" name="addInputCode" placeholder="Ingrese el número, max 8 caracteres." required minlength="1" maxlength="8">
                        </div>
                        <div class="form-group">
                            <label for="inputMesAño">Mes - Año</label>
                            <input type="date" id="inputMesAño" class="form-control" name="addInputMesAño" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPdf">Subir PDF de la Tarifa</label>
                            <input type="file" id="inputPdf" class="form-control" name="inputPdf" accept=".pdf" required>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save nav-icon"></i> <span>Guardar</span></button>
                            <a href="index.php?ruta=Tarifas/tarifas" class="btn btn-warning"><i class="fa fa-power-off nav-icon"></i> <span>Cancelar</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        TarifasController::create(); // Llamar al controlador para crear la tarifa
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>