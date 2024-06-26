<?php
//criar a tabela moderators através do script "connect.php", que se conecta à base de dados
require 'connect.php';

$query = "CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    product_description TEXT NOT NULL,
    product_category VARCHAR(50) NOT NULL,
    product_image LONGBLOB(255),
    product_stock INT NOT NULL DEFAULT 0
);";

if (mysqli_query($conn, $query)) {
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . mysqli_error($conn);
}