<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi Brasil - Cadastro de Administradores</title>
    <link rel="stylesheet" href="css/styleForm.css">
</head>
<body>
    <header>
        <div>
            <h1>Xiaomi Brasil</h1>
        </div>
        <br>
        <div>
            <nav>
                <ul>
                    <li><a href="loginAdmin.php">Já é cadastrado? Login!</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="register">
            <h2>Crie sua Conta de Administrador Xiaomi</h2>
            <form action="add_admins.php" method="post">
                <div class="input-group">
                    <label for="name">Nome Completo:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" required>
                </div>
                <div class="input-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="password_admin">Senha de Administrador:</label>
                    <input type="password" id="password_admin" name="password_admin" required>
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
