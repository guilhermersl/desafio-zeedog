//MONTA FORMATAÇÃO DA TABELA USANDO O PLUGIN DATATABLE

$(document).ready( function(){
    /*
    $('table.Repositorios').DataTable( {
        paging: true,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json" },
        "order": [[ 0, "desc" ]], //PELO ID
        "lengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
        "pagingType": "full_numbers",
        "buttons": [ 'copy', 'excel' ],
        "dom": '<"top"rlf>t<"bottom"Bip>'
    } );
    */

    var currentPage = $('#currentPage').html();
    if ( currentPage <= 1){
        $('#preview').hide(true);
    }else{
        $('#preview').show(true);
    }

});

