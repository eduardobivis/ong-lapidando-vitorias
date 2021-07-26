$(function(){

    //Validação Criar
    $("#create").validate({
        rules: {
            name: { required: true },
            email: { required: true, email: true  },
            password: { required: true }
        },
        messages: {
            name: "O campo Nome é obrigatório",
            email: {
                required: "O campo Email é obrigatório", 
                email: "Insira um Email válido;"
            },
            password: {
                required: "O campo Senha é obrigatório"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});