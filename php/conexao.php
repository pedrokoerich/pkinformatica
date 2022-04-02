<?php
    //Abrir conexão com o Banco de Dados
/*     $CLEARDB_DATBASE_URL = 'mysql://b36585fb7b6d35:812911aa@us-cdbr-east-05.cleardb.net/heroku_506cdc25d3cbb9f?reconnect=true';

    $url = parse_url(getenv($CLEARDB_DATBASE_URL)); */
    $server = 'us-cdbr-east-05.cleardb.net';
    $username = 'b36585fb7b6d35';
    $password = '812911aa';
    $db = 'heroku_506cdc25d3cbb9f';
    $conn = mysql_conect($server, $username, $password, $db) or die("Falha: " . mysql_connect_error());

?>