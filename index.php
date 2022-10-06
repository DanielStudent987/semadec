<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>SEMADEC</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    <header class="banner">
        <img src="assets/Laranjinha.png" alt="">
        <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
        <img src="assets/Roxinha.png" alt="">
    </header>
    <div class="container">
        <div class="row">

            <div class="col ui">
                <div class="col log">
                    <div class="login">
                        <button>
                            <a href="pages/login.php">Login</a><!--<img src="assets/login.svg" id="loginimg" alt="">-->
                            <a href="pages/pontuacao.php">Classificacao</a>
                        </button> 
                    </div>
                </div>
                <div class="col log">
                    <div class="col sec">
                        <article class="semadec">
                            <div>
                                <h1>O que é a Semadec?</h1>
                            </div>
                                
                            <div class="scroll">
                                <table class="gn-seletable2">
                                    
                                    <tbody>
                                        <tr> 
                                            <td>
                                                <p>A Semana de Artes, Desportos e Cultura (SEMADEC) é um dos eventos do IFRN com 
                                                periodicidade anual que compreende atividades desportivas
                                                 e culturais, as quais são consideradas provas com pontuações diferentes. </p>
                                                <p> O somatório dos pontos obtidos em todas as provas possibilita a classificação e a premiação 
                                                    das equipes com maior pontuação. Com o tema “MULHERES QUE INSPIRAM”, a edição de 2022 tem 
                                                    como objetivo trazer à tona o protagonismo de mulheres em suas respectivas áreas de atuação: Esportes; Movimentos Sociais; Empreendedorismo; Ciência e Tecnologia; Artes Cênicas; Artes Plásticas; Literatura; Música. 
                                                    Não fique fora dessa! Monte já sua equipe e venha participar do evento mais aguardado do ano!!</p>
                                                </p>
                                                
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                                
                            
                        </article>
                    </div>
                </div>
            </div>

            <div class="col">
                
                <aside class="noticias">
                    <div class="not-banner">
                        <img src="assets/Verdinha.png" alt="">
                        <h3>Notícias</h3>
                        
                    </div>
                    <div class="scroll2">
                    <table class="gn-seletable">
                        <tbody>
                        <?php 
                            include('pages/conexao.php');
                            // talvez Mudar esse caminho
                            $sql_query = $mysqli->query("SELECT * from arquivo order by idArquivo desc") or die($mysqli->error);
                            #$sql_query = $mysqli->query("SELECT * from membros") or die($mysqli->error);
                            while ($dados = $sql_query->fetch_assoc()) { 
                                $caminhoArq = ($dados['tipo']=='link') ? $dados['caminho'] : 'arquivos/'.$dados['caminho'];
                        ?>
                            <tr> 
                                <!--Modificar o banco: add tipo na tabela arquivo-->
                                 
                                <td><a target="_blank" href="<?php echo $caminhoArq; ?>"><?php echo $dados['nome']; ?></a></td>
                            </tr>
                        <?php } exit; ?>    
                    </tbody>
                    </table>
                    </div>
                </aside>

                
            </div>
        </div>
    </div>
        
    <!--<footer class="site-footer">
        <div class="row">
            <div class="col">
                <a href="#">Informar erro</a>
            </div>
            <div class="col">
                <a>IFRN-Nova Cruz</a>
            </div>
            <div class="col">
                <a href="#">Sobre o projeto</a>    
            </div>
            <div class="col">
                <a href="https://instagram.com/semadecifnc?igshid=YmMyMTA2M2Y=" target="_blank"><img src="assets/insta-logo-500x500.png" alt=""></a>    
            </div>
        </div>
        
     Footer -->
    <footer class="bg-gray text-center text-white rodape" style="background-color:#d8cfcf;">
        <!-- Grid container -->
        <!--<div class="container p-4">-->

            <!-- Section: Social media -->
            <!--<section class="mb-4 sec">-->
            <!-- Facebook 
            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

             Twitter 
            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>

            Google 
            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i class="fab fa-google"></i></a>
            -->
            <!-- Instagram -->
            

            <!-- Linkedin 
            <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
             Github 
            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fab fa-github"></i></a>
            -->
            <!--</section>-->
            <!-- Section: Social media -->



            <!-- Section: Text -->
            <!--<section class="mb-4">
            <p>
                
            </p>
            </section>-->
            <!-- Section: Text -->


            <!-- Section: Links -->
            <!--<section class="">-->
            <!--Grid row-->
             <!--<div class="row r">-->

                <!--Grid column-->
                <!--<div class="col-lg-3 col-md-6 mb-4 mb-md-0 centered divfooter">
                <h5 class="text-uppercase"></h5>

                
                </div>-->
                <!--Grid column-->
                
                <!--Grid column-->
             <!--</div>-->
            <!--Grid row-->
             <!--</section>-->
            <!-- Section: Links -->

        <!--</div>-->
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                <ul class="list-unstyled mb-0 links">
                    <li>
                    <a href="https://portal.ifrn.edu.br/campus/novacruz" target="_blank" class="text-white">IFRN - Nova Cruz</a>
                    </li>
                    <li>
                    <a target="_blank" href="https://www.instagram.com/semadecifnc/" role="button"><img class="images" src="assets/insta-logo-500x500.png" alt=""></a>
                    </li>
                </ul>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->


</body>
</html>