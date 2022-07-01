<?php
    session_start();
    if($_SESSION['login'] != true || $_SESSION['tipo_usuario'] != 1){
        header("Location: index.php");
    }

    include_once("php/conexao.php");
    $id = $_GET['id'];
    $produto = "SELECT * FROM produtos WHERE id = $id";
    $lista = mysqli_query($conn, $produto);

    while($row_produto = mysqli_fetch_assoc($lista)){
        $id = $row_produto['id'];
        $nome = $row_produto['nome'];
        $categoria = $row_produto['categorias_id'];
        $valor = $row_produto['valor'];
        $modelo = $row_produto['modelo'];
        $marca = $row_produto['marca'];
        $descricao = $row_produto['descricao'];
    }

    $img = "SELECT * FROM fotos_produtos WHERE produtos_id = $id;";
    $lista_img = mysqli_query($conn, $img);

    $i = 0;
    while($row_img = mysqli_fetch_assoc($lista_img)){
        $i = $i + 1;
        $foto_produto[$i] = $row_img['descricao'];
        $id_foto[$i] = $row_img['id'];
    }

    if(!isset($id_foto[1])){
        $id_foto[1] = "";
        $_SESSION['id_img1'] = $id_foto[1];
    }else{
        $_SESSION['id_img1'] = $id_foto[1];
    }

    if(!isset($id_foto[2])){
        $id_foto[2] = "";
        $_SESSION['id_img2'] = $id_foto[2];
    }else{
        $_SESSION['id_img2'] = $id_foto[2];
    }
    
    if(!isset($id_foto[3])){
        $id_foto[3] = "";
        $_SESSION['id_img3'] = $id_foto[3];
    }else{
        $_SESSION['id_img3'] = $id_foto[3];
    }
?>

<!DOCTYPE HTML>
<html lang='pt-br'>
    <head>
        <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
        <title>PK Informática - Administrador </title>
        
        <!--SCRIPTS-->
        <script src="estilo/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="JS/adm.js"></script>
        <script src="estilo/js/bootstrap.min.js" type="text/javascript"></script>
        
        <!--FORMATAÇÕES-->
        <meta charset="utf-8">
        <link href="estilo/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="CSS/alteraProduto.css" rel="stylesheet">
    </head>

    <body background="img/Background.jpg" class="bg img-fluid"> <!--Background de fundo-->
        <!--Corpo-->
        <div class="container">
            <main class="corpo">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 logo"><a href="index.php"><img src="img/logo.png" width="120px"></a></div><!--Logo-->
                <!--Formulário de Alteração das Informações-->
                <form method="POST" action="php/alteraProduto.php?id=<?php echo $id ?>" id="alteraProduto" class="col-lg-12 col-md-12 col-sm-12 col-12" enctype="multipart/form-data">
                    <div class="quebra_linha"></div>
                    <h2 class="modal-title">Alteração de Produto</h2><br>
                    <div class="form-group">
                        <label for="iNome" class="col-form-label">Nome do Produto:</label>
                        <input value='<?php echo $nome?>' type="text" class="form-control" id="iNome" name="nNome" placeholder="Digite o nome do produto" maxlength="80" required> <!--Nome-->
                    </div>
                    <label for="iCategoria" class="col-form-label">Categoria:</label>
                    <select class="custom-select" id="iCategoria" name="nCategoria" required> <!--Categoria-->
                        <!--Validação pra verificar qual categoria trazer pré-selecionada-->
                        <?php if($categoria == 1){ ?>
                            <option selected value="1">Hardwares</option>
                            <option value="2">Periféricos</option>
                            <option value="3">Cadeiras</option>
                            <option value="4">Monitores</option>

                        <?php }else if($categoria == 2){ ?>
                            <option value="1">Hardwares</option>
                            <option selected value="2">Periféricos</option>
                            <option value="3">Cadeiras</option>
                            <option value="4">Monitores</option>

                        <?php }else if($categoria == 3){ ?>
                            <option value="1">Hardwares</option>
                            <option value="2">Periféricos</option>
                            <option selected value="3">Cadeiras</option>
                            <option value="4">Monitores</option>

                        <?php }else{ ?>
                            <option value="1">Hardwares</option>
                            <option value="2">Periféricos</option>
                            <option value="3">Cadeiras</option>
                            <option selected value="4">Monitores</option>
                        <?php } ?>
                    </select>
                    <div class="form-group">
                        <label for="iValor" class="col-form-label">Valor:</label>
                        <input value=<?php echo $valor ?> type="number" step="0.01" min="1" max="50000" class="form-control" id="iValor" name="nValor" placeholder="R$ 0,00" required> <!--Valor-->
                    </div>
                    <div class="form-group">
                        <label for="iModelo" class="col-form-label">Modelo:</label>
                        <input value='<?php echo $modelo ?>' type="text" class="form-control" id="iModelo" name="nModelo" placeholder="Modelo do Produto" required> <!--Modelo-->
                    </div>
                    <div class="form-group">
                        <label for="iMarca" class="col-form-label">Marca:</label>
                        <input value='<?php echo $marca ?>' type="text" class="form-control" id="iMarca" name="nMarca" placeholder="Marca do Produto" required> <!--Marca-->
                    </div>
                    <div class="form-group">
                        <label for="iDescricao" class="col-form-label">Descrição:</label>
                        <textarea class="form-control" id="iDescricao" name="nDescricao" placeholder="Descrição do Produto" required><?php echo $descricao ?></textarea> <!--Descrição-->
                    </div>
                    <!--Fotos do Produto-->
                    <!--Foto 1-->
                    <label class="col-form-label">Fotos do Produto</label><br>
                    <?php if(!isset($foto_produto[1]) || $foto_produto[1] == ""){ ?>
                        <label for="iFoto" class="col-form-label">
                            <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Principal">
                                <svg id='img1' xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                    <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                                </svg>
                                <img id="previewImg" style="width: 80px; height: 80px;">
                            </div>
                        </label>
                        <input type="file"  id="iFoto" class="inputFoto" name="nFoto" accept=".png">
                    <?php }else{ ?>
                        <label for="iFoto" class="col-form-label">
                            <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Principal">
                                <img src='<?php echo $foto_produto[1] ?>' id="img1" style="width: 80px; height: 80px;">
                                <img id="previewImg" style="width: 80px; height: 80px;">
                            </div>
                        </label>
                        <input type="file"  id="iFoto" class="inputFoto" name="nFoto" accept=".png">
                    <?php } ?>
                    <!--Foto 2-->
                    <?php if(!isset($foto_produto[2]) || $foto_produto[2] == ""){ ?>
                        <label for="iFoto2" class="col-form-label">
                            <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Secundária">
                                <svg id='img2' xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                    <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                                </svg>
                                <img id="previewImg2" style="width: 80px; height: 80px;">
                            </div>
                        </label>
                        <input type="file" id="iFoto2" class="inputFoto" name="nFoto2" accept=".png">
                    <?php }else{ ?>
                        <label for="iFoto2" class="col-form-label">
                            <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Secundária">
                                <img src='<?php echo $foto_produto[2] ?>' id="img2" style="width: 80px; height: 80px;">
                                <img id="previewImg2" style="width: 80px; height: 80px;">
                            </div>
                        </label>
                        <input type="file" id="iFoto2" class="inputFoto" name="nFoto2" accept=".png">
                    <?php } ?>
                    <!--Foto 3-->
                    <?php if(!isset($foto_produto[3]) || $foto_produto[3] == ""){ ?>
                        <label for="iFoto3" class="col-form-label">
                            <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Secundária">
                                <svg id='img3' xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                    <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                                </svg>
                                <img id="previewImg3" style="width: 80px; height: 80px;">
                            </div>
                        </label>
                        <input type="file"  id="iFoto3" class="inputFoto" name="nFoto3" accept=".png">
                    <?php } else{ ?>
                        <label for="iFoto3" class="col-form-label">
                            <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Secundária">
                                <img src='<?php echo $foto_produto[3] ?>' id="img3" style="width: 80px; height: 80px;">
                                <img id="previewImg3" style="width: 80px; height: 80px;">
                            </div>
                        </label>
                        <input type="file"  id="iFoto3" class="inputFoto" name="nFoto3" accept=".png">
                    <?php } ?>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button> <!--Enviar-->
                    </div>
                </form>
            </main>
        </div>
        <!--Rodapé-->
        <footer>
            <div class="fixed row7">
                <div class="col-lg-2 col-md-2 col-sm-2 col-2 logo"><a href="index.php"><img src="img/logo.png" width="80px"></a></div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-8 registro">
                    <p>PK INFORMÁTICA® | CNPJ: 00.000.000/0000-00<br>
                        Copyright © 2021 - PK Informática - Todos os direitos reservados</p>
                </div>
                <div class=" col-lg-1 col-md-1 col-sm-1 col-2 volta_topo">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="35" height="30" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
                            <path style="color: white;" d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z"/>
                        </svg> 
                    </a>
                </div>
            </div>
        </footer>
    </body>
</html>