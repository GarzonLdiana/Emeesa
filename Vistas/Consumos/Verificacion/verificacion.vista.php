<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    <h2>Verificación de Lecturas</h2>
    <p>En esta sección, podrás consultar las lecturas de los ultimos 12 meses y sus respectivas fotos:</p>
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
                    <th>Fecha Toma de Lectura</th>
                    <th>Lectura</th>
                    <th>Ver Foto del Medidor</th>
                    </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td>2023-01-01</td>
					<td>1235</td>
                    <td><button onclick="consultarFactura('factura_001.pdf')">Consultar</button></td>
                </tr>
                <tr>
                   
                    <td>2023-02-01</td>
					 <td>1308</td>
                     <td><button onclick="consultarFactura('factura_002.pdf')">Consultar</button></td>
                </tr>
                <tr>
                    <td>2023-03-01</td>
					<td>1369</td>
                    <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-04-01</td>
					<td>1403</td>
                    <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-05-01</td>
					<td>1492</td>
                    <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-06-01</td>
					<td>1576</td>
                    <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-07-01</td>
					<td>1658</td>
                    <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-08-01</td>
					<td>1737</td>
                   <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-09-01</td>
					<td>1801</td>
                    <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-10-01</td>
					<td>1866</td>
                    <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-11-01</td>
					<td>1923</td>
                   <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
				<tr>
                    <td>2023-12-01</td>
					<td>1978</td>
                    <td><button onclick="consultarFactura('factura_003.pdf')">Consultar</button></td>
                </tr>
            </tbody>
        </table>
        <div id="factura-consulta" style="display: none;">
            <h3>Factura Consultada</h3>
            <iframe id="factura-iframe" width="100%" height="500" frameborder="0"></iframe>
        
    </section>
</div>
</div>
</div>
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


   
    <!-- /.content -->
 
  <!-- /.content-wrapper -->