$(document).ready(function(){
    $("#loading").hide();
    $("#alert").hide();
    $("#previewImg").hide();
    $("#previewImg2").hide();
    $("#previewImg3").hide();

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

    $('#iFoto').change(function(){
        const file = $(this)[0].files[0]
        const fileReader = new FileReader()
        fileReader.onloadend = function(){
            $('#previewImg').attr('src', fileReader.result)
        }
        $("#img1").hide();
        $("#previewImg").show();
        fileReader.readAsDataURL(file)
    })
    $('#iFoto2').change(function() {
        const file = $(this)[0].files[0]
        const fileReader = new FileReader()
        fileReader.onloadend = function(){
            $('#previewImg2').attr('src', fileReader.result)
        }
        $("#img2").hide();
        $("#previewImg2").show();
        fileReader.readAsDataURL(file)
    })
    $('#iFoto3').change(function() {
        const file = $(this)[0].files[0]
        const fileReader = new FileReader()
        fileReader.onloadend = function(){
            $('#previewImg3').attr('src', fileReader.result)
        }
        $("#img3").hide();
        $("#previewImg3").show();
        fileReader.readAsDataURL(file)
    })

    $("#alteraUsuario").submit(function(){
        if($("#iSenha").val() == $("#iConfirma_senha").val()){
            var dados = jQuery( this ).serialize();
            $.ajax({
                url: 'php/alteraUsuario.php',
                cache: false,
                data: dados,
                type: "POST",

                success: function(msg){
                    if(msg == "Alterou"){
                        $("#alert").removeClass('alert-danger');
                        $("#alert").addClass('alert-success');
                        $("#msg_texto").html('Alterações realizadas!');
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
                        $("#alert").removeClass('alert-success');
                        $("#alert").addClass('alert-danger');
                        $("#msg_texto").html('Alteração não realizada!');
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