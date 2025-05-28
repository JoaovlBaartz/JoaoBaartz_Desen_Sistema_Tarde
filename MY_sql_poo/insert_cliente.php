<?php
require_once "conexao.php";

$conexao = conectadb();

$endereco = "Rua Kalamango,32"; 
$nome = "João Vitor Luçolli Baartz"; 
$telefone = "(41) 5555-5555";
$email = "joaosilva@teste.com";

$stmt = $conexao->prepare("INSERT INTO clientes (nome, endereco, telefone, email) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $nome, $endereco, $telefone, $email);

if ($stmt->execute()) {
    echo "Cliente adicionado com sucesso!";
} else {
    echo "Erro ao adicionar cliente: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>
