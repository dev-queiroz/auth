<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Administração</title>
</head>
<body>
    <main>
        <form action="repositoriosForAdmin/adminRepositorio.php" method="post">
            <h1>Página do Administrador</h1>
            <!-- Nesta parte, serão implementadas coletas de requisições para as funções de "adminRepositorio.php" -->
            <label for="checarUsuarioCPF">Checagem através do CPF:</label>
            <input type="int" id="checarUsuarioCPF" name="checarUsuarioCPF" required>
            <button type="submit" name="checarUsuarioCPF">Checar CPF</button>
            <br><br>
            <button type="submit" name="verTabelaCompleta">Verificar Tabela Completa</button>
            <br><br>
            <label for="banirUsuarioCPF">Banir usuário através do CPF:</label>
            <input type="int" id="banirUsuarioCPF" name="banirUsuarioCPF" required>
            <button type="submit" name="banirUsuarioCPF">Banir</button>
        </form>
    </main>
</body>
</html>
