<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMEESA-GES</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/temas/adminlte/plugins/fontawesome-free/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/temas/adminlte/dist/css/adminlte.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="./assets/temas/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="./assets/temas/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/temas/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">




</head>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <?php


        include "encabezado.vista.php";

        include "menu.vista.php";




        $rutas = new RutasControlador();
        $rutas->Rutas();

        //include "./vistas/Dashboard/dashboard.vista.php";
        


        ?>

        <?php
        include "piepagina.vista.php";
        ?>


    </div>
    <!-- Site wrapper -->


    <!-- jQuery -->
    <script src="./assets/temas/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./assets/temas/adminlte/plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/temas/adminlte/dist/js/adminlte.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="./assets/temas/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!--  propio del template y nuestra aplicación -->
    <script src="./assets/js/plantilla.js"></script>




</body>

</html>