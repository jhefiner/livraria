<?php
    include "inc/comeco_html.inc";
    include "inc/cabecalho.inc";
	if(empty($_POST)){
		include 'inc/formulario.inc';
	}else{
		include "inc/cabecalho_conexao.inc";
		$nome = $_POST['nome'];
		$SQL = "SELECT * FROM livro WHERE nome = '$nome'";	
		// Executa o comando SQL
		$dados_recuperados = mysqli_query($con, $SQL);
        if(mysqli_num_rows($dados_recuperados) > 0){

            echo'<div class="container tabela">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Editora</th>
                            <th scope="col">Ano</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Preço</th>
                            <th colspan="2">Operações</th>
                            </tr>
                        </thead>';
            while( ($resultado = mysqli_fetch_array($dados_recuperados)) != null) {
				echo '<tr>
					    <td>'.$resultado[0].'</td>
						<td>'.$resultado[1].'</td>
						<td>'.$resultado[2].'</td>
                        <td>'.$resultado[3].'</td>
                        <td>'.$resultado[4].'</td>
                        <td>'.$resultado[5].'</td>
                        <td>'.$resultado[6].'</td>
						<td><a class="btn btn-danger" href="remover_livro.php?pront='.$resultado[0].'" role="button">Remover</a></td>
						<td><a class="btn btn-warning" href="editar_livro.php?pront='.$resultado[0].'" role="button">Editar</a></td>
					</tr>';
			}
			echo '</table></div>';
		}else{
			echo"<center><h2 class=\"transf2\">Não existe esse livro</h2></center>";
			echo'</br><center class=\"transf2\"><a class="btn btn-primary" href="index.php" role="button">Voltar</a></center>';
        }
        mysqli_close($con);
	}
    include "inc/rodape.inc";
    
?>