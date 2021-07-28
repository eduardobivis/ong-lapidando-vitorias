$(function(){

    //Máscara Data e Horário
    $(".data").mask('00/00/0000');

    $.fn.datepicker.dates['pt-BR'] = {
        days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
        daysMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
        months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        today: "Hoje"
    };

    //Data
    $('.data').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: true,
        language: "pt-BR",
        autoclose: true
    });

    //Validação Criar
    $("#create").validate({
        rules: {
            data: { required: true, dateBR: true },
            observacao: { maxlength: 200 },
        },
        messages: {
            data: {
                required: "O campo Data é obrigatório",
                dateBR: "Data Inválida"
            },
            observacao: "O campo Observação não pode conter mais de 200 caracteres"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});