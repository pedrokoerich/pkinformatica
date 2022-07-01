<?php
    session_start();
    if($_SESSION['login'] != true || $_SESSION['tipo_usuario'] != 1){
        header("Location: index.php");
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
        <link href="CSS/adm.css" rel="stylesheet">
    </head>

    <body background="img/Background.jpg" class="bg img-fluid"> <!--Background de fundo-->
        <!--Corpo-->
        <div class="container">
            <main class="corpo">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 logo"><a href="index.php"><img src="img/logo.png" width="120px"></a></div> <!--Logo-->
                <h2 class="col-lg-12 col-md-12 col-sm-12 col-12 titulo">Olá, Administrador</h2>

                <!--Menu Produtos e Usuários-->
                <div class="row4">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12 produtos">
                        <a href="adm_produtos.php">
                            <img class="img-fluid" src="img/produtos.png" style="width: 150px; margin-top: 20px;">
                            <div class="text3">
                                <p><font>Produtos</font></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12 usuarios">
                        <a href="adm_usuarios.php">
                            <img class="img-fluid" src="img/usuarios.png" style="width: 150px; margin-top: 20px;">
                            <div class="text2">
                                <p><font>Usuários</font></p>
                            </div>
                        </a>
                    </div>
                </div>
            </main>
        </div>
        <!--Rodapé-->
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