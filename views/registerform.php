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
