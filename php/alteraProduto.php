<?php
    session_start();
    include_once("conexao.php");

    $nome               = $_POST["nNome"];
    $categoria          = $_POST["nCategoria"];
    $valor              = $_POST["nValor"];
    $modelo             = $_POST["nModelo"];
    $marca              = $_POST["nMarca"];
    $descricao          = $_POST["nDescricao"];
    $id                 = $_GET['id'];
    $id_img1            = $_SESSION['id_img1'];
    $id_img2            = $_SESSION['id_img2'];
    $id_img3            = $_SESSION['id_img3'];

    $sql = "UPDATE produtos SET nome = '$nome', descricao = '$descricao', categorias_id = $categoria, valor = $valor, modelo = '$modelo', marca = '$marca' WHERE id = $id;";

    if($result = mysqli_query($conn,$sql)){
        $_SESSION['msg'] = "Alterou";
    }else{
        $_SESSION['msg'] = "Não Alterou";
    }

    if($_FILES['nFoto']['tmp_name'] != ""){
        $nomeArq = $_FILES['nFoto']['name'];                                                //Nome do arquivo  
    }

    if($_FILES['nFoto2']['tmp_name'] != ""){
        $nomeArq2 = $_FILES['nFoto2']['name'];                                              //Nome do arquivo2
    }                                                                                       

    if($_FILES['nFoto3']['tmp_name'] != ""){
        $nomeArq3 = $_FILES['nFoto3']['name'];                                              //Nome do arquivo3  
    }  
        
    if(is_dir('../img-produtos/')){
        //Existe
        $diretorio = '../img-produtos/';
    }else{
        //Criar pq não existe
        $diretorio = mkdir('../img-produtos/');
    }

    //Cria uma cópia do arquivo local na pasta do projeto
    if($_FILES['nFoto']['tmp_name'] != ""){
        move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio.$nomeArq);       
    }

    if($_FILES['nFoto2']['tmp_name'] != ""){
        move_uploaded_file($_FILES['nFoto2']['tmp_name'], $diretorio.$nomeArq2);      
    }

    if($_FILES['nFoto3']['tmp_name'] != ""){
        move_uploaded_file($_FILES['nFoto3']['tmp_name'], $diretorio.$nomeArq3);
    }

    include("conexao.php");

    /*----------------------IMAGEM 1-----------------------*/
    if($nomeArq != ""){                                                       
        $dirImagem = 'img-produtos/'.$nomeArq;                                          //Caminho que será salvo no banco de dados

        //UPDATE Imagem 1
        $insereImg = "UPDATE fotos_produtos SET descricao = '$dirImagem', produtos_id = $id WHERE id = $id_img1";

        if($result = mysqli_query($conn,$insereImg)){
            $_SESSION['msg1'] = "Alterou";
        }else{
            $_SESSION['msg1'] = "Não Alterou";
        }
        /*----------------------IMAGEM 2-----------------------*/
    }
    
    if($nomeArq2 != ""){
        $dirImagem2 = 'img-produtos/'.$nomeArq2;

        //UPDATE Imagem 2
        $insereImg2 = "UPDATE fotos_produtos SET descricao = '$dirImagem2', produtos_id = $id WHERE id = $id_img2";

        if($result = mysqli_query($conn,$insereImg2)){
            $_SESSION['msg2'] = "Alterou";
        }else{
            $_SESSION['msg2'] = "Não Alterou";
        }
        /*--------------------IMAGEM 3 -------------------------*/
    }
    
    if($nomeArq3 != ""){
        $dirImagem3 = 'img-produtos/'.$nomeArq3;

        //UPDATE Imagem 3
        $insereImg3 = "UPDATE fotos_produtos SET descricao = '$dirImagem3', produtos_id = $id WHERE id = $id_img3";

        if($result = mysqli_query($conn,$insereImg3)){
            $_SESSION['msg3'] = "Alterou";

        }else{
            $_SESSION['msg3'] = "Não Alterou";
        }

    }

    if($_SESSION['msg1'] == "Alterou" || $_SESSION['msg2'] == "Alterou" || $_SESSION['msg3'] == "Alterou"){
        $_SESSION['msg'] = "Alterou";
    }

    mysqli_close($conn);
    header("Location: ../adm_produtos.php");
?>