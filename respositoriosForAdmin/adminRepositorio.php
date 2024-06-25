<?php
session_start();

include_once "conexao.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['checarUsuarioCPF']) && !empty($_POST['cpf'])){
        $cpf = $_POST['cpf'];

        function checagemCPF($cpf){
            $conexaoDB = new Conexao();
            $conexao = $conexaoDB->conectar();

            $sql = "SELECT * FROM usuarios WHERE cpf = $cpf";
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
    }

    if (isset($_POST['verTabelaCompleta'])){
        function verificarTabelaCompleta(){
            $conexaoDB = new Conexao();
            $conexao = $conexaoDB->conectar();

            $sql = "SELECT * FROM usuarios";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
        }
    }

    if (isset($_POST['banirUsuarioCPF']) && !empty($_POST['cpf'])){
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
    }
}