<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="../../index3.html" class="brand-link">
    <img src="./assets/imagenes/emeesa1.png" alt="EMEESA Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Emeesa </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info text-center text-md-left">
        <a href="#" class="d-block">Generamos Futuro Con Energía</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <form class="form-inline" action="#" method="get">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar" type="submit">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </form>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
             
            <p>
               
               DASHBOARD
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           
        </li>       -->




        <li class="nav-item">
          <a href="#" class="nav-link">

            <p>
              <i class="nav-icon fas fa-file"></i>
              Facturas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?ruta=Facturas/Verfacturas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consultar </p>
              </a>
            </li>


          </ul>
        </li>



        <li class="nav-item">
          <a href="#" class="nav-link">

            <p>
              <i class="nav-icon fas fa-chart-pie"></i>
              Verificacion de Consumo
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?ruta=Consumos/Historial/historial" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Historial de Consumos </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?ruta=Consumos/Verificacion/verificacion" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Verificacion de Lecturas</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">

            <p>
              <i class="nav-icon fas fa-coins"></i>
              Financiamiento
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?ruta=Financiaciones/financiaciones" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Historial de Financiaciones </p>
              </a>
            </li>


          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">

            <p>
              <i class="nav-icon fas fa-table"></i>
              Tarifas Aplicadas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?ruta=Tarifas/tarifas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Historial de Tarifas </p>
              </a>
            </li>

          </ul>
        </li>


        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="index.php?ruta=Dashboard/dashboard" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Noticias y Novedades
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  PQRS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?ruta=PQRS/pqrs" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Información</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?ruta=PQRS/Consulta/Consulta" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Consultar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?ruta=PQRS/Ingreso/Ingreso" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ingreso</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Seguridad
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?ruta=Roles/ListarRoles" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?ruta=Roles/roles" class="nav-link">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Crear Rol</p>
                  </a>
                </li>
              </ul>
            </li>












          </ul>
          </li>





          <!-- /. Aqui pegar -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->



  </div>
  <!-- /.sidebar -->
</aside>