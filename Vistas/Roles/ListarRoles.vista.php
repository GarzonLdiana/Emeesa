<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <!-- ... -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Roles de Usuario</h3>
            </div>
            <div class="card-body">
                <!-- Table to display roles -->
                
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
                            <th>ID</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Role data -->
                        <tr>
                            <td>1</td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="viewRole(1)">Ver</button>
                                <button class="btn btn-warning btn-sm" onclick="editRole(1)">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Supervisor</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="viewRole(2)">Ver</button>
                                <button class="btn btn-warning btn-sm" onclick="editRole(2)">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Usuario Estándar</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="viewRole(3)">Ver</button>
                                <button class="btn btn-warning btn-sm" onclick="editRole(3)">Editar</button>
                            </td>
                        </tr>
                        <!-- More role data -->
                        <tr>
                            <td>4</td>
                            <td>Editor</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="viewRole(4)">Ver</button>
                                <button class="btn btn-warning btn-sm" onclick="editRole(4)">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Invitado</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="viewRole(5)">Ver</button>
                                <button class="btn btn-warning btn-sm" onclick="editRole(5)">Editar</button>
                            </td>
                        </tr>
                        <!-- Add more role data here -->
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    <!-- Script section -->
    <script>
        function viewRole(roleId) {
            console.log(`View role ${roleId}`);
            // Implement logic to view role details based on ID
        }

        function editRole(roleId) {
            console.log(`Edit role ${roleId}`);
            // Implement logic to edit role details based on ID
        }
    </script>

</div>