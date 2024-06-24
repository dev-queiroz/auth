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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="register.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="cpf">CPF:</label>
        <input type="number" name="cpf" id="cpf" required>

        <label for="telefone">Telefone:</label>
        <input type="number" name="telefone" id="telefone" required>

        <label for="data">Data de Nascimento:</label>
        <input type="date" name="data" id="data" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
