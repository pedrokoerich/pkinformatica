<?php
    //Abrir conexão com o Banco de Dados
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    $conn = new mysqli($server, $username, $password, $db) or die("Falha: " . mysqli_connect_error());

?>