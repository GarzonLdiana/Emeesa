<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($id_pqrs) ? ($id_pqrs ? 'Editar' : 'Crear') : 'Crear'; ?> PQRSF</title>
    <!-- Incluye SweetAlert desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    // Ruta del controlador
    require_once "./controladores/PQRS/Pqrs.controller.php";

    // Definir $id_pqrs en caso de que no esté definido
    $id_pqrs = isset($id_pqrs) ? $id_pqrs : null;

    // Definir $pqrs en caso de que no esté definido
    $pqrs = isset($pqrs) ? $pqrs : [];
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $id_pqrs ? 'Editar' : 'Crear'; ?> PQRS - Peticiones, Quejas, Reclamos, Sugerencias o Felicitaciones</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?ruta=PQRS/Consulta/Consulta">Inicio</a></li>
                            <li class="breadcrumb-item">PQRSF</li>
                            <li class="breadcrumb-item active"><?php echo $id_pqrs ? 'Editar' : 'Crear'; ?> PQRSF</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <form role="form" method="post" action="<?php echo $id_pqrs ? 'index.php?ruta=PQRS/Consulta/Actualizar&id_pqrs=' . $id_pqrs : 'index.php?ruta=PQRS/Consulta/Crear'; ?>">
                    <div class="card-header">
                        <h3 class="card-title">Ingresa tu PQRS</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCode">Número de PQRS</label>
                            <input type="text" id="inputCode" class="form-control" name="addInputCode" value="<?php echo isset($pqrs['id_pqrs']) ? htmlspecialchars($pqrs['id_pqrs']) : ''; ?>" placeholder="Ingrese el número, max 8 caracteres." required minlength="1" maxlength="8">
                        </div>

                        <div class="form-group">
                            <label for="inputFechaRadicacion">Fecha de Radicación</label>
                            <input type="date" id="inputFechaRadicacion" class="form-control" name="addInputFechaRadicacion" value="<?php echo isset($pqrs['fecha_radicacion']) ? date('Y-m-d', strtotime($pqrs['fecha_radicacion'])) : ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tipoPqrs">Tipo:</label>
                            <select class="form-control" id="tipoPqrs" name="addInputTipo" required>
                                <option value="">Selecciona la opción que deseas</option>
                                <option value="Peticion" <?php echo isset($pqrs['tipo']) && $pqrs['tipo'] == 'Peticion' ? 'selected' : ''; ?>>Petición</option>
                                <option value="Queja" <?php echo isset($pqrs['tipo']) && $pqrs['tipo'] == 'Queja' ? 'selected' : ''; ?>>Queja</option>
                                <option value="Reclamo" <?php echo isset($pqrs['tipo']) && $pqrs['tipo'] == 'Reclamo' ? 'selected' : ''; ?>>Reclamo</option>
                                <option value="Sugerencia" <?php echo isset($pqrs['tipo']) && $pqrs['tipo'] == 'Sugerencia' ? 'selected' : ''; ?>>Sugerencia</option>
                                <option value="Felicitación" <?php echo isset($pqrs['tipo']) && $pqrs['tipo'] == 'Felicitación' ? 'selected' : ''; ?>>Felicitación</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mensaje">Detalle:</label>
                            <textarea class="form-control" id="mensaje" name="addInputDetalle" rows="4" required><?php echo isset($pqrs['detalle']) ? htmlspecialchars($pqrs['detalle']) : ''; ?></textarea>
                        </div>

                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save nav-icon"></i> <span>Guardar</span></button>
                            <a href="index.php?ruta=PQRS/Consulta/Consulta" class="btn btn-warning"><i class="fa fa-power-off nav-icon"></i> <span>Cancelar</span></a>
                        </div>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div> <!-- /.content-wrapper -->

    <?php
    // Verifica si se ha enviado un POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($id_pqrs) {
            // Si hay ID, es una actualización
            PqrsController::update($id_pqrs);
        } else {
            // Si no hay ID, es una creación
            PqrsController::create();
        }
    }
    ?>
</body>

</html>
