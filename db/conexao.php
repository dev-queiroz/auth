<?php
class Conexao {
    private $servidor = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "authentic";

    public function conectar() {
        $conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco);
        if (mysqli_connect_errno()) {
            die("Falha ao abrir banco de dados: " . mysqli_connect_error());
        }
        mysqli_set_charset($conexao, "utf8");
        return $conexao;
    }
}
// tudo ok