<?php
    session_start();
    if($_SESSION['login'] != true || $_SESSION['tipo_usuario'] != 1){
        header("Location: index.php");
    }

    if(!isset($_SESSION['msg'])){
        $_SESSION['msg'] = "";

    }

?>

<!DOCTYPE HTML>
<html>
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
        <link href="CSS/adm_produtos.css" rel="stylesheet">
    </head>

    <body background="img/Background.jpg" class="bg img-fluid"> <!--Background de fundo-->
        <!--Corpo-->
        <div class="container">
            <main class="corpo">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 logo"><a href="index.php"><img src="img/logo.png" width="120px"></a></div> <!--Logo-->
                <div class="row2">
                    <!--Aba de Pesquisa de Produtos-->
                    <form id="pesquisaProduto" method="GET" action="produtosPesquisados.php" class="pesquisa">
                        <input placeholder="Pesquisar produto" type="text" name="nPesquisar">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: white;" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>
                </div> 
                <!--Botão Cadastrar Produto-->
                <button type="button" class="botao_produtos" data-toggle='modal' data-target='#modalAdd'>Cadastrar Produto
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                </button>
                <!--Formulário de Cadastro de Produto-->
                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAdd">Cadastro de Produto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="insereProduto" method="POST" action="php/salvarProduto.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="iNome" class="col-form-label">Nome do Produto:</label>
                                        <input type="text" class="form-control" id="iNome" name="nNome" required> <!--Nome-->
                                    </div>
                                    <label for="iCategoria" class="col-form-label">Categoria:</label>
                                    <select class="custom-select" id="iCategoria" name="nCategoria" required> <!--Categoria-->
                                        <option selected>Selecione a categoria do produto...</option>
                                        <option value="1">Hardwares</option>
                                        <option value="2">Periféricos</option>
                                        <option value="3">Cadeiras</option>
                                        <option value="4">Monitores</option>
                                    </select>
                                    <div class="form-group">
                                        <label for="iValor" class="col-form-label">Valor:</label>
                                        <input type="number" step="0.01" min="1" max="50000" class="form-control" id="iValor" name="nValor" required> <!--Valor-->
                                    </div>
                                    <div class="form-group">
                                        <label for="iModelo" class="col-form-label">Modelo:</label> 
                                        <input type="text" class="form-control" id="iModelo" name="nModelo" required> <!--Modelo-->
                                    </div>
                                    <div class="form-group">
                                        <label for="iMarca" class="col-form-label">Marca:</label>
                                        <input type="text" class="form-control" id="iMarca" name="nMarca" required> <!--Marca-->
                                    </div>
                                    <div class="form-group">
                                        <label for="iDescricao" class="col-form-label">Descrição:</label>
                                        <textarea class="form-control" id="iDescricao" name="nDescricao" required></textarea> <!--Descrição-->
                                    </div>
                                    <!--Inserção de Fotos-->
                                    <!--Foto 1-->
                                    <label class="col-form-label">Fotos do Produto</label><br>
                                    <label for="iFoto" class="col-form-label">
                                        <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Principal">
                                            <img id="previewImg" style="width: 80px; height: 80px;">
                                            <svg id='img1' xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                                <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                                <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                                            </svg>
                                        </div>
                                    </label>
                                    <input type="file"  id="iFoto" class="inputFoto" name="nFoto" accept=".png" required>
                                    <!--Foto 2-->
                                    <label for="iFoto2" class="col-form-label">
                                        <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Secundária">
                                            <img id="previewImg2" style="width: 80px; height: 80px;">
                                            <svg id='img2' xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                                <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                                <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                                            </svg>
                                        </div>
                                    </label>
                                    <input type="file"  id="iFoto2" class="inputFoto" name="nFoto2" accept=".png" required>
                                    <!--Foto 3-->
                                    <label for="iFoto3" class="col-form-label">
                                        <div class="inputFoto" data-toggle="tootltip" data-placement="top" title="Foto Secundária">
                                            <img id="previewImg3" style="width: 80px; height: 80px;">
                                            <svg id='img3' xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                                <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                                <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                                            </svg>
                                        </div>
                                    </label>
                                    <input type="file"  id="iFoto3" class="inputFoto" name="nFoto3" accept=".png">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Enviar</button> <!--Enviar-->
                                    </div>
                                </form>                               
                            </div>
                        </div>
                    </div>
                </div>
                <!--Mensagem de Confirmação de Cadastro, Alteração e Exclusão-->
                <?php if($_SESSION['msg'] == "Cadastrou"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-success" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Cadastro realizado!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php }else if($_SESSION['msg'] == "Não Cadastrou"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-danger" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Cadastro não realizado!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php }else if($_SESSION['msg'] == "Alterou"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-success" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Alteração realizada!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php }else if($_SESSION['msg'] == "Não Alterou"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-danger" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Alteração não realizada!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php }else if($_SESSION['msg'] == "Excluiu"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-success" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Produto excluído!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php }else if($_SESSION['msg'] == "Não Excluiu"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-danger" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Produto não excluído!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php } ?>  
                <!--Tabela de Produtos-->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <?php
                            $pag = (isset($_GET['pag'])) ? $_GET['pag'] : 1;
                            include ("php/listarProdutos.php");

                        ?>
                    </table>
                </div>  
                <!--Paginação-->
                <?php if($_SESSION['qtdProdutos'] > 0){ ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 paginacao">
                        <?php
                            //Verificar Página anterior e posterior
                            $pag_anterior = $pag - 1;
                            $pag_posterior = $pag + 1;

                        ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li>
                                    <?php if($pag_anterior != 0){ ?>
                                        <li class="page-item"><a class="page-link" href="adm_produtos.php?pag=1"><<</a></li>
                                        <li class="page-item"><a class="page-link" href="adm_produtos.php?pag=<?php echo $pag_anterior;?>"><</a></li>
                                    <?php }else{ ?>
                                        <li class="page-item disabled"><a class="page-link" href="adm_produtos.php?pag=1"><<</a></li>
                                        <li class="page-item disabled"><a class="page-link"><</a></li>
                                    <?php } ?>        
                                </li>
                                <?php if($pag == 1){ ?>
                                    <li class="page-item"><a class="page-link" href="adm_produtos.php?pag=<?php echo $pag;?>"><?php echo $pag;?></a></li>
                                <?php }else if($pag == $num_pg){ ?>
                                    <li class="page-item"><a class="page-link" href="adm_produtos.php?pag=<?php echo $pag;?>"><?php echo $pag;?></a></li>
                                <?php }else{ ?>
                                    <li class="page-item"><a class="page-link" href="adm_produtos.php?pag=<?php echo $pag;?>"><?php echo $pag;?></a></li>
                                <?php } ?> 
                                <li>
                                    <?php if($pag_posterior <= $num_pg){ ?>
                                        <li class="page-item"><a class="page-link" href="adm_produtos.php?pag=<?php echo $pag_posterior;?>">></a></li>
                                        <li class="page-item"><a class="page-link" href="adm_produtos.php?pag=<?php echo $num_pg;?>">>></a></li>
                                    <?php }else{ ?>
                                        <li class="page-item disabled"><a class="page-link">></a></li>
                                        <li class="page-item disabled"><a class="page-link" href="adm_produtos.php?pag=<?php echo $num_pg;?>">>></a></li>
                                    <?php } ?>        
                                </li>
                            </ul>
                        </nav>
                    </div>
                <?php } ?>
            </main>
        </div>
        <!--Rodapé-->
        <footer>
            <div class="fixed row7">
                <div class="col-lg-1 col-md-2 col-sm-2 col-2 logo"><a href="index.php"><img src="img/logo.png" width="80px"></a></div>
                <div class="col-lg-10 col-md-9 col-sm-9 col-8 registro">
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