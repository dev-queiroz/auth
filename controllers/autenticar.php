<?php
session_start();

include_once "db/conexao.php";
include_once "repositoriosForAdmin/pass.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $nivel = $_POST["nivel"];

    // Consulta o banco de dados para verificar se o usuário existe
    $conexao = new Conexao();
    $conexao = $conexao->conectar();

    $sql = "SELECT nivel FROM usuarios WHERE nome = ? AND senha = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();

        if (password_verify($nivel, $admin)){
            header("Location: views/admins.php");
        } elseif (password_verify($nivel, $usuario)){
            header("Location: dashboard.php");
        } else {
            header("Location: views/login.php");
        }
        exit();
    } else {
        // Credenciais inválidas
        $_SESSION["erro"] = "Credenciais inválidas. Tente novamente.";
        header("Location: views/login.php"); // Redireciona de volta para a página de login
        exit();
    }
}
// tudo ok