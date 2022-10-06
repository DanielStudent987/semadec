<?php
    include('../conexao.php');
    include('protecao.php');

    if (isset($_GET['p1'])) {

        if ($_GET['p1'] == 'y') {


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
                
            }

        


        } else {
            echo "acesso negado";
        }
    } else {
        echo "acesso negado"; 
    }

?>