<?php
    session_start();
    include_once("conexao.php");
    $id = $_GET['id'];

    //DELETE foto do produto
    $sql = "DELETE FROM fotos_produtos WHERE produtos_id = $id;";
    if($result = mysqli_query($conn, $sql)){
        $_SESSION['msg'] = "Excluiu";
    }else{
        $_SESSION['msg'] = "Não Excluiu";
    }

    //DELETE produto
    $sql = "DELETE FROM produtos WHERE id = $id;";
    if($result = mysqli_query($conn,$sql)){
        $_SESSION['msg2'] = "Excluiu";
    }else{
        $_SESSION['msg2'] = "Não Excluiu";
    }

    if($_SESSION['msg'] == $_SESSION['msg2']){
        $_SESSION['msg'] = "Excluiu";
    }else{
        $_SESSION['msg'] = "Não Excluiu";
    }
    
    header("Location: ../adm_produtos.php");
?>