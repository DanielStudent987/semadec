<?php
    include('protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="homeadmin.css">
    <title>Home Admin</title>
</head>
<body>
    <header class="menu"> 
        <img src="../../assets/Laranjinha.png" alt="Logo">
        <div class="tittle">
            <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
        </div>
        <a href="../logout.php" ><button type="button" >
            <img src="../../assets/exit.svg" id="out" alt="sair">
        </button></a>
    </header>
    <div class="container">
        <div class="row r-c">
            <div class="col noticia">
                <aside class="noticias">
                    <h2>Tabela de Funções</h2>
                    <div class="scroll">
                    <table class="gn-seletable">
                        <tbody>
                            <tr>
                                <td><a href="notas.php">Cadastrar Nota</a></td>
                            </tr>
                            <tr><td><a href="gerenciarnoticias.php">Adicionar Notícia</a></td><tr>
                            <tr>
                                <td><a href="../cadastro.php">Cadastrar equipe</a></td>
                            </tr>
                            <tr>
                                <td><a href="../membro.php">Cadastrar membros</a></td>
                            </tr>
                            <tr>
                                <td><a href="../listamembros.php">Lista de membros</a></td>
                            </tr>
                            <tr>
                                <td><a href="deletarequipe.php">Deletar equipes</a></td>
                            </tr>
                            <tr>
                                <td><a href="gerenciarprovas.php">Gerenciar provas</a></td>
                            </tr>
                            <tr>
                                <td><a href="gerenciarpontuacao.php">Gerenciar Pontuações</a></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </aside>
            </div>
            <div class="col member">
                <div class="col memb">
                    <div class="membros">
                        <div class="buttons">
                            <h2>
                                Documentos
                            </h2>
                        </div>
                        <p>Fora de funcinamento</p>
                        <button id="addButton">
                            Adicinar documento
                            <img src="../assets/add.svg" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gray text-center text-white rodape" style="background-color:#d8cfcf;">
        
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                <ul class="list-unstyled mb-0 links">
                    <li>
                    <a href="https://portal.ifrn.edu.br/campus/novacruz" target="_blank" class="text-white">IFRN - Nova Cruz</a>
                    </li>
                    <li>
                    <a target="_blank" href="https://www.instagram.com/semadecifnc/" role="button"><img class="images" src="../../assets/insta-logo-500x500.png" alt=""></a>
                    </li>
                </ul>
        </div>
        <!-- Copyright -->

    </footer>
</body>
</html>