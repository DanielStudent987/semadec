<?php

    if (!isset($_SESSION)) {
        session_start();
    }
    
    if (!isset($_SESSION['id_usuario'])) {
        die("Você não pode acessar essa página. <p><a href=\"../login.php\">Fazer login</a></p>");
    }

?>