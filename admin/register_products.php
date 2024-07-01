<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi Brasil - Adição de Produtos</title>
    <link rel="stylesheet" href="../css/styleForm.css">
</head>
<body>
    <header>
        <div>
            <h1>Xiaomi Brasil</h1>
        </div>
        <br>
    </header>

    <main>
        <section class="register">
            <h2>Insira os Produtos abaixo</h2>
            <form action="register_products.php" method="post" enctype="multipart/form-data">
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
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Xiaomi Products Ltda.</p>
    </footer>
</body>
</html>

<?php
include "../security/connect.php";
include "../security/hash.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productName = filter_var($_POST['productName']);
  $productPrice = floatval($_POST['productPrice']);
  $productDescription = filter_var($_POST['productDescription']);
  $productCategory = filter_var($_POST['productCategory']);
  $productImage = $_FILES['productImage'];
  $productStock = intval($_POST['productStock']);
  $password = filter_var($_POST['password']);

  if (!password_verify($password, $insProducts)) {
    echo "<script> alert('Senha incorreta!'); </script>";
    exit;
  }

  if ($productImage['error'] !== UPLOAD_ERR_OK) {
    echo "<script> alert('Erro ao enviar a imagem do produto!'); </script>";
  } else {
    $targetFile = 'uploads/' . uniqid('product_image_') . '.' . pathinfo($productImage['name'], PATHINFO_EXTENSION);
    move_uploaded_file($productImage['tmp_name'], $targetFile);
  }

  $sql = "INSERT INTO products (productName, productPrice, productDescription, productCategory, productImage, productStock) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sdsssi", $productName, $productPrice, $productDescription, $productCategory, $targetFile, $productStock);
  
  if ($stmt->execute()) {
    echo "<script> alert('Produto cadastrado com sucesso!'); </script>";
    header('Location: register_products.php');
  } else {
    exit;
  }

  $stmt->close();
  $conn->close();
}

?>
