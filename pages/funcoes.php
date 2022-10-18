<?php
    include('conexao.php');
    
    function listarEquipes() {
        //NOME DA EQUIPE
        echo "<div class='col-md-12'>
                <label for='nome' class='form-label'>Escolha a equipe</label>
                <select id='equipes' name='id_equipe' class='form-select' aria-label='Default select example'>";
                            
                        include('conexao.php');
                        $sql_query = $mysqli->query("SELECT * from equipe");
                        $i=0;
                            while ($dados = $sql_query->fetch_assoc()) {
                            if ($dados['idEquipe']!="2") {
                                if ($i==0) {
                                    $i=1;
                                    echo "<option value='$dados[idEquipe]'> $dados[nome]</option>";
                                } else {
                                    echo "<option value='$dados[idEquipe]'> $dados[nome]</option>";
                                }
                                    
                        }
                    }
                    
                                    
        echo "</select>
        </div>";
        $mysqli->close();
    }

    function listarMembros ($id) {
        include('conexao.php');
        $sql_lista_membro_query = $mysqli->query("SELECT * from membros where Equipe_idEquipe = $id order by tipo desc") or die($mysqli->error);
        $quant = $sql_lista_membro_query->num_rows;
        
        echo "<table class='table table-striped'>
            <thead>
                <th>Nome</th>
                <th>Turma</th>
                <th>Matricula</th>
                <th>tipo</th>
                <th>Arquivo</th>";
                if ($quant==0) {
                    echo "<th><input type=submit disabled value='Deletar'></th>";
                } else {
                    echo "<th><input type=submit value='Deletar'></th>";
                }
                
            echo "</thead>
            <tbody>";
                
                
                $i=0;
                while ($dados = $sql_lista_membro_query->fetch_assoc()) {
                //ENDEREÇAMENTO ANTIGO <td><a href='membro.php?deletar= $dados[idMembro];'>Deletar<img src='../assets/Delete.svg' alt='deletar'></a></td>
                echo "<tbody>
                            <tr>
                                <td> $dados[nome]</td>
                                <td> $dados[turma]</td>
                                <td> $dados[matricula]</td>
                                <td> $dados[tipo]</td>
                                <td><a target=_blank href= '$dados[caminho]'>$dados[comprovante]</a></td>";
                                if ($i==0) {
                                    echo "<td><input type='radio' checked name=deletar_membro value= $dados[idMembro]></td>";
                                    $i=1;
                                } else {
                                    echo "<td><input type='radio' name=deletar_membro value= $dados[idMembro]></td>";
                                }
                            echo "</tr></tbody>";
                         
                        } 
                        
                echo "</tbody>
                </table>";

                $mysqli->close();
                
    }

    //Fora de uso
    function tablePontuacaoProvas() {
        echo "<table class='table table-bordered table-hover' style='background-color: #C2C2C2; border-color: #f0f0f0; border-radius: 15px;'>
                <thead>";
                    
                        include('conexao.php');
                        // talvez Mudar esse caminho
                        #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                        $sql_query = $mysqli->query("SELECT * from provas") or die($mysqli->error);
                        $i=0;
                        while ($dados = $sql_query->fetch_assoc()) { 
                            if ($i==0) {
                                $i=1;
                    
                                echo "<th>Nomes das Equipes;</th>
                                <th> $dados[nome]</th>";
                            } else {
                            echo "<th> $dados[nome]</th>";
                        }}
                        echo "<th>Total</th>
                </thead>
                <tbody>";
                        // talvez Mudar esse caminho
                        #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                        $sql_query = $mysqli->query("SELECT e.idEquipe, e.nome, sum(c.nota) as nota 
                        FROM equipe e, conquistas c WHERE e.idEquipe = c.Equipe_idEquipe 
                        group by e.nome order by nota desc") or die($mysqli->error);
                        while ($dados = $sql_query->fetch_assoc()) { 
                    
                            echo "<tr>";
                                if (!($dados['nome'] === 'fzao')) { 
                                    echo "<td>$dados[nome]</td>";

                                    //COLOCAR AS NOTAS
                                        $sql_query2 = $mysqli->query("SELECT equipe.nome as nome, conquistas.classificacao as class, conquistas.nota as nota, conquistas.Equipe_idEquipe as id, conquistas.Provas_idProva as p  from equipe, provas, conquistas where  
                                        provas.idProva=conquistas.Provas_idProva and equipe.idEquipe='$dados[idEquipe]' and conquistas.Equipe_idEquipe='$dados[idEquipe]' order by p") or die($mysqli->error);
                                        while ($dados2 = $sql_query2->fetch_assoc()) {

                                            echo "<td>$dados2[nota]</td>";
                                     } 
                                    
                                    //coleta o total de pontos de cada equipe
                                    /*$sql_query3 = $mysqli->query("SELECT conquistas.nota as nota, conquistas.Equipe_idEquipe as id   from equipe, provas, conquistas where  
                                        provas.idProva=conquistas.Provas_idProva and conquistas.Equipe_idEquipe='$dados[idEquipe]' and equipe.idEquipe='$dados[idEquipe]' order by nome") or die($mysqli->error);
                                     */    
                                    echo "<td>$dados[nota]</td>";
                                    } 
                            echo "</tr>";
                            
                        } exit;
                  
                   
                echo "</tbody>
        </table>";
    }

    function grupoPont() {
        //NOME DA EQUIPE
        echo "<div class='col-md-12'>
                <label for='grupo' class='form-label'>Escolha o grupo</label>
                <select id='grupo' name='grupo' class='form-select' aria-label='Default select example'>";
                            
                        include('conexao.php');
                        $sql_query = $mysqli->query("SELECT idpontuacao from pontuacao");
                        $i=0;
                            while ($dados = $sql_query->fetch_assoc()) {
                                echo "<option value='$dados[idpontuacao]'>Grupo $dados[idpontuacao]</option>";                 
                        }
                                    
        echo "</select>
        </div>";
        $mysqli->close();
    }

    //Fora de uso
    function tableProvaClass () {
        echo
        "<table class='gn-seletable'>
            <thead>";
                
                    include('conexao.php');
                    // talvez Mudar esse caminho
                    #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                    $sql_query = $mysqli->query("SELECT * from provas") or die($mysqli->error);
                    $i=0;
                    while ($dados = $sql_query->fetch_assoc()) { 
                        if ($i==0) {
                            

                            $i=1;
                        
                
                        echo "<th>Nomes das Equipes</th>
                    <th>$dados[nome]</th>";
                        } else {
                    echo "<th>$dados[nome]</th>";
                    }}
            echo "</thead>
                <tbody>";
                 
                        
                        // talvez Mudar esse caminho
                        #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                    $sql_query = $mysqli->query("SELECT * from equipe") or die($mysqli->error);
                    while ($dados = $sql_query->fetch_assoc()) { 
                
                        
                        echo "<tr> 
                            <td>$dados[nome]</td>";
                            
                            
                                $sql_query2 = $mysqli->query("SELECT equipe.nome as nome, conquistas.classificacao as class, conquistas.nota as nota, conquistas.Equipe_idEquipe as id   from equipe, provas, conquistas where  
                                provas.idProva=conquistas.Provas_idProva and conquistas.Equipe_idEquipe='$dados[idEquipe]' and equipe.idEquipe='$dados[idEquipe]' order by nome") or die($mysqli->error);
                                while ($dados2 = $sql_query2->fetch_assoc()) {

                            
                                    echo "<td>$dados2[nota]</td>";
                                }
                            echo "</tr>";
                        
                    } 
                    $mysqli->close();
                    exit;
            echo "</tbody>
       
        </table>";
    }


    function tableInfoProvas() {
        echo "<table class='table table-bordered table-hover' style='background-color: #C2C2C2; border-color: #f0f0f0; border-radius: 15px;'>
                <thead>";
                    
                        include('conexao.php');
                        // talvez Mudar esse caminho
                        #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                        $sql_query = $mysqli->query("SELECT * from provas") or die($mysqli->error);
                        
                        echo "<th>Nome</th>
                        <th>Local</th>
                        <th>Participantes</th>
                        <th>Grupo(Id_Pontuação)</th>
                        <th><input type='submit' name='deletar_prova' value='Deletar'></th>
                </thead>
                <tbody>";
                        // talvez Mudar esse caminho
                        #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                        while ($dados = $sql_query->fetch_assoc()) { 
                    
                            echo "<tr>
                                <td>$dados[nome]</td>
                                <td>$dados[local]</td>
                                <td>$dados[participantes]</td>
                                <td>$dados[pontuacao_idpontuacao]</td>
                                <td><input type='radio' name='deletar_prova' value='$dados[idProva]'></td>";
                        } 
                                    
                                    //coleta o total de pontos de cada equipe
                                    /*$sql_query3 = $mysqli->query("SELECT conquistas.nota as nota, conquistas.Equipe_idEquipe as id   from equipe, provas, conquistas where  
                                        provas.idProva=conquistas.Provas_idProva and conquistas.Equipe_idEquipe='$dados[idEquipe]' and equipe.idEquipe='$dados[idEquipe]' order by nome") or die($mysqli->error);
                                     */ 
                        "</tr>";                     
                                    
                echo "</tbody>
        </table>";
    } 
    
    //IMPRIME OS GRUPOS DE CLASSIFICACAO
    function imprimirGrupos() {
        
        $sql_query = $mysqli->query("SELECT * from pontuacao");
        $quant = $sql_query->num_rows;
        echo "<table class='table table-bordered table-hover' style='background-color: #C2C2C2; border-color: #f0f0f0; border-radius: 15px;'>
                <thead>";

                        echo "<th>Grupo</th>
                        <th>Primeiro</th>
                        <th>Segundo</th>
                        <th>Terceiro</th>
                        <th>Quarto</th>
                        <th>Quinto</th>
                        <th>Sexto</th>";
                        if ($quant==0) {
                            echo "<th><input type='submit' name='deletar_grupo' disabled value='Deletar Grupo'></th>";
                        } else {
                            echo "<th><input type='submit' name='deletar_grupo' value='Deletar Grupo'></th>";   
                        }
                echo "</thead>
                <tbody>";
                         
                        //IMPRIME OS VALORES/PONTUACOES NA TABELA
                        while ($dados = $sql_query->fetch_assoc()) { 
                    
                            echo "<tr>
                                <td>$dados[idpontuacao]</td>
                                <td>$dados[primeiro]</td>
                                <td>$dados[segundo]</td>
                                <td>$dados[terceiro]</td>
                                <td>$dados[quarto]</td>
                                <td>$dados[quinto]</td>
                                <td>$dados[sexto]</td>
                                <td><input type='radio' name='deletar_grupo' value='$dados[idpontuacao]'></td>";
                        } 
                                    
            
                echo "</tr>
                </tbody>
                </table>";
        


    }
?>