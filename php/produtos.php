<?php
    include_once("conexao.php");

    $resultado_img = "SELECT min(fp.id) as id, fp.descricao, fp.produtos_id, pr.nome, pr.categorias_id FROM fotos_produtos fp
                    INNER JOIN produtos pr
                    ON pr.id = fp.produtos_id
                    GROUP BY fp.produtos_id";

    $result_img = mysqli_query($conn, $resultado_img);
    $total_produtos = mysqli_num_rows($result_img);         //Total de produtos

    while($row_produto = mysqli_fetch_assoc($result_img)){
        $img_produto = $row_produto['descricao'];
        $id_produto = $row_produto['produtos_id'];

        $nome_produto = $row_produto['nome'];
        $categoria = $row_produto['categorias_id'];

        if($categoria == 1){
            $categoria = "hardwares";

        }else if($categoria == 2){
            $categoria = "perifericos";

        }else if($categoria == 3){
            $categoria = "cadeiras";

        }else{
            $categoria = "monitores";
        }

        if($_SESSION['login'] == true){
            echo "<html>
                    <div class='$categoria'>
                    <a href= 'especsproduto.php?id=$id_produto'>
                        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 produto'>
                            <div class='box_img'>
                                <img src= '$img_produto' style='width: 250px; margin-left: auto; margin-right: auto'>
                                <p>$nome_produto</p>
                            </div>
                        </div>
                    </a>
                    </div>
                </html>";
        }else{
            echo "<html>
            <div class='$categoria'>
                    <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 produto'>
                        <div class='box_img'>
                            <img src= '$img_produto' style='width: 250px; margin-left: auto; margin-right: auto'>
                            <p>$nome_produto</p>
                        </div>
                    </div>
                    </div>
                </html>";

        }
        
    }

    mysqli_close($conn);
?>   