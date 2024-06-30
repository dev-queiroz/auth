<?php

include "../security/connect.php";
include "../security/hash.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['productName'], $_SESSION['productPrice'], $_SESSION['productDescription'], $_SESSION['productCategory'], $_SESSION['productImage'], $_SESSION['productStock'], $_SESSION['password'])) {
        
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productDescription = $_POST['productDescription'];
        $productCategory = $_POST['productCategory'];
        $productImage = $_FILES['productImage'];
        $productStock = $_POST['productStock'];
        $password = $_POST['password'];

        if (empty($productName) || empty($productPrice) || empty($productDescription) || empty($productCategory) || empty($productStock) || empty($productImage['name']) || empty($password)) {
            echo "<script>alert('Preencha todos os campos!');</script>";
            exit;
        } elseif ($productImage['error'] != UPLOAD_ERR_OK) {
            echo "<script>alert('Erro ao enviar a imagem do produto!');</script>";
            exit;
        }

        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($productImage['type'], $allowedImageTypes)) {
            echo "<script>alert('Tipo de arquivo de imagem inválido!');</script>";
            exit;
        }

        $maxImageSize = 1024 * 1024; // 1MB
        if ($productImage['size'] > $maxImageSize) {
            echo "<script>alert('Tamanho da imagem do produto excede o limite!');</script>";
            exit;
        }

        $productImageFilename = uniqid('product_image_') . '.' . pathinfo($productImage['name'], PATHINFO_EXTENSION);

        if (!move_uploaded_file($productImage['tmp_name'], 'temp/' . $productImageFilename)) {
            echo "<script>alert('Erro ao mover a imagem do produto para o diretório temporário!');</script>";
            exit;
        } elseif (password_verify($password, $insProducts)) {
            $sql = "INSERT INTO products (name, price, product_description, product_category, product_image, product_stock) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssisd", $productName, $productPrice, $productDescription, $productCategory, $productImageFilename, $productStock);

            if ($stmt->execute()) {
                echo "<script>alert('Produto adicionado com sucesso!');</script>";
                header('Location: register_products.php');
            } else {
                echo "<script>alert('Erro ao adicionar produto: " . $stmt->error . "');</script>";
                exit;
            }

            unlink('temp/' . $productImageFilename);
        }
    }
}

$stmt->close();
$conn->close();
