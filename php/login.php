<?php
    if(session_status() !==  PHP_SESSION_ACTIVE){
        session_start();
    }

    include_once("conexao.php");

    if((isset($_POST['nUsuario'])) && (isset($_POST['nSenha']))){
        $usuario = $_POST['nUsuario'];
        $senha   = md5($_POST['nSenha']);

        $sql = "SELECT tipo_id, id FROM usuarios WHERE nome_usuario = '$usuario' AND senha = '$senha';";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);


        //Adm
        if((isset($resultado)) && ($resultado['tipo_id'] == 1 )){
            $_SESSION['tipo_usuario'] = $resultado['tipo_id'];
            $_SESSION['username'] = $usuario;
            $_SESSION['login'] = true; 
            $_SESSION['idUsuario'] = $resultado['id'];
            header("Location: ../adm.php");
        //Comum
        }else if((isset($resultado)) && ($resultado['tipo_id'] == 2)){
            $_SESSION['tipo_usuario'] = $resultado['tipo_id'];
            $_SESSION['username'] = $usuario;
            $_SESSION['idUsuario'] = $resultado['id'];
            $_SESSION['login'] = true; 
            header("Location: ../index.php");

        }else if(empty($resultado)){
            $_SESSION['erroLogin'] = "Usuário ou senha inválido";
            header("Location: ../index.php");

        }else{
            $_SESSION['erroLogin'] = "Usuário ou senha inválido";
            header("Location: ../index.php");
        }

    }else if((isset($_SESSION['usuario'])) && (isset($_SESSION['senha'])) && ($_SESSION['usuario'] != "") && ($_SESSION['senha'] != "")){
        $usuario = $_SESSION['usuario'];
        $senha   = $_SESSION['senha'];

        $sql = "SELECT tipo_id, id FROM usuarios WHERE nome_usuario = '$usuario' AND senha = '$senha';";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);

        //Comum
        if((isset($resultado)) && ($resultado['tipo_id'] == 2)){
            $_SESSION['tipo_usuario'] = $resultado['tipo_id'];
            $_SESSION['username'] = $usuario;
            $_SESSION['idUsuario'] = $resultado['id'];
            $_SESSION['login'] = true; 

        }else if(empty($resultado)){
            $_SESSION['erroLogin'] = "Usuário ou senha inválido";
            header("Location: ../index.php");

        }else{
            $_SESSION['erroLogin'] = "Usuário ou senha inválido";
            header("Location: ../index.php");
        }
        
    }else{
        $_SESSION['erroLogin'] = "Usuário ou senha inválido";
        header("Location: ../index.php");
    }

?>