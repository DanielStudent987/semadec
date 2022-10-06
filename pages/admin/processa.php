<?php
    include('protecao.php');
    
    $pr = "";
    //DELETAR EQUIPES
    if (isset($_POST['deletar_equipe'])) {
        

        $id = isset($_POST['id_equipe']) ? $_POST['id_equipe'] : '';
        if ($id != '') {
            $pr = $pr . 'deletarequipe=' .$id;
        }


        header("location:controle.php?p1=y&".$pr);

    //DELETAR MEMBRO
    } else if (isset($_POST['deletar_membro'])) {

        $id = isset($_POST['deletar_membro']) ? $_POST['deletar_membro'] : '';
        if ($id != '') {
            $pr = $pr . 'deletarmembro='.$id;
        }

        header("location:controle.php?p1=y&".$pr);

    }

?>