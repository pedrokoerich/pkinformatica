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

<!DOCTYPE HTML>
<html lang='pt-br'>
    <head>
        <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
        <title>PK Informática - Catálogo TI </title>

        <!--SCRIPTS-->
        <script src="estilo/js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
        <script src="JS/catalogo.js" type="text/javascript"></script>
        <script src="estilo/js/bootstrap.min.js" type="text/javascript"></script>

        <!--FORMATAÇÕES-->
        <meta charset="utf-8">
        <link href="estilo/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="CSS/catalogo.css" rel="stylesheet">
    </head>

    <body background="img/Background.jpg" class="bg img-fluid"> <!--Background de fundo-->
        <!--Cabeçalho da Página-->
        <header class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(11, 44, 55); margin-top: -10px;">
            <div class="col-lg-1 col-md-3 col-sm-8 col-8 logo"><a href="index.php"><img src="img/logo.png" width="80px"></a></div> <!--Logo-->

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
        <!--Corpo da Página-->
        <div class="container">
            <main class="corpo_catalogo">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 categorias2">
                    <label class="switch">
                        <span class="switch-text">Hardwares</span>
                        <div class="switch-wrapper">
                            <?php
                                $cat = $_GET["cat"];
                                if($cat == "1" || $cat == "full"){?>
                                    <input type="checkbox" name="nHardwares" id="iHardwares" value="1" onclick="selectCategoria(this)" checked>
                                <?php }else{?>
                                    <input type="checkbox" name="nHardwares" id="iHardwares" value="1" onclick="selectCategoria(this)">
                            <?php } ?>
                            <span class="switch-button"></span>
                        </div>
                    </label>
                    <label class="switch">
                        <span class="switch-text">Periféricos</span>
                        <div class="switch-wrapper">
                            <?php
                                $cat = $_GET["cat"];
                                if($cat == "2" || $cat == "full"){?>
                                    <input type="checkbox" name="nPerifericos" id="iPerifericos" value="2" onclick="selectCategoria(this)" checked>
                                <?php }else{?>
                                    <input type="checkbox" name="nPerifericos" id="iPerifericos" value="2" onclick="selectCategoria(this)">
                            <?php } ?>
                            <span class="switch-button"></span>
                        </div>
                    </label>
                    <label class="switch">
                        <span class="switch-text">Cadeiras</span>
                        <div class="switch-wrapper">
                            <?php
                                $cat = $_GET["cat"];
                                if($cat== "3" || $cat == "full"){?>
                                    <input type="checkbox" name="nCadeiras" id="iCadeiras" value="3" onclick="selectCategoria(this)" checked>
                                <?php }else{?>
                                    <input type="checkbox" name="nCadeiras" id="iCadeiras" value="3" onclick="selectCategoria(this)">
                            <?php } ?>
                            <span class="switch-button"></span>
                        </div>
                    </label>
                    <label class="switch">
                        <span class="switch-text">Monitores</span>
                        <div class="switch-wrapper">
                            <?php
                                $cat = $_GET["cat"];
                                if($cat == "4" || $cat == "full"){?>
                                    <input type="checkbox" name="nMonitores" id="iMonitores" value="4" onclick="selectCategoria(this)" checked>
                                <?php }else{?>
                                    <input type="checkbox" name="nMonitores" id="iMonitores" value="4" onclick="selectCategoria(this)">
                            <?php } ?>
                            <span class="switch-button"></span>
                        </div>
                    </label>
                </div>
                <aside class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 catalogo">
                    <?php
                        $pag = (isset($_GET['pag'])) ? $_GET['pag'] : 1;
                        include "php/produtos.php";
                    ?>
                </aside>
            </main>
        </div>
        <footer>
            <div class="row7">
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