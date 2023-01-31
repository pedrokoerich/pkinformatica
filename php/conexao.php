<?php
/*     //Abrir conexão com o Banco de Dados

    //Obter informações de conexão do Heroku ClearDB
    $cleardb_url = parse_url ( getenv ( "CLEARDB_DATABASE_URL" ) ) ;  
    $cleardb_server = $cleardb_url [ "host" ] ;  
    $cleardb_username = $cleardb_url [ "user" ] ;  
    $cleardb_password = $cleardb_url [ "pass" ] ;  
    $cleardb_db = substr ( $cleardb_url [ "path" ] , 1 ) ;  
    $active_group = 'default' ;  
    $query_builder = TRUE ;  
    // Conecta ao banco de dados
    $conn = mysqli_connect ( $cleardb_server , $cleardb_username , $cleardb_password , $cleardb_db) ; */

    //Abrir conexão com o Banco de Dados
    //$conn = mysqli_connect("servidor","usuario","senha","banco") or die("Falha: " . mysqli_connect_error());
    $conn = mysqli_connect("localhost","root","","pk_informatica") or die("Falha: " . mysqli_connect_error());

    $conn = mysqli_connect("mysql://b0c5a9a72b49cb:048e77dc@eu-cdbr-west-03.cleardb.net/heroku_9f853df58698c04?reconnect=true") or die("Falha: " . mysqli_connect_error());
    echo($DATABASE_URL);
?>
