<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Factura</title>
    <!-- Incluye SweetAlert desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    // Ruta del controlador
    require_once "./controladores/Facturas/Facturas.controller.php";
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nueva Factura</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?ruta=Facturas/Verfacturas.crear">Inicio</a></li>
                            <li class="breadcrumb-item">Facturas</li>
                            <li class="breadcrumb-item active">Ingresa nueva Factura</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <form role="form" method="post" enctype="multipart/form-data" action="index.php?ruta=Facturas/Verfacturas.crear">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCode">Número de factura</label>
                            <input type="text" id="inputCode" class="form-control" name="addInputCode" placeholder="Ingrese el número, max 8 caracteres." required minlength="1" maxlength="8">
                        </div>
                        <div class="form-group">
                            <label for="inputFechaEmision">Fecha de Emisión</label>
                            <input type="date" id="inputFechaEmision" class="form-control" name="addInputFechaEmision" placeholder="Ingrese la fecha en que se emitió la factura." required>
                        </div>
                        <div class="form-group">
                            <label for="inputMonto">Monto</label>
                            <input type="text" id="inputMonto" class="form-control" name="addInputMonto" placeholder="Ingrese el valor de la factura." required minlength="1" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="inputDetalle">Detalle</label>
                            <input type="text" id="inputDetalle" class="form-control" name="addInputDetalle" placeholder="Ingrese el mes que le corresponde la facturación." required minlength="3" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="inputPdf">Subir PDF de la factura</label>
                            <input type="file" id="inputPdf" class="form-control" name="inputPdf" required>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save nav-icon"></i> <span>Guardar</span></button>
                            <a href="index.php?ruta=Facturas/Verfacturas" class="btn btn-warning"><i class="fa fa-power-off nav-icon"></i> <span>Cancelar</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <?php
    // Llamar a la función del controlador: Crear
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        FacturasController::create();
    }
    ?>
</body>
</html>
