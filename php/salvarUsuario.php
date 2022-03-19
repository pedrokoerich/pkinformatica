<?php
    session_start();

    $msg                = "";
    $nome               = $_POST["nNome"];
    $idade              = $_POST["nIdade"];
    $celular            = $_POST["nCelular"];
    $telefone           = $_POST["nTelefone"];
    $email              = $_POST["nEmail"];
    $cep                = $_POST["nCEP"];
    $estado             = $_POST["nEstado"];
    $cidade             = $_POST["nCidade"];
    $bairro             = $_POST["nBairro"];
    $rua                = $_POST["nRua"];
    $nro_rua            = $_POST["nNro_Rua"];
    $senha              = md5($_POST["nSenhaNova"]);
    $nome_usuario       = $_POST["nUsuarioNovo"];

    if($_SESSION['tipo_usuario'] == 1){
        $tipo_usuario   = $_POST['nTipo_usuario'];
    }else{
        $tipo_usuario   = 2;
    }
   
    include_once("conexao.php");

    $usuario = "SELECT * FROM usuarios";
    $lista = mysqli_query($conn, $usuario);

    while($row_usuario = mysqli_fetch_assoc($lista)){
        $valida_email          = $row_usuario['email'];
        $valida_usuario        = $row_usuario['nome_usuario'];
        if($email == $valida_email){
            $msg = "ERRO_email";
            echo $msg;
        }else if($nome_usuario == $valida_usuario){
            $msg = "ERRO_usuario";
            echo $msg;
        }
    }

    if($msg == ""){
        $sql = "INSERT INTO usuarios (nome, data_nascimento, telefone, celular, email, senha, estado, cidade, bairro, rua, num_rua, tipo_id, cep, nome_usuario) 
        VALUES ('$nome', '$idade', '$telefone', '$celular', '$email', '$senha', '$estado', '$cidade', '$bairro', '$rua', '$nro_rua' , $tipo_usuario, '$cep', '$nome_usuario')";

        if($result = mysqli_query($conn,$sql)){
            $msg = "Cadastrou";
            echo $msg;
            if($_SESSION['tipo_usuario'] != 1){
                $_SESSION['usuario']  =  $nome_usuario;
                $_SESSION['senha']    =  $senha;
                include_once("login.php");
            }
        }
    }

    mysqli_close($conn);
?>