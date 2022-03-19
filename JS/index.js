$(document).ready(function(){
    $("#alert").hide();
    $("#loading").hide();
    $("#iContato").submit(function(){
        var dados = jQuery( this ).serialize();
        $.ajax({
            url: 'php/contato.php',
            cache: false,
            data: dados,
            type: "POST",

            success: function(msg){
                if(msg == "Enviou"){
                    $("#alert").removeClass('alert-danger');
                    $("#alert").addClass('alert-success');
                    $("#msg_texto").html('Email enviado com sucesso!');
                    $("#msg_texto2").html('Vamos analisar sua dúvida, obrigado pelo contato.');
                    

                }else{
                    $("#alert").removeClass('alert-success');
                    $("#alert").addClass('alert-danger');
                    $("#msg_texto").html('Email não enviado!');
                    $("#msg_texto2").html('Tente novamente desativando seu antivírus.');
                    
                }
            }
        });

        $("#loading").show(300);
        setTimeout(function(){
            $("#loading").hide(700);
        }, 5000);

        setTimeout(function(){
            $("#alert").show(300);
        }, 5000);

        setTimeout(function(){
            $("#alert").hide(300);
        }, 10000);
        
        return false;
    });

    $("#login").submit(function() {
        var dados = jQuery( this ).serialize();
        $.ajax({
            url: 'php/login.php',
            cache: false,
            data: dados,
            type: "POST",

            success: function(msg){
                if(msg == "Logou"){
                    $("#exampleModalLabel").html("Logado");
                    $('#msg_login').modal('show');

                }else{
                    $("#exampleModalLabel").html(msg);
                    $('#msg_login').modal('show');
                }
            }
        });

        return false;
    })
});