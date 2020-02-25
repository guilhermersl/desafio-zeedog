//MONTA FORMATAÇÃO DA TABELA USANDO O PLUGIN DATATABLE

$(document).ready( function(){
    var currentPage = $('#currentPage').html();
    if ( currentPage <= 1){
        $('#preview').hide(true);
    }else{
        $('#preview').show(true);
    }

});

