<?php
// ruta del controlador
require_once "./controladores/Facturas/Facturas.controller.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nuevo registro</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item">Facturas</li>
                        <li class="breadcrumb-item active">Nueva Factura</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <form role="form" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputCode">Número de factura</label>
                        <input type="text" id="inputCode" class="form-control"
                            name="addInputCode" placeholder="Ingrese el número, max 8 caracteres."
                            required minlength="1" maxlength="8">
                    </div>
                    <div class="form-group">
                        <label for="inputFechaEmision">Fecha de Emisión</label>
                        <input type="date" id="inputFechaEmision" class="form-control"
                            name="addInputFechaEmision" placeholder="Ingrese la fecha en que se emitió la factura."
                            required>
                    </div>
                    <div class="form-group">
                        <label for="inputMonto">Monto</label>
                        <input type="text" id="inputMonto" class="form-control"
                            name="addInputMonto" placeholder="Ingrese el valor de la factura."
                            required minlength="1" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="inputDetalle">Detalle</label>
                        <input type="text" id="inputDetalle" class="form-control"
                            name="addInputDetalle" placeholder="Ingrese el mes que le corresponde la facturación."
                            required minlength="3" maxlength="50">
                    </div>
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save nav-icon"></i>
                            <span>Guardar</span></button>
                        <a href="#" class="btn btn-warning"><i class="fa fa-power-off nav-icon"></i>
                            <span>Cancelar</span></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php
    /**
     * Llamar a la función del controlador: Crear 
     */
    $addMFacturaModel = FacturasController::create();

?>