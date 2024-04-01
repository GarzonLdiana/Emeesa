<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <br>
        <h2>Tarifas Aplicadas</h2>
        <br>
        <p>En esta sección, podrás consultar el Historial de Tarifas Aplicadas.</p>
        <br>
    <div class="card">
    <div class="card-header collapse-card">
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    
    </div>
    <div class="card-body">

     <table class="table">
            <thead>
                <tr>
                    <th>Fecha Desde</th>
                    <th>Fecha Hasta</th>
                    <th>Descargar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2023-12-31" /></td>
                    <td><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2023-12-31" /></td>
                    <td><a href="factura_001.pdf" target="_blank">Descargar</a></td>
                    <td><button onclick="consultarFactura('factura_001.pdf')">Consultar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
        <!-- Resto de las secciones -->
    </section>
</div>

<script>
    function consultarFactura(rutaFactura) {
        // Mostrar el área de consulta y cargar la factura en el iframe
        const facturaConsulta = document.getElementById('factura-consulta');
        const facturaIframe = document.getElementById('factura-iframe');
        facturaIframe.src = rutaFactura;
        facturaConsulta.style.display = 'block';
    }
</script>

<!-- Agrega la referencia a Bootstrap JS y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
