$(function(){

    //Máscara Código e Data
    $(".aluno_id").mask('#');
    $(".data_inicio, .data_final").mask('00/00/0000')

    //Multi Select
    $( ".turmas" ).select2();
    
    //Passar Configuração para um Arquivo Global !
    $.fn.datepicker.dates['pt-BR'] = {
        days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
        daysMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
        months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        today: "Hoje"
    };

    //Datas
    $(".data_inicio, .data_final").datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: true,
        language: "pt-BR",
        autoclose: true
    });

    //ToolTip
    $( '.turma-hint' ).tooltip();

});