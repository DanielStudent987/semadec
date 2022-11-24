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

    //CADASTRAR PROVA
    } else if (isset($_POST['salvar_prova'])) {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        if ($nome != '') {
            $pr = $pr . 'nome_prova='.$nome;
        }

        $local = isset($_POST['local']) ? $_POST['local'] : '';
        if ($local != '') {
            $pr = $pr . '&local_prova='.$local;
        }

        $part = isset($_POST['part']) ? $_POST['part'] : '';
        if ($part != '') {
            $pr = $pr . '&part_prova='.$part;
        }

        $grupo = isset($_POST['grupo']) ? $_POST['grupo'] : '';
        if ($grupo != '') {
            $pr = $pr . '&grupo_prova='.$grupo;
        }

        header("location:controle.php?p1=y&".$pr."&cadastrarprova=1");
    //DELETAR PROVA
    } else if (isset($_POST['deletar_prova'])) {
        $id = isset($_POST['deletar_prova']) ? $_POST['deletar_prova'] : " ";
        if ($id != " ") {
            $pr = $pr. "&deletarprova=" .$id;
        }

        header("location: controle.php?p1=y".$pr."&deletar=2");
    
    } else if (isset($_POST["deletar_grupo"])) {
        $id = isset($_POST["deletar_grupo"]) ? $_POST["deletar_grupo"] : "";
        if ($id!="") {
            $pr = $pr."&deletargrupo=".$id;
        }
        echo $id;
        //header("location: controle.php?p1=y".$pr."&grupo=1");
    } 

    


?>