<?php
    include "inc/comeco_html.inc";
    include "inc/cabecalho.inc";

    if(empty($_POST)){
        include "inc/cabecalho_conexao.inc";
        include "inc/ini_cadastro_livro.inc";
    }else{
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $ano = $_POST['ano'];
        $genero = $_POST['genero'];
        $preco = $_POST['preco'];
        
        //Abrindo conexão com o BD
        include "inc/cabecalho_conexao.inc";
        
        $SQL = "INSERT INTO livro (nome, autor, editora, ano, genero, preco) 
                VALUE ('$nome', '$autor', '$editora', '$ano', '$genero', '$preco')";

        echo'<center><h2 class="">Livro cadastrado com sucesso!<h2>';
        echo'<a class=" btn btn-primary transf_2 " href="cadastro_livro.php" role="button">Cadastrar outro livro.</a>';
        
        include "inc/rodape_conexao.inc";

        echo'</br><center><img src="img/feliz.png" width="270" height="240"></img></center>';
    }
    include "inc/rodape.inc";
    include "inc/fim_html.inc";
?>