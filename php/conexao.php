<?php
    //Abrir conexão com o Banco de Dados

    $cleardb_url = parse_url ( getenv ( "CLEARDB_DATABASE_URL" ) ) ;  
    $cleardb_server = $cleardb_url [ "eu-cdbr-west-02.cleardb.net" ] ;  
    $cleardb_username = $cleardb_url [ "b508dff0e75fef" ] ;  
    $cleardb_password = $cleardb_url [ "83ea8554" ] ;  
    $cleardb_db = substr ( $cleardb_url [ "mysql://b508dff0e75fef:83ea8554@eu-cdbr-west-02.cleardb.net/heroku_0aa435053d23286?reconnect=true" ] , 1 ) ;  
    $active_group = 'padrão' ;  
    $query_builder = TRUE ; 
     
    // Conecta ao banco de dados
    $conn = mysqli_connect ( $cleardb_server , $cleardb_username , $cleardb_password , $cleardb_db ) ;

?>