<?php
    session_start();

    //Variáveis
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
    $senha              = md5($_POST["nSenha"]);
    $nome_usuario       = $_POST["nUsuario"];
    $id                 = $_SESSION['id'];

    //Verifica tipo de usuário
    if($_SESSION['tipo_usuario'] == 1){
        $tipo_usuario   = $_POST['nTipo_usuario'];
    }else{
        $tipo_usuario   = 2;
    }
    
    include_once("conexao.php");

    //SELECT
    $usuario = "SELECT * FROM usuarios WHERE id != $id";
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

    //UPDATE
    if($msg == ""){
        $sql = "UPDATE usuarios 
                SET nome = '$nome', data_nascimento = '$idade', celular = '$celular', telefone = '$telefone', email = '$email', cep = '$cep', estado = '$estado', cidade = '$cidade', bairro = '$bairro', rua = '$rua', num_rua = $nro_rua, senha = '$senha', nome_usuario = '$nome_usuario', tipo_id = $tipo_usuario WHERE id = $id;";

        if($result = mysqli_query($conn,$sql)){
            $msg = "Alterou";
            echo $msg;
        }
    }

    mysqli_close($conn);
?>