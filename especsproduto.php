<?php
    session_start();

    if(!isset($_SESSION['login'])){
        $_SESSION['login'] = false;
        $_SESSION['tipo_usuario'] = 2;
        $_SESSION['idUsuario'] = "";
    
    }else{
        $idUsuario = $_SESSION['idUsuario'];
    }
    
    if($_SESSION['login'] != true){
        header("Location: index.php"); 
    }

    $id = $_GET['id'];

    include_once("php/conexao.php");

    $produto = "SELECT * FROM produtos WHERE id = $id";
    $lista = mysqli_query($conn, $produto);

    while($row_produto = mysqli_fetch_assoc($lista)){
        $nome = $row_produto['nome'];
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
        $foto_produto[1] = $id_foto[1];
    }

    if(!isset($id_foto[2])){
        $id_foto[2] = "";
        $foto_produto[2] = $id_foto[2];
    }
    
    if(!isset($id_foto[3])){
        $id_foto[3] = "";
        $foto_produto[3] = $id_foto[3];
    }
?>

<!DOCTYPE HTML>
<html lang='pt-br'>
    <head>
        <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
        <title>PK Informática - Catálogo TI </title>
        
        <!--SCRIPTS-->
        <script src="estilo/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="JS/especsProduto.js"></script>
        <script src="estilo/js/bootstrap.min.js" type="text/javascript"></script>
        
        <!--FORMATAÇÕES-->
        <meta charset="utf-8">
        <link href="estilo/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="CSS/especproduto.css" rel="stylesheet">
    </head>

    <body background="img/Background.jpg" class="bg img-fluid"> <!--Background de fundo-->     
        <!--Cabeçalho da Página-->
        <header class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(11, 44, 55); margin-top: -10px;">
            <div class="col-lg-1 col-md-11 col-sm-10 col-10 logo"><a href="index.php"><img src="img/logo.png" width="80px"></a></div> <!--Logo-->
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
                <div class="col-lg-2 col-md-12 col-sm-12 col-12 login" >
                    <div class="btn-group">
                        <p>Olá, <?php echo $_SESSION['username'];?></p>
                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split seta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="alterarUsuarios.php?id=<?php echo $idUsuario; ?>" style="text-decoration: none; color: black;">
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
            <?php } ?>
        </header>
        <div class="modal fade" id="msg_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php if(isset($_SESSION['erroLogin'])){
                            echo $_SESSION['erroLogin'];
                            unset ($_SESSION['erroLogin']);
                        }?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--Corpo da Página-->
        <div class="container">
            <main class="corpo">
                <div class="info">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-3 previews">
                        <?php for($i = 1; $i < 4; $i++){ ?>
                            <?php if($foto_produto[$i] != ""){ ?>
                                <div id=<?php echo $i ?> class="col-lg-12 col-md-12 col-sm-12 col-12 preview" onclick="mostra(this)"><img src='<?php echo $foto_produto[$i]; ?>'></div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6 col-md-9 col-sm-9 col-9 principal">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 imgDestaque">
                            <img id="img1" src='<?php echo $foto_produto[1]; ?>'>
                            <img id="img2" src='<?php echo $foto_produto[2]; ?>'>
                            <img id="img3" src='<?php echo $foto_produto[3]; ?>'>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 principal2">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 infoProduto">
                            <div class="col-lg-12 col-md-6 col-sm-12 col-12 nome"><?php echo $nome ?> - <?php echo $marca ?> - <?php echo $modelo ?></div>
                            <div id="valor" class="col-lg-12 col-md-6 col-sm-12 col-12 valor">R$ <?php echo $valor ?><p>à vista</p><br><p>ou até 10x sem juros</p></div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 pagamento"><a href="compraProduto.php?idUsuario=<?php echo $idUsuario;?>&idProduto=<?php echo $id;?>"><button>Comprar</button></a></div>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 descricao">
                    <br>
                    <p><?php echo $descricao ?></p>
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
                            <path style="color: white"; d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z"/>
                        </svg> 
                    </a>
                </div>
            </div>
        </footer>
    </body>
</html>