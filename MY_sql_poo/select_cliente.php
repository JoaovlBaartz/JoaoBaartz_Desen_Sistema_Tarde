<?php
require_once "conexao.php";

$conexao = conectadb();

$sql = "SELECT id_cliente, nome, email FROM clientes";

$result = $conexao->query($sql);

if ($result === false) {
    echo "Erro na consulta SQL: " . $conexao->error;
    exit; // Evita continuar se a consulta falhou
}

if ($result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
        echo "ID: " . $linha["id_cliente"] . " - Nome: " . $linha["nome"] . " - Email: " . $linha["email"] . "<br/>";
    }
} else {
    echo "Nenhum cliente cadastrado.";
}

$conexao->close();
?>
