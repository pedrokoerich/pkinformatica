<?php
    session_start();
    include_once("conexao.php");

    $nome               = $_POST["nNome"];                      
    $categoria          = $_POST["nCategoria"];
    $valor              = $_POST["nValor"];
    $modelo             = $_POST["nModelo"];
    $marca              = $_POST["nMarca"];
    $descricao          = $_POST["nDescricao"];

    //Buscando o ultimo ID de Produto registrado no banco
    $ultimoId = "SELECT max(id) FROM produtos";
    $result = mysqli_query($conn,$ultimoId);
    $id = mysqli_fetch_assoc($result);
    $id = $id['max(id)'] + 1;

    //Inserindo o Produto ao Banco
    $sql = "INSERT INTO produtos (id, nome, descricao, categorias_id, valor, modelo, marca)
    VALUES ($id, '$nome', '$descricao', $categoria, $valor, '$modelo', '$marca')";

    $result = mysqli_query($conn,$sql);

    //Inserindo as Imagens do produto
    
    if($_FILES['nFoto']['tmp_name'] != "" && $_FILES['nFoto2']['tmp_name'] != ""){
        $nomeArq = $_FILES['nFoto']['name'];                                            //Nome do arquivo  
        $nomeArq2 = $_FILES['nFoto2']['name'];                                          //Nome do arquivo2

        if($_FILES['nFoto3']['tmp_name'] != ""){
            $nomeArq3 = $_FILES['nFoto3']['name'];                                      //Nome do arquivo3  
        }  
        
        if(is_dir('../img-produtos/')){
            //Existe
            $diretorio = '../img-produtos/';
        }else{
            //Criar pq não existe
            $diretorio = mkdir('../img-produtos/');
        }

        //Cria uma cópia do arquivo local na pasta do projeto
        move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio.$nomeArq);
        move_uploaded_file($_FILES['nFoto2']['tmp_name'], $diretorio.$nomeArq2);

        if($_FILES['nFoto3']['tmp_name'] != ""){
            move_uploaded_file($_FILES['nFoto3']['tmp_name'], $diretorio.$nomeArq3);
        }

        include("conexao.php");                                                         //Conexão com Banco
        
        /*----------------------IMAGEM 1-----------------------*/                                                         
        $dirImagem = 'img-produtos/'.$nomeArq;                                          //Caminho que será salvo no banco de dados

        //INSERT Imagem 1
        $insereImg = "INSERT INTO fotos_produtos (descricao, produtos_id)
        VALUES ('$dirImagem', $id)";

        //Validação de Cadastro
        if($result = mysqli_query($conn,$insereImg)){
            $_SESSION['msg'] = "Cadastrou";

        }else{
            $_SESSION['msg'] = "Não Cadastrou";
        }

        /*----------------------IMAGEM 2-----------------------*/
        $dirImagem2 = 'img-produtos/'.$nomeArq2;

        //INSERT Imagem 2
        $insereImg2 = "INSERT INTO fotos_produtos (descricao, produtos_id)
        VALUES ('$dirImagem2', $id)";

        if($result = mysqli_query($conn,$insereImg2)){
            $_SESSION['msg'] = "Cadastrou";

        }else{
            $_SESSION['msg'] = "Não Cadastrou";
        }

        /*--------------------IMAGEM 3 -------------------------*/
        if($nomeArq3 != ""){
            $dirImagem3 = 'img-produtos/'.$nomeArq3;

            //INSERT Imagem 3
            $insereImg3 = "INSERT INTO fotos_produtos (descricao, produtos_id)
            VALUES ('$dirImagem3', $id)";

            if($result = mysqli_query($conn,$insereImg3)){
                $_SESSION['msg'] = "Cadastrou";

            }else{
                $_SESSION['msg'] = "Não Cadastrou";
            }
        }
    }   

    mysqli_close($conn);
    header("Location: ../adm_produtos.php");
    
?>