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
    
    //DELETAR GRUPO DE PONTUAÇÃO
    } else if (isset($_POST["deletar_grupo"])) {
        $id = isset($_POST["deletar_grupo"]) ? $_POST["deletar_grupo"] : "";
        if ($id!="") {
            $pr = $pr."&deletargrupo=".$id;
        }
        
        header("location: controle.php?p1=y".$pr."&grupo=1");
        
    //SALVAR GRUPO DE PONTUAÇÃO
    } else if (isset($_POST["salvar_grupo"])) {
        $primeiro = isset($_POST["primeiro"]) ? $_POST["primeiro"] : "";
        if ($primeiro!="") {
            $pr = $pr."primeiro=".$primeiro;
        } 

        $segundo = isset($_POST["segundo"]) ? $_POST["segundo"] : "";
        if ($segundo!="") {
            $pr = $pr."&segundo=".$segundo;
        } 

        $terceiro = isset($_POST["terceiro"]) ? $_POST["terceiro"] : "";
        if ($terceiro!="") {
            $pr = $pr."&terceiro=".$terceiro;
        } 

        $quarto = isset($_POST["quarto"]) ? $_POST["quarto"] : "";
        if ($quarto!="") {
            $pr = $pr."&quarto=".$quarto;
        } 

        $quinto = isset($_POST["quinto"]) ? $_POST["quinto"] : "";
        if ($quinto!="") {
            $pr = $pr."&quinto=".$quinto;
        } 

        $sexto = isset($_POST["sexto"]) ? $_POST["sexto"] : "";
        if ($sexto!="") {
            $pr = $pr."&sexto=".$sexto;
        } 

        header("location:controle.php?p1=y&".$pr."&cadastrargrupo=1");

    //Cadastrar Equipes
    } else if  (isset($_POST["cadastrar_equipe"])) {
        include("../conexao.php");

        $nome = isset($_POST["nome"]) ? $mysqli->real_escape_string($_POST["nome"]) : "";
        if ($nome!="") {
            $pr = $pr."nome_lider_equipe=".$nome;
        } 

        $turma = isset($_POST["turma"]) ? strtoupper($mysqli->real_escape_string($_POST["turma"])) : "";
        if ($turma!="") {
            $pr = $pr."&turma_equipe=".$turma;
        }

        $mat = isset($_POST["matricula"]) ? $mysqli->real_escape_string($_POST["matricula"]) : "";
        if ($mat!="") {
            $pr = $pr."&matricula_equipe=".$mat;
        }

        $equipe = isset($_POST["equipe"]) ? $mysqli->real_escape_string($_POST["equipe"]) : "";
        if ($equipe!="") {
            $pr = $pr."&nome_equipe=".$equipe;
        }

        $email = isset($_POST["email"]) ? $mysqli->real_escape_string($_POST["email"]) : "";
        if ($email!="") {
            //$pr = $pr."&email_equipe=".$email;
            $_SESSION["email_equipe"] = $email;
        }

        $senha = isset($_POST["senha"]) ? md5($mysqli->real_escape_string($_POST["senha"])) : "";
        if ($senha!="") {
            //$pr = $pr."&email_equipe=".$email;
            $_SESSION["senha_equipe"] = $senha;
        }


        $mysqli->close();
        header("location:controle.php?p1=y&".$pr."&cadastrarequipe=1");

    } 


    


?>