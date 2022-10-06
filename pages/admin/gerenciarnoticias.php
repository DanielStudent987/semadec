<?php 
include('protecao.php');
include('../conexao.php');

if (isset($_GET['deletar'])) {
        
    $id_deletar = intval($_GET['deletar']);
    $sql_query = $mysqli->query("SELECT * from arquivo where idArquivo = '$id_deletar'") or die($mysqli->error);
    $dados = $sql_query->fetch_assoc();

    if ($dados['tipo']=='link') {
        if ($mysqli->query("DELETE from arquivo where idArquivo = '$id_deletar'") or die($mysqli->error)) {
            header("location: gerenciarnoticias.php");
        }
    } else {
        if (unlink('../'.$dados['caminho'])) {

            if ($mysqli->query("DELETE from arquivo where idArquivo = '$id_deletar'") or die($mysqli->error)) {
                header("location: gerenciarnoticias.php");
            }
        }
    }

}

if (isset($_POST['tipo']) || isset($_POST['nome']) || isset($_POST['link']) || isset($_POST['file'])) {
    //echo empty($_FILES['arquivo']['name']);
    //echo "link ".empty($_POST['link']);
    if (strlen($_POST['tipo']) == 0) {
        echo "Selecione um tipo.";
    } else if (strlen($_POST['nome']) == 0) {
        echo "Preencha o nome do arquivo ou link.";
    } else if (empty($_POST['link']) && !($_POST['tipo'] == "file")) {
        echo "Informe o link.";
    } else if (empty($_FILES['arquivo']['name']) && !($_POST['tipo'] == "link")) {
        echo "Insira um arquivo.";
    } else {
        
        $tipo = $_POST['tipo'];
        $nome = $_POST['nome'];

        if (!empty($_POST['link'])) {
            $link = $_POST['link'];
            
            $sql_query = $mysqli->query("INSERT into arquivo (nome, caminho, tipo) values('$nome', '$link', '$tipo')") or die($mysqli->error);

        } else {
            $arquivo = $_FILES['arquivo'];
            $nome_arquivo = $arquivo['name'];
            $novo_nome_arquivo = uniqid();
            $ext = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

            //ESSE CAMINHO SEGUE UMA LOGICA DIFERENTE DA FORMA QUE OCORRE NA PAGE MEMBRO
            //MAS ISSO NAO INTERFERE, POR HORA. AO MENOS NAO EM MINHA MAQUINA
            $caminho_arquivo = '../arquivos/'.$novo_nome_arquivo . '.' . $ext;
            
            if($arquivo['size'] > 2097152) {
                die('Arquivo muito grande, max: 2MB');
            }

            if (move_uploaded_file($arquivo['tmp_name'], '../'.$caminho_arquivo)) {
                // Insere os dados no banco
                $sql = "INSERT INTO arquivo (nome, caminho, tipo) values ('$nome', '$caminho_arquivo', '$tipo')";
                $mysqli->query($sql) or die($mysqli->error);
                   
                $mysqli->close();
                header('location: gerenciarnoticias.php');
                exit;
            }else{
                echo 'Erro ao salvar arquivo';
            }


        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tópicos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="gerenciarnoticias.css">

    <script>
        function disable() {
            document.getElementById('file').disabled=true;
            document.getElementById('link').disabled=false;
            
        }
        function active() {
            document.getElementById('file').disabled=false;
            document.getElementById('link').disabled=true;
        }
        function arq() {
            document.getElementById('link').disabled=true;
            document.getElementById('Radios2').checked=true;
        }
        
    </script>
</head>
<body>
    <header class="menu"> 
        <img src="../../assets/Laranjinha.png" alt="Logo">
        <div class="tittle">
            <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
        </div>
        <a href="homeadmin.php" ><button type="button" >
            <img src="../../assets/exit.svg" id="out" alt="sair">
        </button></a>
    </header>

    <div class="conteiner">
        <div class="pose"><div class="in"><h3>Adicionar Notícias</h3></div></div>
        <div class="form-field">
            <!--MUDAR O ACTION DEPOIS DE MUDAR O NOME DA PAGE-->
            <form class="row g-3 align-items-center" action="gerenciarnoticias.php" enctype="multipart/form-data" method="post">
                
                <div class="caixa row g-3 align-items-center">
                    <div class="form-check">
                        <label for="" class="form-label">Informe o tipo da notícia:</label><br>

                        <input class="form-check-input" type="radio" name="tipo" id="Radios1" onfocus="disable()"  value="link" checked>
                            <label class="form-check-label" for="Radios1">
                                Link
                            </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="Radios2" onfocus="active()" value="file" >
                        <label class="form-check-label" for="Radios2">
                            Arquivo
                        </label>
                    </div>
                    <!--NOME DA NOTICIA-->
                    <div class="col-md-6">
                        <label for="input" class="form-label">Nome</label>  
                        <input type='text' aria-label="Default select example" class="form-control" maxlength="149" id="input" name="nome" placeholder="Informe o título da notícia">
                        
                        </div>
                        
                        <!--Link SELECIONADo-->
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Link:</label>
                            <input type="text" class="form-control" onfocus="disable()" maxlength="300"  name="link" id="link" placeholder="informe o link">
                        </div>
                        
                        
                        <!--ARQUIVO-->
                        <div class="col-12">
                            <label for="file" class="form-label" >Arquivo:</label>
                            <input type="file" class="form-control" id="file" name="arquivo" onfocus="arq()"  placeholder="" >
                        </div> 
                                                
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </form>
        </div> 
        
        <div class="container">
            
                <div class="scroll">
                    <div class="table-responsive">
                    
                    <table class="table table-bordered table-hover" style="background-color: #C2C2C2; border-color: #f0f0f0; border-radius: 15px;">
                        <thead>
                        
                            <th>Nome</th>
                            <th>Caminho</th>
                            <th>Tipo</th>
                            <th>Arquivo</th>
                            <th>Deletar</th>
                        </thead>
                    
                        <tbody>
                            <?php 
                                include('../conexao.php');
                                //Mudar esse caminho e ordenar de forma decrescente igual ta ai
                                $sql_query = $mysqli->query("SELECT * from arquivo order by idArquivo desc") or die($mysqli->error);
                                #$sql_query = $mysqli->query("SELECT * from membros order by idMembro desc") or die($mysqli->error);
                                
                                while ($dados = $sql_query->fetch_assoc()) { 
                                    $caminhoArq = ($dados['tipo']=='link') ? $dados['caminho'] : '../'.$dados['caminho'];
                            ?>
                            <tr>
                                <!--Modificar o banco: add tipo na tabela arquivo-->
                                <td><?php echo $dados['nome']; ?></td>
                                <td><?php echo $dados['caminho']; ?></td>
                                <td><?php echo $dados['tipo']; ?></td>
                                <td><a target="_blank" href="<?php echo $caminhoArq; ?>"><?php echo $dados['nome'] ?></a></td>
                                <td><a href="gerenciarnoticias.php?deletar=<?php echo $dados['idArquivo']; ?>">Deletar<img src="../../assets/Delete.svg" alt="deletar"></a></td>
                            </tr>
                            <?php 
                                }
                                $mysqli->close();
                                exit;
                            ?>
                        </tbody>
                    </table>
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