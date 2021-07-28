$(function(){

    //Máscara Data e Horário
    $(".data").mask('00/00/0000');
    $(".horario").mask('00:00', {reverse: true});

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
    $("#edit").validate({
        rules: {
            data: { required: true, dateBR: true },
            horario: { required: true, time: true },
            justificativa: { maxlength: 200 },
        },
        messages: {
            data: {
                required: "O campo Data é obrigatório",
                dateBR: "Data Inválida"
            },
            horario: {
                required: "O campo Horário é obrigatório",
                time: "Horário Inválido"
            },
            justificativa: "O campo Justificativa não pode conter mais de 200 caracteres"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});