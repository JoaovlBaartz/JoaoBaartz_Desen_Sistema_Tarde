<?php
//inclui o arquivo de conexão com banco de dados
require_once "conexao.php";

//estabelece a conexão
$conexao = conectadb();

//define os novos valores
$endereco = "Rua Kalamango,32"; 
$nome = "Maria da Silva"; 
$telefone = "(41) 5555-5555";
$email = "mariasilva@teste.com";
//10	Bruno Fernandes	Av. Atlântica, 456 - (85) 96789-0123	bruno.fernandes@email.com

//define o id do cliente a ser atualizado
$id_cliente = 10;

//prepara a consulta SQL segura
$stmt = $conexao->prepare("UPDATE clientes SET nome = ?, endereco = ?, telefone = ?, email = ? WHERE id_cliente = ?");

//associa os parametros aos valores da consulta 
$stmt->bind_param("ssssi" , $nome, $endereco, $telefone, $email, $id_cliente);

//executa a atualização
if ($stmt->execute()) {
    echo "Cliente atualizado com sucesso!";
} else {
    echo "Erro ao atualizar cliente: " . $stmt->error;
}
$stmt->close();
$conexao->close();
?>