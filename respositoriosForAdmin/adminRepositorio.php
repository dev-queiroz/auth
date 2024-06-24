<?php
session_start();

include_once "conexao.php";

function checagemCPF($cpf){
    $conexaoDB = new Conexao();
    $conexao = $conexaoDB->conectar();

    $sql = "SELECT FROM usuarios WHERE cpf = $cpf";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $cpf);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        return $resultado->fetch_assoc();
    } else {
        return null;
    }
}

function verificarTabelaCompleta(){
    $conexaoDB = new Conexao();
    $conexao = $conexaoDB->conectar();

    $sql = "SELECT * FROM usuarios";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->get_result();
}

function banirUsuarioCPF($cpf){
    $conexaoDB = new Conexao();
    $conexao = $conexaoDB->conectar();

    $sql = "DELETE FROM usuarios WHERE cpf = $cpf";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $cpf);

    if ($stmt->execute()) {
        return "Usuário deletado com sucesso!";
    } else {
        return "Erro ao deletar usuário.";
    }
}