<?php
    include('../conexao.php');
    include('protecao.php');

    if (isset($_GET['p1'])) {

        if ($_GET['p1'] == 'y') {

            //DELETAR EQUIPE
            if (isset($_GET['deletarequipe'])) {
                $sql_query = $mysqli->query("SELECT idUsuario  from equipe e, usuario u where e.idEquipe=$_GET[deletarequipe] and 
                u.idUsuario=e.Usuario_idUsuario");
                $sql = $sql_query->fetch_assoc();
                $idU = $sql['idUsuario'];
                $idE = $_GET['deletarequipe'];
                
                if ($mysqli->query("DELETE from conquistas where Equipe_idEquipe = '$idE'") or die("erro ao acessar o banco de dados on line 11")) {
                    if ($mysqli->query("DELETE from membros where Equipe_idEquipe = '$idE'") or die("erro ao acessar o banco de dados on line 11")) { 
                        if ($mysqli->query("DELETE from equipe where Usuario_idUsuario = '$idU'") or die("erro ao acessar o banco de dados on line 11")) {
                            if ($mysqli->query("DELETE from usuario where idUsuario = '$idU'") or die("erro ao acessar o banco de dados on line 11")) {
                                header("location: deletarequipe.php");
                            } 
                        }
                    } 
                }

            //DELETAR MEMBRO
            } else if (isset($_GET['deletarmembro'])) {
                $id_deletar = intval($_GET['deletarmembro']);
                $sql_lista_membro_query = $mysqli->query("SELECT * from membros where idMembro = '$id_deletar'") or die($mysqli->error);
                $dados = $sql_lista_membro_query->fetch_assoc();

                if ($dados['caminho'] == '#') {
                    if ($mysqli->query("DELETE from membros where idMembro = '$id_deletar'") or die($mysqli->error)) {
                        $mysqli->query("UPDATE equipe SET numero_part = numero_part-1 where idEquipe = '$dados[Equipe_idEquipe]'");
                        header("location: ../listamembros.php");
                    }
                } else {
                    if (unlink("../".$dados['caminho'])) {

                        if ($mysqli->query("DELETE from membros where idMembro = '$id_deletar'") or die($mysqli->error)) {
                            $mysqli->query("UPDATE equipe SET numero_part = numero_part-1 where idEquipe = '$dados[Equipe_idEquipe]'");
                            header("location: ../listamembros.php");
                        }
                    }
                }
                
            //CADASTRAR PROVAS
            } else if (isset($_GET['cadastrarprova'])) {
                if ($_GET['cadastrarprova']==1) {
                    $nome = $_GET['nome_prova'];
                    $local = $_GET['local_prova'];
                    $part = $_GET['part_prova'];
                    $idgrupo = $_GET['grupo_prova'];

                    $sql_query = $mysqli->query("SELECT nome from provas");
                    $i = 0;

                    //VERIFICANDO SE HA OUTRA PROVA COM O MESMO NOME
                    while ($dados=$sql_query->fetch_assoc()) {
                        if ($dados['nome'] == $nome) {
                            $i+=1;
                            die ("Nome informado já existe, selecione outro nome <a href='gerenciarprovas.php'>Tentar novamente</a>");
                        }
                    }

                    //INSERINDO OS DADOS NO BANCO DE DADOS
                    if ($i==0) {
                        if ($mysqli->query("INSERT INTO provas (nome, local, participantes, pontuacao_idpontuacao)  VALUES ('$nome', '$local', '$part', '$idgrupo')")) {
                            $sql_query = $mysqli->query("SELECT e.idEquipe, p.idProva from equipe e, provas p where p.nome = '$nome' order by e.idEquipe");

                            //ESTRUTURA QUE FAZ UMA INSERSAO EM CONQUISTA POR EQUIPE CADASTRADA
                            while ($dados=$sql_query->fetch_assoc()) {
                                if ($mysqli->query("INSERT into conquistas (Provas_idProva, Equipe_idEquipe, classificacao, nota) values ('$dados[idProva]', '$dados[idEquipe]', '', 0)")) {
                                    header("location:gerenciarprovas.php");
                                }
                           }
                            
                        }
                    }

                } else {
                    die("acesso negado");
                }

            //DELETAR PROVA
            } else if (isset($_GET['deletarprova'])) {
                if ($_GET['deletar']==2) {
                    $idP = $_GET['deletarprova'];
                    
                    if ($mysqli->query("DELETE from conquistas where Provas_idProva='$idP'") or die("Erro ao deletar prova de conquistas".$mysqli->error)) {
                        if  ($mysqli->query("DELETE from provas where idProva='$idP'") or die("Erro ao deletar prova de provas".$mysqli->error)) {
                            header("location:gerenciarprovas.php");
                        }
                    }

                } else {
                    die("Acesso negado");
                }
            }

        


        } else {
            echo "acesso negado";
        }
    } else {
        echo "acesso negado"; 
    }

?>