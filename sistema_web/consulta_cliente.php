<?php
        include "inc/comeco_html.inc";
        include "inc/cabecalho.inc";
		include "inc/cabecalho_conexao.inc";

		$SQL = "SELECT * FROM usuario";

		// Executa o comando SQL
		$dados_recuperados = mysqli_query($con, $SQL);

		if(mysqli_num_rows($dados_recuperados) > 0){

            echo'<div class="container tabela">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Primeiro nome</th>
                                <th scope="col">Último nome</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Email</th>
                                <th colspan="2">Operações</th>
                            </tr>
                        </thead>';
			
			while( ($resultado = mysqli_fetch_array($dados_recuperados)) != null) {
				
                echo '<tbody>
                        <tr>
							<td>'.$resultado[0].'</td>
							<td>'.$resultado[1].'</td>
							<td>'.$resultado[2].'</td>
                            <td>'.$resultado[3].'</td>
                            <td>'.$resultado[4].'</td>
                            <td>'.$resultado[5].'</td>
							<td><a class="btn btn-danger" href="remover_cliente.php?pront='.$resultado[0].'" role="button">Remover</a></td>
							<td><a class="btn btn-warning" href="editar_cliente.php?pront='.$resultado[0].'" role="button">Editar</a></td>
                        </tr>
                    </tbody>';
			}
			
            echo '</table>
            </div>';
		}

        mysqli_close($con);

        include "inc/rodape.inc";
        include "inc/fim_html.inc";
?>