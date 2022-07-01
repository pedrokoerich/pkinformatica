<?php
    include_once("conexao.php");

    $resultado = $_GET["nPesquisar"];                       //Conteúdo pesquisado

    $resultado_img = "SELECT min(fp.id) as id, fp.descricao, fp.produtos_id, pr.nome FROM fotos_produtos fp
                    INNER JOIN produtos pr 
                    ON pr.id = fp.produtos_id
                    WHERE pr.nome LIKE '%$resultado%'
                    GROUP BY fp.produtos_id";
    
    $result_img = mysqli_query($conn, $resultado_img);
    $total_produtos = mysqli_num_rows($result_img);         //Total de produtos
    $qtd_pg = 18;                                           //Quantidade de produtos por página
    $num_pg = ceil($total_produtos / $qtd_pg);              //Calculo de páginas necessárias
    $inicio = ($qtd_pg * $pag) - $qtd_pg;                   //Início das páginas

    $resultado_img = "SELECT min(fp.id) as id, fp.descricao, fp.produtos_id, pr.nome FROM fotos_produtos fp
                    INNER JOIN produtos pr
                    ON pr.id = fp.produtos_id
                    WHERE pr.nome LIKE '%$resultado%'
                    GROUP BY fp.produtos_id
                    LIMIT $inicio, $qtd_pg"; 
    
    $result_img = mysqli_query($conn, $resultado_img);
    $total_produtos = mysqli_num_rows($result_img);

    while($row_produto = mysqli_fetch_assoc($result_img)){
        $img_produto = $row_produto['descricao'];
        $id_produto = $row_produto['produtos_id'];

        $nome_produto = $row_produto['nome'];

        if($_SESSION['login'] == true){
            echo    "<html lang='pt-br'>
                        <a href= 'especsproduto.php?id=$id_produto'>
                            <div id='conteudo' class='col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 produto'>
                                <div class='box_img'>
                                    <img src= '$img_produto' style='width: 250px; margin-left: auto; margin-right: auto'>
                                    <p>$nome_produto</p>
                                </div>
                            </div>
                        </a>
                    </html>";
        }else{
            echo    "<html lang='pt-br'>
                        <div id='conteudo' class='col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 produto'>
                            <div class='box_img'>
                                <img src= '$img_produto' style='width: 250px; margin-left: auto; margin-right: auto'>
                                <p>$nome_produto</p>
                            </div>
                        </div>
                    </html>";
        }

    }

    mysqli_close($conn);
    
?>