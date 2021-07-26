/* Funcionalidades Gerais do Sistema, podem ser usadas em Qualquer página */

    
$( window ).on("load", function() {
    
    //Data Table
    $('table.display').DataTable({
        
        //Tradução
        language: {
            sEmptyTable: "Nenhum registro encontrado",
            sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered: "(Filtrados de _MAX_ registros)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "Carregando...",
            sProcessing: "Processando...",
            sZeroRecords: "Nenhum registro encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            },
            select: {
                rows: {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        }
    });

    //Sweet Alerts - Confirmação ao Deletar
    $(".form-deletar").on("submit", function(){
        
        var texto = "";
        switch($('meta[name=modulo]').attr("content")) {
            default:
                texto = "Você não poderá reverter essa ação.";
        }

        event.preventDefault();
        Swal.fire({
            title: 'Tem certeza disso?',
            text: texto,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.value) {
                $(this).unbind('submit').submit();
            }
        })
    });

    //Botão Voltar
    document.querySelector('.voltar').addEventListener( 'click', () => { window.history.back(); });

});
