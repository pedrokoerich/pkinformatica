$(document).ready(function(){
    $("#alert").hide();
    $("#loading").hide();
    $("#iContato").submit(function(){
        var dados = jQuery( this ).serialize();
        $.ajax({
            url: 'php/contatoSuporte.php',
            cache: false,
            data: dados,
            type: "POST",

            success: function(msg){
                if(msg == "Enviou"){
                    $("#alert").removeClass('alert-danger');
                    $("#alert").addClass('alert-success');
                    $("#msg_texto").html('Email enviado com sucesso!');
                    $("#msg_texto2").html('Vamos analisar sua dúvida, obrigado pelo contato.');

                    setTimeout(function(){
                        $(location).attr('href','suporte.php');
                    }, 10300);
                    
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
});