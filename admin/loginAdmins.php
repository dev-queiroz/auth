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
            <form action="loginAdmins.php" method="post">
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

<?php

include "../security/connect.php";
include "../security/hash.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_admin'])) {
    echo "<script>alert('Preencha todos os campos!');</script>";
    exit;
  }

  if (!password_verify($_POST['password_admin'], $admins)) {
    echo "<script>alert('Senha de administrador incorreta!');</script>";
    exit;
  }

  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  $sql = "SELECT * FROM admins WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);

  if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $user_data = $result->fetch_assoc();

      if (password_verify($_POST['password'], $user_data['password'])) {
        $_SESSION['id'] = $user_data['id'];
        header('Location: register_products.php');
        exit;
      } else {
        echo "<script>alert('Senha do usuário incorreta!');</script>";
      }
    } else {
      echo "<script>alert('Usuário não encontrado ou informações incorretas!');</script>";
    }
  } else {
    echo "<script>alert('Erro ao conectar com o banco de dados!');</script>";
  }

  $stmt->close();
  $conn->close();
}

?>
