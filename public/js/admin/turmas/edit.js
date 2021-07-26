$(function(){

    //Máscara Horário
    $(".horario").mask('00:00', {reverse: true});

    //Validação Criar
    $(".edit-1, .edit-2, .edit-3").validate({
        rules: {
            horario_inicio: { required: true, time: true },
            horario_termino: { required: true, time: true }
        },
        messages: {
            horario_inicio: {
                required: "O campo Horário de Início é obrigatório",
                dateBR: "Horário Inválida"
            },
            horario_termino: {
                required: "O campo Horário de Término é obrigatório",
                time: "Horário Inválido"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});