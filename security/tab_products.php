<?php
//criar a tabela moderators através do script "connect.php", que se conecta à base de dados
require 'connect.php';

$query = "CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    productName VARCHAR(255) NOT NULL,
    productPrice FLOAT(10,2) NOT NULL,
    productDescription TEXT NOT NULL,
    productCategory VARCHAR(50) NOT NULL,
    productImage LONGBLOB NOT NULL,
    productStock INT NOT NULL DEFAULT 0
);";

if (mysqli_query($conn, $query)) {
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . mysqli_error($conn);
}