$(function(){

    //Validação Editar
    $("#edit").validate({
        rules: {
            name: { required: true },
            email: { required: true, email: true  },
        },
        messages: {
            name: "O campo Nome é obrigatório",
            email: {
                required: "O campo Email é obrigatório", 
                email: "Insira um Email válido;"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});