<?php
    include "inc/comeco_html.inc";
    include "inc/cabecalho.inc";
    if(empty($_POST)){
        include "inc/cabecalho_conexao.inc";

        $pront = $_GET['pront'];

        $SQL = "SELECT * FROM livro WHERE id = $pront";
		// Executa o comando SQL
		$dados_recuperados = mysqli_query($con, $SQL);

        if(mysqli_num_rows($dados_recuperados) > 0){
            while( ($resultado = mysqli_fetch_array($dados_recuperados)) != null) {
                $nome = $resultado[1];
                $autor = $resultado[2];
                $editora = $resultado[3];
                $ano = $resultado[4];
                $genero = $resultado[5];
                $preco = $resultado[6];
            }

            echo'<form action="editar_livro.php" method="POST">
                    <center>
                        <h3 class="transf">Informe os dados baixo:</h3>
                    </center>
                    <div class="container alinhar">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome_edit">Altere o nome do livro:</label>
                                <input type="text" class="form-control" name="nome_edit" id="nome_edit" value="'.$nome.'"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome_autor_edit">Altere o nome do autor:</label>
                                <input type="text" class="form-control" name="nome_autor_edit" id="nome_autor_edit" value="'.$autor.'"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editora_edit">Altere a editora:</label>
                                <input type="text" class="form-control" name="editora_edit" id="editora_edit" value="'.$editora.'"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ano_edit">Altere o ano:</label>
                                <input type="number" class="form-control" name="ano_edit" id="ano_edit" value="'.$ano.'"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="genero_edit">Altere o gênero:</label>
                                <input type="text" class="form-control" name="genero_edit" id="genero_edit" value="'.$genero.'"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="preco_edit">Altere o preço:</label>
                                <input type="number" step="0.01" class="form-control" name="preco_edit" id="preco_edit" value="'.$preco.'"/>
                            </div>
                        </div>
                        <input type=hidden name="id" value= "'.$pront.'"/>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                        <a class="btn btn-primary" href="consulta_livro.php" role="button">Voltar</a>
                    </div>
                </form>';
        }
    }else{
        $nome_edit = $_POST['nome_edit'];
        $nome_autor_edit = $_POST['nome_autor_edit'];
        $editora_edit = $_POST['editora_edit'];
        $ano_edit = $_POST['ano_edit'];
        $genero_edit = $_POST['genero_edit'];
        $preco_edit = $_POST['preco_edit'];
        $id = $_POST['id'];
                
        include "inc/cabecalho_conexao.inc";
                
        $SQL = "UPDATE livro SET nome='$nome_edit', autor='$nome_autor_edit', editora='$editora_edit', ano='$ano_edit', genero='$genero_edit', preco='$preco_edit' WHERE id=$id";

        echo'<center><h2 class="">Livro alterado com sucesso!<h2>';
        echo'<a class=" btn btn-primary transf_2 " href="consulta_livro.php" role="button">Voltar para o consultar</a>';
        
        include "inc/rodape_conexao.inc";

        echo'</br><center><img src="img/feliz.png" width="270" height="240"></img></center>';
    }
    include "inc/rodape.inc";
?>