
var tableMain = $("#tableMain").DataTable({
    "paging": false,
    "deferRender": false,
    "lengthChange": false,
    "searching": false,
    "ordering": false,
    "info": true,
    "autoWidth": true,
    "responsive": true
});

var tableNoData = $("#tableNoData").DataTable({
    "processing": false,
    "paging": false,
    "deferRender": false,
    "lengthChange": false,
    "searching": false,
    "ordering": false,
    "info": false,
    "autoWidth": true,
    "responsive": true
});

var tableSimple = $("#tableSimple").DataTable({
    "processing": true,
    "paging": true,
    "deferRender": false,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "responsive": true,
    "pageLength": 25,

 //  "scrollX": true,
 //  "scrollY": 500,
 
     "language": {
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Visualizar _MENU_ entradas",
        "zeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún registro disponible en la tabla",
        "info": "Filas del _START_ al _END_ .Total de _TOTAL_ entradas",
        "infoEmpty": "Filas del 0 al 0 .Total de 0 entradas",
        "infoFiltered": "(filtrado .Total de _MAX_ entradas)",
        "sSearch": "Buscar:",
        "sInfoPostFix": "",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Leyendo ..",
        "sProcessing": "Procesando ..",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious": "Anterior"
         },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
     }
});
