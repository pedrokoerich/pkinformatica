<?php 
    session_start();

    if($_SESSION['login'] != true){
        header("Location: index.php"); 
    }

    $idUsuario = $_GET['idUsuario'];
    $idProduto = $_GET['idProduto'];

    include_once("php/conexao.php");

    $usuario = "SELECT * FROM usuarios WHERE id = $idUsuario";
    $lista = mysqli_query($conn, $usuario);

    while($row_usuario = mysqli_fetch_assoc($lista)){
        $nome           = $row_usuario['nome'];
        $celular        = $row_usuario['celular'];
        $email          = $row_usuario['email'];
        $cep            = $row_usuario['cep'];
        $estado         = $row_usuario['estado'];
        $cidade         = $row_usuario['cidade'];
        $bairro         = $row_usuario['bairro'];
        $rua            = $row_usuario['rua'];
        $nro_rua        = $row_usuario['num_rua'];
    }

    $produto = "SELECT * FROM produtos WHERE id = $idProduto";
    $lista = mysqli_query($conn, $produto);

    while($row_produto = mysqli_fetch_assoc($lista)){
        $nomeProduto = $row_produto['nome'];
        $valor = $row_produto['valor'];
        $modelo = $row_produto['modelo'];
        $marca = $row_produto['marca'];
        $descricao = $row_produto['descricao'];
    }
    $parcela = ($valor / 10);

?>

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
        <title>PK Informática - Comprar Produto</title>
        
        <!--SCRIPTS-->
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="estilo/js/jquery-3.2.1.slim.min.js"></script>
        <script type="text/javascript" src="estilo/js/jquery-3.3.1.min.js"></script>
        <script src="JS/compraProduto.js"></script>
        <script src="estilo/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="estilo/js/jquery.mask.min.js"></script>

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
        <link href="CSS/compraProduto.css" rel="stylesheet">
    </head>

    <body background="img/Background.jpg" class="bg img-fluid"> <!--Background de fundo-->

        <!--Corpo-->
        <div class="container">
            <main class="corpo">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 logo"><a href="index.php"><img src="img/logo.png" width="120px"></a></div><!--Logo-->
                <form id="compraProduto" class="col-lg-12 col-md-12 col-sm-12 col-12 formUsuarios">
                    <div class="quebra_linha"></div>
                    <h2 class="modal-title">Confirme seus dados</h2>
                    <br>
                    <br>
                    <div>
                        <div class="quebra_linha3"></div>
                        <h5 style="color: rgb(198, 201, 202);">Informações pessoais</h5>
                    </div>
                    <br>
                    <div class="info_pessoais">
                        <label for="iNome">Nome:</label>
                        <input name="nNome" id="iNome" placeholder="Utilize seu nome completo" type="text" maxlength="45" value='<?php echo $nome ?>' readonly>
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
                            <input name="nCelular" id="iCelular" placeholder="Ex: (00) 00000 - 0000" type="text" maxlength="11" value='<?php echo $celular ?>' readonly>
                        </div>
                        <br>
                        <div>
                            <label for="iEmail">E-mail:</label>
                            <input name="nEmail" id="iEmail" placeholder="Ex: usuario@exemplo.com.br" type="email" maxlength="45" value='<?php echo $email ?>' readonly>
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
                        <input name="nCEP" id="iCEP" placeholder="Digite seu CEP" type="text" maxlength="8" value='<?php echo $cep; ?>' readonly>
                        <br>
                        <label for="iEstado">Estado:</label>
                        <input name="nEstado" id="iEstado" placeholder="Estado" type="text" maxlength="45" value='<?php echo $estado; ?>' readonly>
                        <br>
                        <label for="iCidade">Cidade:</label>
                        <input name="nCidade" id="iCidade" placeholder="Cidade" type="text" maxlength="45" value='<?php echo $cidade; ?>' readonly>
                        <br>
                        <label for="iBairro">Bairro:</label>
                        <input name="nBairro" id="iBairro" placeholder="Bairro" type="text" maxlength="45" value='<?php echo $bairro; ?>' readonly>
                        <br>
                        <label for="iRua">Rua:</label>
                        <input name="nRua" id="iRua" placeholder="Rua" type="text" maxlength="45" value='<?php echo $rua; ?>' readonly>
                        <label for="iNro_Rua">Número:</label>
                        <input name="nNro_Rua" id="iNro_rua" placeholder="Ex: 198" type="number" min="1" maxlength="10" value=<?php echo $nro_rua; ?> readonly>  
                    </div>
                    <br>
                    <div>
                        <div class="quebra_linha3"></div>
                        <h5 style="color: rgb(198, 201, 202);">Informações do Produto</h5>
                    </div>
                    <br>
                    <div class="info_produto">
                        <label for="iNomeProduto">Nome:</label>
                        <input name="nNomeProduto" id="iNomeProduto" placeholder="Nome do produto" type="text" maxlength="100" value='<?php echo $nomeProduto;?>' readonly>
                        <br>
                        <label for="iMarca">Marca:</label>
                        <input name="nMarca" id="iMarca" placeholder="Marca do Produto" type="text" maxlength="45" value='<?php echo $marca; ?>' readonly>
                        <br>
                        <label for="iModelo">Modelo:</label>
                        <input name="nModelo" id="iModelo" placeholder="Modelo do Produto" type="text" maxlength="45" value='<?php echo $modelo; ?>' readonly>
                        <br><br>
                        <label for="iValor">Valor:</label>
                        <input name="nValor" id="iValor" placeholder="Valor do Produto" type="number" value='<?php echo $valor; ?>' readonly>
                        <label for="iFormaPagamento">Formas de Pagamento:</label>
                        <select name="nFormaPagamento" id="iFormaPagamento">
                            <option>Á Vista</option>
                            <option>Parcelado</option>
                            <option>Pix</option>
                            <option>Boleto</option>
                        </select> 
                    </div>
                    <br><br>
                    <div class="botoes">
                        <button type="submit" class="btn btn-success">Comprar</button>
                    </div>
                </form>
                <!--Mensagem de Confirmação de Compra-->
                <div class="msg_aviso">
                    <div id="loading"><img src="img/loading.gif" style="width: 40px; margin-top: 30px; margin-left: 200px;"></div>
                        <div id="alert" class="alert alert-dismissible fade show" style="float-right" role="alert">
                            <strong id="msg_texto"></strong>
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