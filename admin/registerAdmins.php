<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi Brasil - Cadastro de Administradores</title>
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
                    <li><a href="loginAdmins.php">Já é cadastrado? Login!</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="register">
            <h2>Crie sua Conta de Administrador Xiaomi</h2>
            <form action="registerAdmins.php" method="post">
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

<?php

include "../security/connect.php";
include "../security/hash.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['cpf']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_admin'])) {
        echo "<script> alert('Preencha todos os campos!'); </script>";
        header('Location: registerAdmins.php');
        exit;
    } elseif (!password_verify($_POST['password_admin'], $admins)) {
        echo "<script> alert('Senha de administrador incorreta!'); </script>";
        header('Location: registerAdmins.php');
        exit;
    } else {
        $name = filter_var($_POST['name']);
        $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password']);

        $hash_pass = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO admins (name, cpf, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $cpf, $email, $hash_pass);

        if ($stmt->execute()) {
            echo "<script> alert('Cadastro de administrador realizado com sucesso!'); </script>";
            header('Location: loginAdmins.php');
        } else {
            echo "<script>alert('Erro ao cadastrar administrador);</script>";
            header('Location: registerAdmins.php');
        }

        $stmt->close();
        $conn->close();
    }
}

?>
