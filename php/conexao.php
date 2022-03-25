<?php
    //Abrir conexão com o Banco de Dados
    //$conn = mysqli_connect("servidor","usuario","senha","banco") or die("Falha: " . mysqli_connect_error());
    $conn = mysqli_connect("postgres://dmfjfotinrnwnv:3886184625c408901797092b0d9a2b039221d86ff9da3ed22b1c88f79ed5a65b@ec2-34-224-226-38.compute-1.amazonaws.com:5432/d4gj04lvtsrncp") or die("Falha: " . mysqli_connect_error());
    echo($DATABASE_URL);
?>