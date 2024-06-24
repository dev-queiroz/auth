<?php
include_once "conexao.php";

class Migration {
    private $conexao;

    public function __construct() {
        $conexaoDB = new Conexao();
        $this->conexao = $conexaoDB->conectar();
    }

    public function criarTabelaUsuarios() {
        $sql = "CREATE DATABASE IF NOT EXISTS authentic";

        if ($this->conexao->query($sql) === true) {
            $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                id_usuario int NOT NULL PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                cpf int(11) NOT NULL,
                senhaNivel VARCHAR(50) NOT NULL,
                telefone int(12) NOT NULL,
                dataNascimento DATE,
                senha VARCHAR(300) NOT NULL,
            );";

            if ($this->conexao->query($sql) === true) {
                echo "Banco de dados 'authentic' e tabela 'usuarios' criados com sucesso!";
            }
        } else {
            echo "Erro ao criar tabela de usuários: " . $this->conexao->error;
        }
    }
}
// tudo ok