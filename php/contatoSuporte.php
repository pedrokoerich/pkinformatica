<?php
    error_reporting(0);                                                 //Oculta Mensagens de erro
    date_default_timezone_set('America/Sao_Paulo');                     //Configuração de Horário
    
    //Variáveis
    $nome               = utf8_encode($_POST['nNome']);                 //Nome do Usuário     
    $email              = utf8_encode($_POST['nEmail_suporte']);        //Email do Usuário
    $produto            = utf8_encode($_POST['nProduto']);              //Produto o qual o usuário necessita de suporte
    $mensagem           = $_POST['nMsg'];                               //Mensagem do usuário
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
	$mail->Subject = "Suporte - PK Informatica";                        //Assunto do email

    //Estrutura do corpo do E-mail
    $conteudo_email = "Você recebeu uma mensagem de suporte de <b>$nome</b> ($email):   
                        <br><br> 
                        <b>Produto:</b> $produto 
                        <br><br> 
                        <b>Mensagem:</b>
                        <br> 
                        $mensagem 
                        <br><br> 
                        Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio<b>";
                        
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