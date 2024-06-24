<?php
session_start();

if (isset($_POST['confirm_logout'])) {

    // Remove o usuário do banco de dados
    $sql = "DELETE * FROM usuarios WHERE id =".$_REQUEST['id'];
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $usuario, $senha, $nivel);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Finaliza a sessão e redireciona o usuário para o index
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
// tudo ok
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <h1>Confirmação de Logout</h1>
    <p>Deseja realmente realizar o logout?</p>
    <form action="logout.php" method="post">
        <button type="submit" name="confirm_logout">Confirmar Logout</button>
        <button type="return" onclick="window.location.href='dashboard.php'">Cancelar Logout</button>
    </form>
</body>
</html>
