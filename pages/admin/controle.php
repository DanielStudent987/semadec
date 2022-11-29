<?php
    
    include('protecao.php');

    if (isset($_GET['p1'])) {

        if ($_GET['p1'] == 'y') {

            //DELETAR EQUIPE
            if (isset($_GET['deletarequipe'])) {
                include('../conexao.php');

                $sql_query = $mysqli->query("SELECT idUsuario  from equipe e, usuario u where e.idEquipe=$_GET[deletarequipe] and 
                u.idUsuario=e.Usuario_idUsuario");
                $sql = $sql_query->fetch_assoc();
                $idU = $sql['idUsuario'];
                $idE = $_GET['deletarequipe'];
                
                /*if ($mysqli->query("DELETE from conquistas where Equipe_idEquipe = '$idE'") or die("erro ao acessar o banco de dados on line 11")) {
                    if ($mysqli->query("DELETE from membros where Equipe_idEquipe = '$idE'") or die("erro ao acessar o banco de dados on line 11")) { 
                        if ($mysqli->query("DELETE from equipe where Usuario_idUsuario = '$idU'") or die("erro ao acessar o banco de dados on line 11")) {
                            if ($mysqli->query("DELETE from usuario where idUsuario = '$idU'") or die("erro ao acessar o banco de dados on line 11")) {
                                header("location: deletarequipe.php");
                            } 
                        }
                    } 
                }*/

                if ($stmt = $mysqli->prepare("DELETE from conquistas where Equipe_idEquipe=?")) {
                    //vincular valores as interrogacoes (?)
                    mysqli_stmt_bind_param($stmt,'i',$idE);
                    //efetiva e executa a SQL no banco, i.e., insere
                    $status = mysqli_stmt_execute($stmt);
                    ///verifica se deu algo de errado:
                    if ($status === false) {
                        trigger_error($stmt->error, E_USER_ERROR);
                      }

                    if ($stmt = $mysqli->prepare("DELETE from membros where Equipe_idEquipe=?")) {
                        mysqli_stmt_bind_param($stmt,'i',$idE);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        ///verifica se deu algo de errado:
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }

                        if ($stmt = $mysqli->prepare("DELETE from equipe where Usuario_idUsuario=?")) {
                            mysqli_stmt_bind_param($stmt,'i',$idU);
                            //efetiva e executa a SQL no banco, i.e., insere
                            $status = mysqli_stmt_execute($stmt);
                            ///verifica se deu algo de errado:
                            if ($status === false) {
                                trigger_error($stmt->error, E_USER_ERROR);
                            }
                            
                            if ($stmt = $mysqli->prepare("DELETE from usuario where idUsuario=?")) {
                                mysqli_stmt_bind_param($stmt,'i',$idU);
                                //efetiva e executa a SQL no banco, i.e., insere
                                $status = mysqli_stmt_execute($stmt);
                                ///verifica se deu algo de errado:
                                if ($status === false) {
                                    trigger_error($stmt->error, E_USER_ERROR);
                                }
                                mysqli_stmt_close($stmt);
                                
                            }
                            
                        }
                    }
                    
                    //fecha o statement
                    $mysqli->close();
                    header("location: deletarequipe.php");
                }

                $mysqli->close();

            //DELETAR MEMBRO
            } else if (isset($_GET['deletarmembro'])) {
                include('../conexao.php');

                $id_deletar = intval($_GET['deletarmembro']);
                $sql_lista_membro_query = $mysqli->query("SELECT * from membros where idMembro = '$id_deletar'") or die($mysqli->error);
                $dados = $sql_lista_membro_query->fetch_assoc();

                if ($dados['caminho'] == '#') {
                    /*if ($mysqli->query("DELETE from membros where idMembro = '$id_deletar'") or die($mysqli->error)) {
                        $mysqli->query("UPDATE equipe SET numero_part = numero_part-1 where idEquipe = '$dados[Equipe_idEquipe]'");
                        header("location: ../listamembros.php");
                    }*/
                    if ($stmt = $mysqli->prepare("DELETE from membros where idMembro=?")) {
                        mysqli_stmt_bind_param($stmt,'i',$id_deletar);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        ///verifica se deu algo de errado:
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }
                        
                        $sql_query = $mysqli->query("SELECT * from equipe where idEquipe = '$dados[Equipe_idEquipe]'") or die($mysqli->error);
                        $dados1 = $sql_query->fetch_assoc();
                        if ($stmt = $mysqli->prepare("UPDATE equipe set numero_part=? where idEquipe=?")) {
                            $num = $dados1['numero_part']-1;
                            mysqli_stmt_bind_param($stmt,'ii', $num,$dados1['idEquipe']);
                            //efetiva e executa a SQL no banco, i.e., insere
                            $status = mysqli_stmt_execute($stmt);
                            ///verifica se deu algo de errado:
                            if ($status === false) {
                                trigger_error($stmt->error, E_USER_ERROR);
                            }
                            mysqli_stmt_close($stmt);
                            
                        }  
                        
                        $mysqli->close();
                        header("location: ../listamembros.php");

                    }
                } else {
                    if (unlink("../".$dados['caminho'])) {
                        /*if ($mysqli->query("DELETE from membros where idMembro = '$id_deletar'") or die($mysqli->error)) {
                            $mysqli->query("UPDATE equipe SET numero_part = numero_part-1 where idEquipe = '$dados[Equipe_idEquipe]'");
                            header("location: ../listamembros.php");
                        }*/

                        if ($stmt = $mysqli->prepare("DELETE from membros where idMembro=?")) {
                            mysqli_stmt_bind_param($stmt,'i',$id_deletar);
                            //efetiva e executa a SQL no banco, i.e., insere
                            $status = mysqli_stmt_execute($stmt);
                            ///verifica se deu algo de errado:
                            if ($status === false) {
                                trigger_error($stmt->error, E_USER_ERROR);
                            }

                            $sql_query = $mysqli->query("SELECT * from equipe where idEquipe = '$dados[Equipe_idEquipe]'") or die($mysqli->error);
                            $dados1 = $sql_query->fetch_assoc();
                            if ($stmt = $mysqli->prepare("UPDATE equipe set numero_part=? where idEquipe=?")) {
                                $num = $dados1['numero_part']-1;
                                mysqli_stmt_bind_param($stmt,'ii',$num,$dados1['idEquipe']);
                                //efetiva e executa a SQL no banco, i.e., insere
                                $status = mysqli_stmt_execute($stmt);
                                ///verifica se deu algo de errado:
                                if ($status === false) {
                                    trigger_error($stmt->error, E_USER_ERROR);
                                }
                                mysqli_stmt_close($stmt);
                                
                            }  
                        }

                        $mysqli->close();
                        header("location: ../listamembros.php");
                    }
                }
                
            //CADASTRAR PROVAS
            } else if (isset($_GET['cadastrarprova'])) {
                include('../conexao.php');
                

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
                        

                        if ($stmt = $mysqli->prepare("INSERT INTO provas (nome, local, participantes, pontuacao_idpontuacao)  VALUES (?, ?, ?, ?)")) {
                            //vincular valores as interrogacoes (?)
                            mysqli_stmt_bind_param($stmt,'ssii',$nome, $local, $part, $idgrupo);
                            //efetiva e executa a SQL no banco, i.e., insere
                            $status = mysqli_stmt_execute($stmt);
                            if ($status === false) {
                                trigger_error($stmt->error, E_USER_ERROR);
                              }
                            
                            $sql_query = $mysqli->query("SELECT e.idEquipe, p.idProva from equipe e, provas p where p.nome = '$nome' order by e.idEquipe");

                            while ($dados=$sql_query->fetch_assoc()) {
                                if ($stmt = $mysqli->prepare("INSERT into conquistas (Provas_idProva, Equipe_idEquipe, classificacao, nota) values (?, ?, ?, ?)")) {
                                    //vincular valores as interrogacoes (?)
                                    $zero = 0;
                                    $string = '';
                                    mysqli_stmt_bind_param($stmt,'iisi',$dados['idProva'], $dados['idEquipe'], $string, $zero);
                                    //efetiva e executa a SQL no banco, i.e., insere
                                    $status = mysqli_stmt_execute($stmt);
                                    if ($status === false) {
                                        trigger_error($stmt->error, E_USER_ERROR);
                                      }
                                      mysqli_stmt_close($stmt);
                                }

                                /*if ($mysqli->query("INSERT into conquistas (Provas_idProva, Equipe_idEquipe, classificacao, nota) values ('$dados[idProva]', '$dados[idEquipe]', '', 0)")) {
                                    header("location:gerenciarprovas.php");
                                }*/
                            }
                            
                            //fecha o statement
                            $mysqli->close(); 
                            header("location:gerenciarprovas.php");
                        }

                        /*if ($mysqli->query("INSERT INTO provas (nome, local, participantes, pontuacao_idpontuacao)  VALUES ('$nome', '$local', '$part', '$idgrupo')")) {
                            $sql_query = $mysqli->query("SELECT e.idEquipe, p.idProva from equipe e, provas p where p.nome = '$nome' order by e.idEquipe");

                            //ESTRUTURA QUE FAZ UMA INSERSAO EM CONQUISTA POR EQUIPE CADASTRADA
                            while ($dados=$sql_query->fetch_assoc()) {
                                if ($mysqli->query("INSERT into conquistas (Provas_idProva, Equipe_idEquipe, classificacao, nota) values ('$dados[idProva]', '$dados[idEquipe]', '', 0)")) {
                                    header("location:gerenciarprovas.php");
                                }
                           }
                            
                        }*/
                    }

                } else {
                    die("acesso negado");
                }

            //DELETAR PROVA
            } else if (isset($_GET['deletarprova'])) {
                if ($_GET['deletar']==2) {
                    include('../conexao.php');

                    $idP = $_GET['deletarprova'];
                    
                    /*if ($mysqli->query("DELETE from conquistas where Provas_idProva='$idP'") or die("Erro ao deletar prova de conquistas".$mysqli->error)) {
                        if  ($mysqli->query("DELETE from provas where idProva='$idP'") or die("Erro ao deletar prova de provas".$mysqli->error)) {
                            header("location:gerenciarprovas.php");

                        }

                    }*/

                    if ($stmt = $mysqli->prepare("DELETE from conquistas where Provas_idProva=?")) {
                        mysqli_stmt_bind_param($stmt,'i',$idP);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        ///verifica se deu algo de errado:
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }
                        
            
                        if ($stmt = $mysqli->prepare("DELETE from provas where idProva=?")) {
                            
                            mysqli_stmt_bind_param($stmt,'i', $idP);
                            //efetiva e executa a SQL no banco, i.e., insere
                            $status = mysqli_stmt_execute($stmt);
                            ///verifica se deu algo de errado:
                            if ($status === false) {
                                trigger_error($stmt->error, E_USER_ERROR);
                            }
                            mysqli_stmt_close($stmt);
                            
                        }  
                    }

                    $mysqli->close();
                    header("location:gerenciarprovas.php");

                } else {
                    die("Acesso negado");
                }
            } else if (isset($_GET["deletargrupo"])) {
                if ($_GET["grupo"]==1) {
                    include("../conexao.php");

                    $idG = $_GET["deletargrupo"];

                    if ($stmt = $mysqli->prepare("DELETE from provas where pontuacao_idpontuacao=?")) {
                        mysqli_stmt_bind_param($stmt,'i',$idG);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        ///verifica se deu algo de errado:
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }

                        if ($stmt = $mysqli->prepare("DELETE from pontuacao where idpontuacao=?")) {
                            mysqli_stmt_bind_param($stmt,'i',$idG);
                            //efetiva e executa a SQL no banco, i.e., insere
                            $status = mysqli_stmt_execute($stmt);
                            ///verifica se deu algo de errado:
                            if ($status === false) {
                                trigger_error($stmt->error, E_USER_ERROR);
                            }
                            mysqli_stmt_close($stmt);
                        }
                        
                    }

                    $mysqli->close();
                    header("location:gerenciarpontuacao.php");
                } else {
                    die("acesso negado <a href='gerenciarpontuacao.php'>Retornar para pagina de gerenciamento</a>");
                }
                //salvar grupo
            } else if (isset($_GET["cadastrargrupo"])) {
                if ($_GET["cadastrargrupo"]==1) {
                    $primeiro = $_GET["primeiro"];
                    $segundo = $_GET["segundo"];
                    $terceiro = $_GET["terceiro"];
                    $quarto = $_GET["quarto"];
                    $quinto = $_GET["quinto"];
                    $sexto = $_GET["sexto"];

                    include("../conexao.php");

                    if ($stmt = $mysqli->prepare("INSERT INTO pontuacao (primeiro, segundo, terceiro, quarto, quinto, sexto)  VALUES (?, ?, ?, ?, ?, ?)")) {
                        //vincular valores as interrogacoes (?)
                        mysqli_stmt_bind_param($stmt,'iiiiii',$primeiro, $segundo, $terceiro, $quarto, $quinto, $sexto);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }

                        mysqli_stmt_close($stmt);
                    }

                    $mysqli->close();
                    header("location:gerenciarpontuacao.php");

                }

            }


        } else {
            echo "acesso negado";
        }
    } else {
        echo "acesso negado"; 
    }

?>