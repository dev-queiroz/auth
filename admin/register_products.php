<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
</head>
<body>
    <header>
        <div>
            <h1>Adicionar Produto</h1>
        </div>
    </header>

    <main>
        <form action="add_products.php" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="productName">Nome do Produto:</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="input-group">
                <label for="productPrice">Preço do Produto:</label>
                <input type="number" id="productPrice" name="productPrice" step="0.01" required>
            </div>
            <div class="input-group">
                <label for="productDescription">Descrição do Produto:</label>
                <textarea id="productDescription" name="productDescription" rows="6" required></textarea>
            </div>
            <div class="input-group">
                <label for="productCategory">Categoria do Produto:</label>
                <input type="text" id="productCategory" name="productCategory" required>
            </div>
            <div class="input-group">
                <label for="productImage">Imagem do Produto:</label>
                <input type="file" id="productImage" name="productImage" required>
            </div>
            <div class="input-group">
                <label for="productStock">Estoque do Produto:</label>
                <input type="number" id="productStock" name="productStock" min="0" required>
            </div>
            <div class="input-group">
                <label for="password">Senha para Inserçao de Produtos:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Registrar</button>
        </form>
    </main>
</body>
</html>
