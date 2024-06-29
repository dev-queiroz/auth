<?php

include "../security/connect.php";
include "../security/hash.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['senha'];
    $password_admin = $_POST['senhaAdmin'];

    if (empty($email) || empty($password) || empty($password_admin)) {
        echo "<script>alert('Preencha todos os campos!');</script>";
        exit;
    }

    if (!password_verify($password_admin, $admins)) {
        echo "<script>alert('Senha de administrador incorreta!');</script>";
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE email = $email";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();

            if (password_verify($password, $user_data['password'])) {
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
}
