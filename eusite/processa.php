<?php
    

        if (isset($_POST['enviar'])) {    
            $parametros = '';

            $cx = isset($_POST['c1']) ? $_POST['c1'] : '';
            if ($cx != '') { 
                $parametros = 'c1='.$cx;
            }
            //echo "$_POST[c1]";
            
            $cx = isset($_POST['c2']) ? $_POST['c2'] : '';
            if ($cx!='') {
                $parametros = $parametros.'&c2='.$cx;
            } 
            
            $cx = isset($_POST['c3']) ? $_POST['c3'] : '';
            if ($cx!='') {
                $parametros = $parametros.'&c3='.$cx;
            } 
            
            $cx = isset($_POST['c4']) ? $_POST['c4'] : '';
            if ($cx != '') {
                $parametros = $parametros.'&c4='.$cx;
            }
                    //echo "$c1 $c2 $c3 $check1 $check2 $check3 $c5";
            //echo $parametros;
            header("location:exibe.php?p1=y&".$parametros);

                    /*if ($nome=="aula" && $senha=="fear") {
                        echo "<p>cadastro encontrado</p>";
                    } else {
                        echo '<p>cadastro n encontrado</p>';
                    }*/
            
        } else {
            //echo "Informações Invalidas";
            header("location: index.php");
        }
    