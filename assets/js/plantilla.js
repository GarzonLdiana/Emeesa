/*=============================================
Data Table
=============================================*/

$(".datatable").DataTable({
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
  language: {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando desde _START_ hasta _END_ de _TOTAL_ Registros",
      "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
      "infoFiltered": "(Filtrado de _MAX_ total registros)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Registros",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "ordering": false,
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
      }
  },
}).buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
