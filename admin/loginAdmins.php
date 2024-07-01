<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi Brasil - Login de Administrador</title>
    <link rel="stylesheet" href="../css/styleForm.css">
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
                    <li><a href="registro.php">Não é cadastrado? Registre-se!</a></li>
                </ul>
            </nav>
        </div>
    </header>   
    
    <main>
        <section class="register">
            <h2>Login de Administrador Xiaomi</h2>
            <form action="verifyToLogin.php" method="post">
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
                <button type="submit">Entrar</button>
            </form>
        </section>
    </main> 

    <footer>
        <p>&copy; 2024 Xiaomi Products Ltda.</p>
    </footer>
</body>
</html>
