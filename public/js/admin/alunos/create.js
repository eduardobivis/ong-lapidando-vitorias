$(function(){

    //Máscara CPF
    $(".cpf").mask('000.000.000-00', {reverse: true});
        
    //Máscara Tefelone e Celular
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    $( ".telefone" ).mask( '(00) 0000-0000' );
    $( ".celular" ).mask(SPMaskBehavior, spOptions);
    
    //Multi Select
    $( ".turmas" ).select2({ placeholder: "Turmas" });

    //Tooltip
    $( '.turma-hint' ).tooltip();

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
            nome: { required: true, maxlength: 100 },
            email: { required: true, email: true, maxlength: 100 },
            turma_id: { required: true },
            situacao_id: { required: true },
            telefone: { required: true, maxlength: 20 },
            celular: { required: true, maxlength: 20 },
            rg: { required: true, maxlength: 20 },
            cpf: { required: true, cpf: true, maxlength: 20 },
            observacao: { maxlength: 200 },
            rua: { required: true, maxlength: 100 },
            numero: { required: true, maxlength: 10 },
            bairro: { required: true, maxlength: 100 },
            cidade_id: { required: true },
            complemento: { maxlength: 200 },
            codigo_acesso: { required: true, maxlength: 200 },
            dia_pagamento: { required: true },
        },
        messages: {
            name: {
                required: "O campo Nome é obrigatório",
                maxlength: "O campo Nome não pode conter mais de 100 caracteres"
            },
            email: {
                required: "O campo Email é obrigatório", 
                email: "Insira um Email válido",
                maxlength: "O campo E-mail não pode conter mais de 100 caracteres"
            },
            turma_id: "O campo Turma é obrigatório",
            situacao_id: "O campo Situação é obrigatório",
            telefone: {
                required: "O campo Telefone é obrigatório",
                maxlength: "O campo Telefone não pode conter mais de 20 caracteres"
            },
            celular: {
                required: "O campo Celular é obrigatório",
                maxlength: "O campo Celular não pode conter mais de 20 caracteres"
            },
            rg: {
                required: "O campo RG é obrigatório",
                maxlength: "O campo RG não pode conter mais de 20 caracteres"
            },
            cpf: {
                required: "O campo CPF é obrigatório",
                maxlength: "O campo CPF não pode conter mais de 20 caracteres",
                cpf: "Informe um CPF válido"
            },
            observacao:  "O campo Observação não pode conter mais de 200 caracteres",
            rua: {
                required: "O campo Rua é obrigatório",
                maxlength: "O campo Rua não pode conter mais de 100 caracteres"
            },
            numero: {
                required: "O campo Número é obrigatório",
                maxlength: "O campo Número não pode conter mais de 100 caracteres"
            },
            bairro: {
                required: "O campo Bairro é obrigatório",
                maxlength: "O campo Bairro não pode conter mais de 100 caracteres"
            },
            cidade_id: "O campo Cidade é obrigatório",
            complemento:  "O campo Complemento não pode conter mais de 200 caracteres",
            codigo_acesso: {
                required: "O campo Código de Acesso é obrigatório",
                maxlength: "O campo Código de Acesso não pode conter mais de 200 caracteres"
            },
            dia_pagamento: "O campo Dia de Pagamento é obrigatório"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});