<?php
//criar a tabela admins através do script "connect.php", que se conecta à base de dados
require 'connect.php';

$query = "CREATE TABLE admins (
    id INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    cpf VARCHAR(11),
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)";

if (mysqli_query($conn, $query)) {
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . mysqli_error($conn);
}
