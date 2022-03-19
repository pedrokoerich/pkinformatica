<?php
    session_start();
    include_once("conexao.php");
    $id = $_GET["id"];

    //Validando qual o tipo de usuário está sendo excluído
    $sql = "SELECT tipo_id FROM usuarios WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    while($row_usuario = mysqli_fetch_assoc($result)){
        $tipo_id = $row_usuario['tipo_id'];
    }

    $sql = "SELECT * FROM usuarios WHERE tipo_id = 1";
    $result = mysqli_query($conn, $sql);
    $total_usuarios = mysqli_num_rows($result);

    //Se não for o ultimo adm exclui
    if($total_usuarios != 1 || $tipo_id = 2){
        $sql = "DELETE FROM usuarios WHERE id = $id";

        if($result = mysqli_query($conn,$sql)){
        $_SESSION['msg'] = "Excluiu";
        }else{
            $_SESSION['msg'] = "Não Excluiu";
        }
    //Se for, não exclui
    }else{
        $_SESSION['msg'] = "ultimoAdm";
    }
    
    header("Location: ../adm_usuarios.php");
?>