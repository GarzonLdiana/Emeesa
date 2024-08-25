<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Financiación</title>
    <!-- Incluye SweetAlert desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    // Ruta del controlador
    require_once "./controladores/Financiamientos/Financiaciones.controller.php";
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nueva Financiación</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="index.php?ruta=Financiaciones/financiaciones">Inicio</a></li>
                            <li class="breadcrumb-item">Financiaciones</li>
                            <li class="breadcrumb-item active">Ingresa nueva Financiación</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <form role="form" method="post" enctype="multipart/form-data"
                    action="index.php?ruta=Financiaciones/financiaciones.crear">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCode">Número de acuerdo de pago</label>
                            <input type="text" id="inputCode" class="form-control" name="addInputCode"
                                placeholder="Ingrese el número, max 8 caracteres." required minlength="1" maxlength="8">
                        </div>
                        <div class="form-group">
                            <label for="inputFechaRespuesta">Fecha de Respuesta</label>
                            <input type="date" id="inputFechaRespuesta" class="form-control"
                                name="addInputFechaRespuesta"
                                placeholder="Ingrese la fecha en que se ingresó la solicitud." required>
                        </div>
                        <div class="form-group">
                            <label for="inputMontoFinanciado">Monto</label>
                            <input type="text" id="inputMontoFinanciado" class="form-control"
                                name="addInputMontoFinanciado" placeholder="Ingrese el valor financiado." required
                                minlength="1" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="tipoPlanPago">Plan de Pago:</label>
                            <select class="form-control" id="planPago" name="addInputPlanPago" required>
                                <option value="">Selecciona la opción que deseas</option>
                                <option value="Quincenal" <?php echo isset($financiaciones['plan']) && $financiaciones['plan'] == 'Quincenal' ? 'selected' : ''; ?>>Quincenal</option>
                                <option value="Mensual" <?php echo isset($financiaciones['plan']) && $financiaciones['plan'] == 'Mensual' ? 'selected' : ''; ?>>Mensual</option>
                                <option value="No Aplica" <?php echo isset($financiaciones['plan']) && $financiaciones['plan'] == 'No Aplica' ? 'selected' : ''; ?>>No Aplica</option>
                            </select>
                        </div>
                        <label for="tipoEstado">Estado:</label>
                        <select class="form-control" id="estado" name="addInputEstado" required>
                            <option value="">Selecciona la opción que deseas</option>
                            <option value="Aprobado" <?php echo isset($financiaciones['estado']) && $financiaciones['estado'] == 'Aprobado' ? 'selected' : ''; ?>>Aprobado</option>
                            <option value="No Aprobado" <?php echo isset($financiaciones['estado']) && $financiaciones['estado'] == 'No Aprobado' ? 'selected' : ''; ?>>No Aprobado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputDetalles">Detalles</label>
                        <input type="text" id="inputDetalles" class="form-control" name="addInputDetalles"
                            placeholder="Ingrese información relevante de la solicitud." required minlength="3"
                            maxlength="80">
                    </div>
                    <div class="form-group">
                        <label for="inputPdf">Subir PDF de la Rpta de la solicitud</label>
                        <input type="file" id="inputPdf" class="form-control" name="inputPdf" required>
                    </div>
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save nav-icon"></i>
                            <span>Guardar</span></button>
                        <a href="index.php?ruta=Financiaciones/financiaciones" class="btn btn-warning"><i
                                class="fa fa-power-off nav-icon"></i> <span>Cancelar</span></a>
                    </div>
            </div>
            </form>
    </div>
    </section>
    </div>

    <?php
    // Llamar a la función del controlador: Crear
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        FinanciacionesController::create();
    }
    ?>
</body>

</html>