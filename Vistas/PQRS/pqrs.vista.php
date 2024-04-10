<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PQRS - Peticiones, Quejas, Reclamos o Sugerencias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        
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
                <h3 class="card-title">Información</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                   
                </div>
            </div>
            <div class="card-body">
            <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="text-align: center; border: 1px solid #f7eeee; padding: 10px;">
                    <img src="./assets/imagenes/consumo.png" alt="Icono de Consumo"
                        style="width: 80px; display: block; margin: 0 auto;">
                    <br>Consumo
                </th>
                <th style="text-align: center; border: 1px solid #f7eeee; padding: 10px;">
                    <img src="./assets/imagenes/tarifa.png" alt="Icono de Tarifa"
                        style="width: 80px; display: block; margin: 0 auto;">
                    <br>Tarifa
                </th>
                <th style="text-align: center; border: 1px solid #f7eeee; padding: 10px;">
                    <img src="./assets/imagenes/financiamiento.png" alt="Icono de Financiamiento"
                        style="width: 80px; display: block; margin: 0 auto;">
                    <br>Financiamiento
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #f7eeee; padding: 30px; text-align: left;">
                    <p>Casos relacionados con el consumo registrado en su factura de energía</p>
                    <br>
                </td>
                <td style="border: 1px solid #f7eeee; padding: 30px; text-align: center;">
                    <p>Casos relacionados con la Tarifa aplicada en su factura de energía</p>
                    <br>
                </td>
                <td style="border: 1px solid #f7eeee; padding: 30px; text-align: right;">
                    <p>Casos relacionados con el financiamiento en su factura de energía</p>
                    <br>
                </td>
            </tr>
        </tbody>
    </table>                


            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <script>
        document.getElementById('pqrsForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            // Aquí puedes agregar la lógica para enviar los datos a un servidor o procesarlos

            // Mostrar mensaje de éxito o redirigir al usuario
            const pqrExito = document.getElementById('pqrs-exito');
            pqrExito.style.display = 'block';
        });
    </script>

</div> <!-- /.content-wrapper -->