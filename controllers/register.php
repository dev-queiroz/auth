<?php
include_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $dataNascimento = $_POST["data"];
    $senha = $_POST["senha"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido";
        exit();
    }

    if (empty($nome) || empty($email) || empty($cpf) || empty($telefone) || empty($dataNascimento) || empty($senha)) {
        echo "Preencha todos os campos obrigatórios!";
        exit();
    }

    $conexao = new Conexao();
    $conexao = $conexao->conectar();

    $sql = "INSERT INTO usuarios (nome, email, senha, cpf, telefone, dataNascimento) VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssiis", $nome, $email, $senha, $cpf, $telefone, $dataNascimento);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Erro ao registrar usuário: " . $stmt->error;
    }
}
// tudo ok
