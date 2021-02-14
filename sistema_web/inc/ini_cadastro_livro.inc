<form action="cadastro_livro.php" method="POST">
    <center><h3 class="transf">Informe os dados baixo:</h3></center>
    <div class=" container alinhar">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Título:</label>
                <input type="text" class="form-control" name="nome">
            </div>
            <div class="form-group col-md-6">
                <label>Autor(a):</label>
                <input type="text" class="form-control" name="autor">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Editora:</label>
                <input type="text" class="form-control" name="editora">
            </div>
            <div class="form-group col-md-6">
                <label>Ano:</label>
                <input type="number" class="form-control" name="ano">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Gênero:</label>
                <input type="text" class="form-control" name="genero">
            </div>
            <div class="form-group col-md-6">
                <label>Preço:</label>
                <input type="number" step="0.01" class="form-control" name="preco">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a class="btn btn-primary" href="index.php" role="button">Voltar</a>
    </div>
</form>