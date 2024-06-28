<?php
include 'connect.php';
include 'hash.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_SESSION['name'], $_SESSION['cpf'], $_SESSION['email'], $_SESSION['password'], $_SESSION['password_admin'])) {
    $name = $_SESSION['name'];
    $cpf = $_SESSION['cpf'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $password_admin = $_SESSION['password_admin'];

    if (empty($name) || empty($cpf) || empty($email) || empty($password) || empty($password_admin)) {
      echo "<script> alert('Preencha todos os campos!'); </script>";
      header('Location: registerAdmins.php');
    } elseif (password_verify($password_admin, $admins)) {
        $sql = "INSERT INTO admins (name, cpf, email, password) VALUES ('$name', '$cpf', '$email', '$password')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "<script> alert('Cadastro de administrador realizado com sucesso!'); </script>";
        header('Location: loginAdmins.php');
    } else {
        echo "<script> alert('Senha de administrador incorreta!'); </script>";
        header('Location: registerAdmins.php');
    }
  }
}
