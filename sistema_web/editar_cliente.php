<?php
    include "inc/comeco_html.inc";
    include "inc/cabecalho.inc";
    if(empty($_POST)){
        include "inc/cabecalho_conexao.inc";

        $pront = $_GET['pront'];

        $SQL = "SELECT * FROM usuario WHERE id = $pront";
		// Executa o comando SQL
		$dados_recuperados = mysqli_query($con, $SQL);

        if(mysqli_num_rows($dados_recuperados) > 0){
            while( ($resultado = mysqli_fetch_array($dados_recuperados)) != null) {
                $primeiro_nome = $resultado[1];
                $ultimo_nome = $resultado[2];
                $estado = $resultado[3];
                $cidade = $resultado[4];
                $email = $resultado[5];
            }

            echo'<form action="editar_cliente.php" method="POST">
                    <center>
                        <h3 class="transf">Informe os dados baixo:</h3>
                    </center>
                    <div class="container alinhar">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="primeiro_nome_edit">Altere o primeiro nome do usuário:</label>
                                <input type="text" class="form-control" name="primeiro_nome_usuario_edit" id="primeiro_nome_usuario_edit" value="'.$primeiro_nome.'"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ultimo_nome_edit">Altere o último nome do usuário:</label>
                                <input type="text" class="form-control" name="ultimo_nome_usuario_edit" id="ultimo_nome_usuario_edit" value="'.$ultimo_nome.'"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="estado_edit">Altere o Estado:</label>
                                <input type="text" class="form-control" name="uf_edit" id="uf_edit" value="'.$estado.'"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cidade_edit">Altere a cidade:</label>
                                <input type="text" class="form-control" name="cidade_edit" id="cidade_edit" value="'.$cidade.'"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="email_edit">Altere email:</label>
                                <input type="text" class="form-control" name="email_edit" id="email_edit" value="'.$email.'"/>
                            </div>
                        </div>
                        <input type=hidden name="id" value= "'.$pront.'"/>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                        <a class="btn btn-primary" href="consulta_cliente.php" role="button">Voltar</a>
                    </div>
                </form>';
        }
    }else{
        $primeiro_nome_edit = $_POST['primeiro_nome_usuario_edit'];
        $ultimo_nome_edit = $_POST['ultimo_nome_usuario_edit'];
        $uf_edit = $_POST['uf_edit'];
        $cidade_edit = $_POST['cidade_edit'];
        $email_edit = $_POST['email_edit'];
        $id = $_POST['id'];
                
        include "inc/cabecalho_conexao.inc";
                
        $SQL = "UPDATE usuario SET primeiro_nome='$primeiro_nome_edit', ultimo_nome='$ultimo_nome_edit', estado='$uf_edit', cidade='$cidade_edit', email='$email_edit' WHERE id=$id";

        echo'<center><h2 class="">Cliente alterado com sucesso!<h2>';
        echo'<a class=" btn btn-primary transf_2 " href="consulta_cliente.php" role="button">Voltar para o consultar</a>';
        
        include "inc/rodape_conexao.inc";

        echo'</br><center><img src="img/feliz.png" width="270" height="240"></img></center>';
    }
    include "inc/rodape.inc";
?>