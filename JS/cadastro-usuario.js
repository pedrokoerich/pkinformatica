$(document).ready(function(){
    $("#alert").hide();
    $("#loading").hide();
    $("#iCEP").blur(function(){
        // Remove tudo o que não é número para fazer a pesquisa
        var cep = this.value.replace(/[^0-9]/, "");
        
        // Validação do CEP; caso o CEP não possua 8 números, então cancela a consulta
        if(cep.length != 8){
            return false;
        }
        
        //URL de pesquisa 
        var url = "https://viacep.com.br/ws/"+cep+"/json/";
        
        // Faz a pesquisa do CEP e valida o mesmo
        $.getJSON(url, function(dadosRetorno){
            try{
                // Preenche os campos de acordo com o retorno da pesquisa
                $("#iRua").val(dadosRetorno.logradouro);
                $("#iBairro").val(dadosRetorno.bairro);
                $("#iCidade").val(dadosRetorno.localidade);
                $("#iEstado").val(dadosRetorno.uf);
                $("#iNro_rua").val(dadosRetorno.num);
            }catch(ex){
                
            }
        });
    });

    $("#cadastroUsuario").submit(function(){
        if(($("#iSenhaNova").val()) == ($("#iConfirma_senha").val())){
            var dados = jQuery( this ).serialize();
            $.ajax({
                url: 'php/salvarUsuario.php',
                cache: false,
                data: dados,
                type: "POST",

                success: function(msg){
                    if(msg == "Cadastrou"){
                        $("#alert").removeClass('alert-danger');
                        $("#alert").addClass('alert-success');
                        $("#msg_texto").html('Cadastro realizado com sucesso!');
                    
                        setTimeout(function(){
                            $(location).attr('href','adm_usuarios.php');
                        }, 6000);

                    }else if(msg == "ERRO_email"){
                        $("#alert").removeClass('alert-success');
                        $("#alert").addClass('alert-danger');
                        $("#msg_texto").html('Email já cadastrado!');

                    }else if(msg == "ERRO_usuario"){
                        $("#alert").removeClass('alert-success');
                        $("#alert").addClass('alert-danger');
                        $("#msg_texto").html('Nome de Usuário já cadastrado!');

                    }else{
                        alert(msg);
                        $("#alert").removeClass('alert-success');
                        $("#alert").addClass('alert-danger');
                        $("#msg_texto").html('Cadastro não realizado!');
                    }
                }
            });
        }else{
            $("#alert").removeClass('alert-success');
            $("#alert").addClass('alert-danger');
            $("#msg_texto").html('Confirmação de senha inválida');
        }
        
        $("#loading").show(300);
        setTimeout(function(){
            $("#loading").hide(700);
        }, 2000);

        setTimeout(function(){
            $("#alert").show(300);
        }, 2000);

        setTimeout(function(){
            $("#alert").hide(300);
        }, 5000);
      
        return false;
    }); 
});