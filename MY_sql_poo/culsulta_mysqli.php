<?php
//incui o arquivo de conexão com banco de dados 
require_once "conexao.php";

//Estabelece a conexão
$conexao = conectadb();

//Define a consulta SQL para buscar clientes
$sql = "SELECT id_cliente, nome, email FROM clientes";

//executa a consulta no banco
$result = $conexao->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result === false) {
    echo "Erro na consulta SQL: " . $conexao->error;
} else {
    //verifica se há registros retornados
    if ($result->num_rows > 0) {
        //itera sobre os resultados e exibe cada cliente encontrado
        while ($linha = $result->fetch_assoc()) {
            echo "ID: " . $linha["id_cliente"] . " - Nome: " . $linha["nome"] . " - Email: " . $linha["email"] . "<br/>";
        }
    } else {
        //caso nenhum resultado seja encontrado
        echo "Nenhum cliente cadastrado.";
    }
}

// Fecha a conexão
$conexao->close();
?>