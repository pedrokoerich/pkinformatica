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
        <link href="CSS/adm_usuarios.css" rel="stylesheet">
    </head>

    <body background="img/Background.jpg" class="bg img-fluid">  <!--Background de fundo-->
        <!--Corpo-->
        <div class="container">
            <main class="corpo">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 logo"><a href="index.php"><img src="img/logo.png" width="120px"></a></div> <!--Logo-->
                <div class="row2">
                    <!--Aba de Pesquisa de Produtos-->
                    <form method="GET" action="usuariosPesquisados.php" class="pesquisa">
                        <input placeholder="Pesquisar usuário" type="text" name="nPesquisar" required>
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: white;" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>
                </div> 
                <!--Botão Cadastrar Usuário-->
                <a href="cadastro_usuarios.php">
                    <button type="button" class="botao_users">
                        Novo Usuário
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </button>
                </a>
                <!--Mensagem confirmando a Exclusão do usuário-->
                <?php if($_SESSION['msg'] == "Excluiu"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-success" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Usuário excluído!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php }else if($_SESSION['msg'] == "ultimoAdm"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-danger" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Exclusão não permitida!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php }else if($_SESSION['msg'] == "Não excluiu"){ ?>
                    <div class="msg_cadastro">
                        <div id="alerta" class="alert alert-dismissible fade show bg-danger" style="color: white; font-size: 17px;" role="alert">
                            <p id="msg_texto">Usuário não excluído!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php $_SESSION['msg'] = ""; ?>
                <?php } ?>
                <!--Lista de Usuários-->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <?php
                            $pag = (isset($_GET['pag'])) ? $_GET['pag'] : 1;
                            include ("php/listarUsuarios.php");
                        ?>
                    </table>
                </div>
                <!--Mensagem de Confirmação de Exclusão de usuário-->
                <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão de Usuário</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente excluir este usuário?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                <a href="php\excluiUsuario.php?id=<?; ?>"><button type="button" class="btn btn-primary">Excluir Usuário</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Paginação-->
                <?php if($_SESSION['qtdUsuarios'] > 0){ ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 paginacao">
                        <?php
                            //Verificar Página anterior e posterior
                            $pag_anterior = $pag - 1;
                            $pag_posterior = $pag + 1;
                        ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li>
                                    <?php
                                        if($pag_anterior != 0){ ?>
                                        <li class="page-item"><a class="page-link" href="adm_usuarios.php?pag=1"><<</a></li>
                                        <li class="page-item"><a class="page-link" href="adm_usuarios.php?pag=<?php echo $pag_anterior;?>"><</a></li>
                                    <?php }else{ ?>
                                        <li class="page-item disabled"><a class="page-link" href="adm_usuarios.php?pag=1"><<</a></li>
                                        <li class="page-item disabled"><a class="page-link"><</a></li>
                                    <?php } ?>        
                                </li>
                                <li class="page-item"><a class="page-link" href="adm_usuarios.php?pag=<?php echo $pag;?>"><?php echo $pag;?></a></li>
                                <li>
                                    <?php if($pag_posterior <= $num_pg){ ?>
                                        <li class="page-item"><a class="page-link" href="adm_usuarios.php?pag=<?php echo $pag_posterior;?>">></a></li>
                                        <li class="page-item"><a class="page-link" href="adm_usuarios.php?pag=<?php echo $num_pg;?>">>></a></li>
                                    <?php }else{ ?>
                                        <li class="page-item disabled"><a class="page-link">></a></li>
                                        <li class="page-item disabled"><a class="page-link" href="adm_usuarios.php?pag=<?php echo $num_pg;?>">>></a></li>
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