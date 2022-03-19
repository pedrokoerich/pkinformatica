<?php
    error_reporting(0);                                                 //Oculta Mensagens de erro
    date_default_timezone_set('America/Sao_Paulo');                     //Configuração de Horário

    //Variáveis
    $nome               = utf8_encode($_POST['nNome']);                 //Nome do Usuário    
    $celular            = $_POST['nCelular'];                           //Celular do usuário
    $email              = $_POST["nEmail"];                             //Email do Usuário   
    $cep                = $_POST["nCEP"];                               //CEP do usuário
    $estado             = $_POST["nEstado"];                            //Estado 
    $cidade             = $_POST["nCidade"];                            //Cidade        
    $bairro             = $_POST["nBairro"];                            //Bairro
    $rua                = $_POST["nRua"];                               //Rua    
    $nro_rua            = $_POST["nNro_Rua"];                           //Número da Rua
    $produto            = utf8_encode($_POST['nNomeProduto']);          //Produto o qual o usuário necessita de suporte
    $valor              = $_POST["nValor"];                             //Valor do Produto
    $modelo             = $_POST["nModelo"];                            //Modelo do produto
    $marca              = $_POST["nMarca"];                             //Marca do produto
    $formaPagamento     = $_POST['nFormaPagamento'];                    //Forma de Pagamento
    $data_envio         = date('d/m/Y');                                //Data do envio
    $hora_envio         = date('H:i:s');                                //Hora do Envio

    //Configurações para envio
    require 'PHPMailer/PHPMailerAutoload.php';                          //Classe
    $mail = new PHPMailer;                                              //Cria uma nova instância
    $mail->isSMTP();                                                    //Tipo de envio
    $mail->SMTPDebug = false;                                           //Impressão de erros
    $mail->Host = "smtp.gmail.com";                                     //Host do Gmail
    $mail->SMTPSecure = "tls";                                          //Método de segurança do email
    $mail->SMTPAuth = true;                                             //Autentica o email
    $mail->Username = "pkinformaticati@gmail.com";                      //E-mail para autenticar
    $mail->Password = "Koerich080203";                                  //Senha do email para autenticar
    $mail->Port = 587;                                                  //Porta do Gmail
 
    //Configuração de Mensagem
    $mail->setFrom($mail->Username);                                    //E-mail do usuário o qual está enviando a mensagem de contato
    $mail->addAddress('pkinformaticati@gmail.com');                     //Endereço de email que irá receber o email
    $mail->IsHTML(true);                                                //Atribui o formato HTML no corpo do email
    $mail->Subject = "Compras - PK Informatica";                        //Assunto do email
 
    //Estrutura do corpo do E-mail
    $conteudo_email = "Novo pedido de <b>$nome</b> ($email):   
                        <br><br>
                        <b>Informações do Cliente</b><br>
                        <b>Nome:</b> $nome<br>
                        <b>Celular:</b> $celular<br>
                        <b>E-mail:</b> $email<br>
                        <b>CEP:</b> $cep<br>
                        <b>Estado:</b> $estado<br>
                        <b>Cidade:</b> $cidade<br>
                        <b>Bairro:</b> $bairro<br>
                        <b>Rua:</b> $rua <b>Número:</b> $nro_rua<br><br>       
                        <b>Produto Solicitado</b><br>
                        <b>Nome:</b> $produto<br>
                        <b>Marca:</b> $marca <br>
                        <b>Modelo:</b> $modelo<br><br>
                        <b>Valor:</b> R$ $valor<br>
                        <b>Forma de Pagamento:</b> $formaPagamento
                        <br><br> 
                        Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b>";
                         
    $mail->addReplyTo($email);                                          //Responder para
    $mail->Body = $conteudo_email;                                      //E-mail recebe a estrutura
 
    //Validação de Envio 
    if($mail->send()){
        $msg = "Enviou";
        echo $msg;
    }else{
        $msg = "Não enviou";
        echo $msg;
    }

?>