<?php
    

        if (isset($_GET['p1'])) {   
            $c1 = isset($_GET['c1']) ? $_GET['c1'] : '';
            $c2 = isset($_GET['c2']) ? $_GET['c2'] : '';
            $c3 = isset($_GET['c3']) ? $_GET['c3'] : '';
            $c4 = isset($_GET['c4']) ? $_GET['c4'] : '';
            
            if ($_GET['p1'] == "y") {
                echo "<h1>Título</h1>";
                echo "<h2>$c1</h2><br><br>";
                echo "<h1>Categoria</h1>";
                echo "<h2>$c2</h2><br><br>";
                echo "<h1>Autores</h1>";
                echo "<h2>$c3</h2><br><br>";
                echo "<h1>Seção</h1>";
                echo "<h2>$c4</h2><br><br>";
            } else {
                echo "Acesso negado";
            }
                
        } else {
            header("location:index.php");
        }

        echo "<a href='index.php'>voltar</a>";
    