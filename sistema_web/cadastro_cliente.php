<?php
    include "inc/comeco_html.inc";
    include "inc/cabecalho.inc";

    if(empty($_POST)){
        include "inc/cabecalho_conexao.inc";
        include "inc/ini_cadastro_cliente.inc";
        $SQL = "SELECT id, nome FROM estados";

        // Executa o comando SQL
        $dados_recuperados = mysqli_query($con, $SQL);

        if(mysqli_num_rows($dados_recuperados) > 0){
            echo'<div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Estado</label>
                        <select class="form-control" name="uf" id="uf">
                            <option selected>Escolha seu estado</option>';
                
            while( ($resultado = mysqli_fetch_assoc($dados_recuperados)) != null) {
                    
                echo '<option value="'.$resultado['nome'].'">'.$resultado['nome'].'</option>';
            }
                echo '</select>
                    </div>
                    <div class="form-group col-md-6">
                        <div id="resultado"></div>
                    </div>
                </div>';
            }

        mysqli_close($con);
        include "inc/fim_cadastro_cliente.inc";
    }else{
        $primeiro_nome = $_POST['primeiro_nome'];
        $ultimo_nome = $_POST['ultimo_nome'];
        $uf = $_POST['uf'];
        $cidade = $_POST['cidade'];
        $email = $_POST['email'];
        
        //Abrindo conexão com o BD
        include "inc/cabecalho_conexao.inc";
        
        $SQL = "INSERT INTO usuario (primeiro_nome, ultimo_nome, estado, cidade, email) 
                VALUE ('$primeiro_nome', '$ultimo_nome', '$uf', '$cidade', '$email')";

        echo'<center><h2 class="">Pessoa cadastrada com sucesso!<h2>';
        echo'<a class=" btn btn-primary transf_2 " href="cadastro_cliente.php" role="button">Cadastrar outra pessoa.</a>';
        
        include "inc/rodape_conexao.inc";

        echo'</br><center><img src="img/feliz.png" width="270" height="240"></img></center>';
    }
    include "inc/rodape.inc";
    include "inc/fim_html.inc";
?>