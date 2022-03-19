$(document).ready(function(){
    $("#loading").hide();
    $("#alert").hide();

    $("#compraProduto").submit(function(){
        var dados = jQuery( this ).serialize();
        $.ajax({
            url: 'php/compras.php',
            cache: false,
            data: dados,
            type: "POST",

            success: function(msg){
                if(msg == "Enviou"){
                    $("#alert").removeClass('alert-danger');
                    $("#alert").addClass('alert-success');
                    $("#msg_texto").html('Compra realizada com sucesso!');

                    setTimeout(function(){
                        $(location).attr('href','index.php');
                    }, 7000);
                    
                }else if(msg == "Não enviou"){
                    $("#alert").removeClass('alert-success');
                    $("#alert").addClass('alert-danger');
                    $("#msg_texto").html('Compra não realizada! Tente Novamente desativando seu antivírus.');

                }else{
                    $("#alert").removeClass('alert-success');
                    $("#alert").addClass('alert-danger');
                    $("#msg_texto").html('Compra não realizada!');
                }
            }
        });

        $("#loading").show(300);
        setTimeout(function(){
            $("#loading").hide(700);
        }, 3000);

        setTimeout(function(){
            $("#alert").show(300);
        }, 3000);

        setTimeout(function(){
            $("#alert").hide(300);
        }, 7000);
        
        return false;
    });

})