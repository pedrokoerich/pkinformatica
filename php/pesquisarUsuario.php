<?php 
    include_once("conexao.php");

    $usuariosPesquisados = $_GET['nPesquisar'];
    
    $listaUsuarios = "SELECT * FROM usuarios WHERE nome LIKE '%$usuariosPesquisados%' OR id = '$usuariosPesquisados'";
    $lista = mysqli_query($conn, $listaUsuarios);
    $usuariosListados = mysqli_num_rows($lista);
    $qtd_pg = 12;                                           //Quantidade de produtos por página
    $num_pg = ceil($usuariosListados / $qtd_pg);            //Calculo de páginas necessárias
    $inicio = ($qtd_pg * $pag) - $qtd_pg;                   //Início das páginas

    if($usuariosListados > 0){
        echo "<html lang='pt-br'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Nome</th>
                    <th scope='col'>Celular</th>
                    <th scope='col'>E-mail</th>
                    <th scope='col'>Nome de Usuário</th>
                    <th scope='col'>Tipo</th>
                    <th scope='col'>Alterar</th>
                    <th scope='col'>Excluir</th>
                </tr>
            </thead>
          </html>";
    
        $listaUsuarios = "SELECT * FROM usuarios WHERE nome LIKE '%$usuariosPesquisados%' OR id = '$usuariosPesquisados' LIMIT $inicio, $qtd_pg";
        $lista = mysqli_query($conn, $listaUsuarios);
        $usuariosListados = mysqli_num_rows($lista);

        while($row_usuario = mysqli_fetch_assoc($lista)){
            $id = $row_usuario['id'];
            $nome = $row_usuario['nome'];
            $data_nascimento = $row_usuario['data_nascimento'];
            $celular = $row_usuario['celular'];
            $email = $row_usuario['email'];
            $nome_usuario = $row_usuario['nome_usuario'];
            $tipo_usuario = $row_usuario['tipo_id'];
            if($tipo_usuario == 1){
                $tipo_usuario = "Administrador";
            }else{
                $tipo_usuario = "Cliente";
            }

            echo "<html lang='pt-br'>
                    <tr>
                        <th scope='row'>$id</th>
                        <td>$nome</td>
                        <td>$celular</td>
                        <td>$email</td>
                        <td>$nome_usuario</td>
                        <td>$tipo_usuario</td>
                        <td class='alteraUsuario'>
                            <a href='alterarUsuarios.php?id=$id'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='27' height='27' color='black' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                    <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                </svg>
                            </a>
                        </td>
                        <td class='excluiUsuario' style='cursor: pointer;' data-toggle='modal' data-target='#modalExcluir$id'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='27' height='27' color='black' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </td>

                        <div class='modal fade' id='modalExcluir$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Confirmação de Exclusão de Usuário</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        Deseja realmente excluir este usuário?
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Voltar</button>
                                        <a href='php/excluiUsuario.php?id=$id'><button type='button' class='btn btn-primary'>Excluir Usuário</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                </html>";
        }
    }else{
        echo "<html><h5 style='color: white; text-align: center;'>Não há usuários registrados.</h5> </html>";
    }
    
    $_SESSION['qtdUsuarios'] = $usuariosListados;
    mysqli_close($conn);
?>