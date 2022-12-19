<?php
    $usuario = 'root';
    $pass = '';
    $database = 'semadec';
    $host = "localhost";
    $porta = 3636;

    $mysqli = new mysqli($host, $usuario, $pass, $database);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados" . $mysqli->error);
    } 
?>