<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2>Historial de Consumos</h2>

        <p>En esta sección, podrás ver el comportamiento de los consumos de los ultimos 6 meses:</p>
        <div class="card">
            <div class="card-header collapsed-card">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>

                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Periodo de Consumo</th>
                            <th>Consumo kWh </th>
                            <th>Grafica de Consumos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>2022-12</td>
                            <td>65</td>
                            <td>
                                <img src="./assets/imagenes/HistorialConsumos.jpg" alt="Historial de Consumos"
                                    style="display: block; margin: 80 length; width: 80px;">
                            </td>

                        <tr>

                            <td>2023-01</td>
                            <td>73</td>
                            <td>
                                <img src="./assets/imagenes/HistorialConsumos.jpg" alt="Historial de Consumos"
                                    style="display: block; margin: 80 length; width: 80px;">
                            </td>

                        </tr>
                        <tr>
                            <td>2023-02</td>
                            <td>61</td>
                            <td>
                                <img src="./assets/imagenes/HistorialConsumos.jpg" alt="Historial de Consumos"
                                    style="display: block; margin: 80 length; width: 80px;">
                            </td>

                        </tr>
                        <tr>
                            <td>2023-03</td>
                            <td>34</td>
                            <td>
                                <img src="./assets/imagenes/HistorialConsumos.jpg" alt="Historial de Consumos"
                                    style="display: block; margin: 80 length; width: 80px;">
                            </td>

                        </tr>
                        <tr>
                            <td>2023-04</td>
                            <td>89</td>
                            <td>
                                <img src="./assets/imagenes/HistorialConsumos.jpg" alt="Historial de Consumos"
                                    style="display: block; margin: 80 length; width: 80px;">
                            </td>
                        </tr>
                        <tr>
                            <td>2023-05</td>
                            <td>84</td>
                            <td>
                                <img src="./assets/imagenes/HistorialConsumos.jpg" alt="Historial de Consumos"
                                    style="display: block; margin: 80 length; width: 80px;">
                            </td>
                        </tr>
                        <tr>

                    </tbody>
                </table>
                <div id="historial-consulta" style="display: none;">
                    <h3>Factura Consultada</h3>
                    <iframe id="historial-iframe" width="100%" height="500" frameborder="0"></iframe>
                </div>
            </div>
    </section>
</div>

<script>
    function consultarFactura(rutaFactura) {
        // Mostrar el área de consulta y cargar la factura en el iframe
        const facturaConsulta = document.getElementById('historial-consulta');
        const facturaIframe = document.getElementById('historial-iframe');
        facturaIframe.src = rutaFactura;
        facturaConsulta.style.display = 'block';
    }
</script>

<!-- Agrega la referencia a Bootstrap JS y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->