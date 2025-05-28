<?php
// inclui conexão com o banco 
require_once "conexao.php";

// estabelece conexão
$conexao = conectadb();

$id_cliente = 1;

$stmt = $conexao->prepare("DELETE FROM clientes WHERE id_cliente = ?");

if ($stmt === false) {
    die("Erro ao preparar statement: " . $conexao->error);
}

// associa o parâmetro ao valor da consulta
$stmt->bind_param("i", $id_cliente);

// executa a exclusão
if ($stmt->execute()) {
    echo "Cliente removido com sucesso!";
} else {
    echo "Erro ao remover cliente: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>
