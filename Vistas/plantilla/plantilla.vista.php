<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EMEESA-GES</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./assets/temas/adminlte/plugins/fontawesome-free/css/all.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./assets/temas/adminlte/dist/css/adminlte.min.css">
    </head>

    <body class="hold-transition sidebar-mini">
        
    <!-- Site wrapper -->
        <div class="wrapper">
            <?php
            

            include "encabezado.vista.php";

            include "menu.vista.php";

            

           
            $rutas = new RutasControlador();
            $rutas -> Rutas();
            
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
       
    </body>
</html>