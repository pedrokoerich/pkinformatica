<?php
    session_start();

    if(!isset($_SESSION['login'])){
        $_SESSION['login'] = false;
        $_SESSION['tipo_usuario'] = 2;
        $_SESSION['idUsuario'] = "";
    
    }else{
        $id = $_SESSION['idUsuario'];
    }

?>

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
        <title>PK Informática - Cadastre-se </title>

        <!--SCRIPTS-->
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="estilo/js/jquery-3.2.1.slim.min.js"></script>
        <script type="text/javascript" src="estilo/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="JS/cadastro-usuario.js"></script>
        <script type="text/javascript" src="estilo/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="estilo/js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#iCelular').mask('(00) 00000 - 0000');
                $('#iTelefone').mask('(00) 0000 - 0000');
                $('#iCEP').mask('00000-000');
            });
        </script>

        <!--FORMATAÇÕES-->
        <meta charset="utf-8">
        <link href="estilo/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="bootstrap.min.css"  rel="stylesheet" type="text/css">
        <link href="CSS/cadastro-usuarios.css" rel="stylesheet" type="text/css">

    </head>

    <body background="img/Background.jpg" class="bg img-fluid"> <!--Background de fundo-->
        <!--Cabeçalho da Página-->
        <header class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(11, 44, 55); margin-top: -10px;">
            <div class="col-lg-1 col-md-7 col-sm-8 col-8 logo"><a href="index.php"><img src="img/logo.png" width="80px"></a></div> <!--Logo-->
            <!--Botão Menu-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="margin-right: auto;"></span>
            </button>
            <?php if($_SESSION['login'] == true){?>
                 <!--Menu-->
                <nav class="col-lg-9 collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto menu">
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="catalogo.php?cat=full">Nosso catálogo<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="suporte.php">Suporte <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="index.php#quem_somos">Quem somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="index.php#contato">Contato</a>
                        </li>
                        <?php if($_SESSION['tipo_usuario'] == 1){ ?>
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;" href="adm.php">Painel de Controle</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!--Logado-->
                <div class="col-lg-2 col-md-12 col-sm-12 col-12 login">
                    <div class="btn-group">
                        <p>Olá, <?php echo $_SESSION['username'];?></p>
                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split seta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="alterarUsuarios.php?id=<?php echo $id; ?>" style="text-decoration: none; color: black;">
                                <p style="text-align: center;">Editar Perfil
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="margin-left: 5px; margin-top: 5px;" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                </p>
                            </a>
                            <a href="php/logoff.php" style="float: right; margin-right: 10px; color: black;" data-toggle="tootltip" data-placement="top" title="Sair">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <!--Menu-->
                <nav class="col-lg-6 collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto menu">
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="catalogo.php?cat=full">Nosso catálogo<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="suporte.php">Suporte <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="index.php#quem_somos">Quem somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="index.php#contato">Contato</a>
                        </li>
                    </ul>
                </nav>
                <!--Formulário de Login e Cadastro de Usuários-->
                <div class="col-lg-5 col-md-12 col-sm-12 col-12 login">
                    <form method="POST" action="php/login.php" id="login">
                        <label for="iUsuario"><img style="cursor: pointer;" src="img/login.png" width="15px"></label>
                        <input placeholder="Nome de Usuário" name="nUsuario" id="iUsuario" type="text" required>
                        <label for="iSenha"><img style="cursor: pointer;" src="img/senha.png" width="15px"></label>
                        <input placeholder="Senha" name="nSenha" id="iSenha" type="password" required>
                        <button type="submit">Entrar</button><br>
                        Não possui uma conta?<br>
                        <a href="cadastro_usuarios.php" style="color: white;">Cadastre-se</a>
                        <div class="text-center text-white bg-danger msg_login">
                            <?php if(isset($_SESSION['erroLogin'])){
                                echo $_SESSION['erroLogin'];
                                unset ($_SESSION['erroLogin']);
                            }?>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </header>
        <!--Corpo-->
        <div class="container">
            <main class="corpo">
                <form id="cadastroUsuario" class="cadastro_clientes">
                    <div>
                        <h1 style="color: white;">Faça seu cadastro</h1>
                    </div>
                    <br>
                    <div>
                        <div class="quebra_linha3"></div>
                        <h5 style="color: rgb(198, 201, 202);">Informações pessoais</h5>
                    </div>
                    <br>
                    <div class="info_pessoais">
                        <label for="iNome">Nome:</label>
                        <input name="nNome" id="iNome" placeholder="Utilize seu nome completo" type="text" maxlength="45" required>
                        <label for="iIdade">Idade:</label>
                        <input name="nIdade" id="iIdade" type="date" required>
                    </div>
                    <br>
                    <div>
                        <div class="quebra_linha3"></div>
                        <h5 style="color: rgb(198, 201, 202);">Informações de contato</h5>
                    </div>
                    <br>
                    <div class="info_contato">
                        <div>
                            <label for="iCelular">Celular:</label>
                            <input name="nCelular" id="iCelular" placeholder="Ex: (00) 00000 - 0000" type="text" maxlength="11" required>
                            <label for="iTelefone">Telefone:</label>
                            <input name="nTelefone" id="iTelefone" placeholder="Ex: (00) 0000 - 0000" type="text" maxlength="11">
                        </div>
                        <br>
                        <div>
                            <label for="iEmail">E-mail:</label>
                            <input name="nEmail" id="iEmail" placeholder="Ex: usuario@exemplo.com.br" type="email" maxlength="45" required>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="quebra_linha3"></div>
                        <h5 style="color: rgb(198, 201, 202);">Endereço</h5>
                    </div>
                    <br>
                    <div class="info_endereco">
                        <label for="iCEP">CEP:</label>
                        <input name="nCEP" id="iCEP" placeholder="Digite seu CEP" type="text" maxlength="8" required>
                        <br>
                        <label for="iEstado">Estado:</label>
                        <input name="nEstado" id="iEstado" placeholder="Estado" type="text" maxlength="45" required>
                        <br>
                        <label for="iCidade">Cidade:</label>
                        <input name="nCidade" id="iCidade" placeholder="Cidade" type="text" maxlength="45" required>
                        <br>
                        <label for="iBairro">Bairro:</label>
                        <input name="nBairro" id="iBairro" placeholder="Bairro" type="text" maxlength="45" required>
                        <br>
                        <label for="iRua">Rua:</label>
                        <input name="nRua" id="iRua" placeholder="Rua" type="text" maxlength="45" required>
                        <label for="iNro_Rua">Número:</label>
                        <input name="nNro_Rua" id="iNro_rua" placeholder="Ex: 198" type="number" min="1" maxlength="10" required>  
                    </div>
                    <br>
                    <div class="info_cadastro">
                        <div>
                            <div class="quebra_linha4"></div>
                            <h5 style="color: rgb(198, 201, 202);">Informações de Cadastro</h5>
                        </div>
                        <br>
                        <div>
                            <input name="nUsuarioNovo" id="iUsuarioNovo" placeholder="Digite seu nome de usuário" type="text" style="width: 220px;" maxlength="20" required><br>
                            <input name="nSenhaNova" id="iSenhaNova" placeholder="Senha" type="password" style="width: 220px;" maxlength="30" required><br>
                            <input name="nConfirma_senha" id="iConfirma_senha" placeholder="Confirme sua senha" type="password" style="width: 220px;" maxlength="30" required><br>
                            <?php if($_SESSION['login'] == true){ ?>
                                <?php if($_SESSION['tipo_usuario'] == 1){ ?>
                                    <select class="custom-select" id="iTipo_usuario" name="nTipo_usuario" required>
                                        <option selected>Selecione o tipo de usuário...</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Cliente</option>
                                    </select>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="botoes">
                            <input type="reset" value="Limpar">
                            <input type="submit" name="submit" id="enviar" value="Enviar">
                        </div>
                    </div>
                </form>
                <!--Mensagem de Confirmação de cadastro-->
                <div class="msg_aviso">
                    <div id="loading"><img src="img/loading.gif" style="width: 40px; margin-top: 10px; margin-left: 200px;"></div>
                        <div id="alert" class="alert alert-dismissible fade show" style="float-right" role="alert">
                            <strong id="msg_texto"></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
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