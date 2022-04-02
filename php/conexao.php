<?php
    //Abrir conexão com o Banco de Dados
    $url = parse_url(getenv("mysql://b36585fb7b6d35:812911aa@us-cdbr-east-05.cleardb.net/heroku_506cdc25d3cbb9f?reconnect=true"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    $conn = new mysqli($server, $username, $password, $db) or die("Falha: " . mysqli_connect_error());

    //mysql://b36585fb7b6d35:812911aa@us-cdbr-east-05.cleardb.net/heroku_506cdc25d3cbb9f?reconnect=true

?>