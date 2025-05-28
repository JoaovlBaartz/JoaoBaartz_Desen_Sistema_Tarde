<?php
//definiçaõ das credencias de conexão ao banco de dados
$servername= "localhost";
$username = "root";
$password = "root";
$dbname = "armazena_imagem";
// criando a conexão usuando MySQLi
$conexao = new mysqli($servername, $username, $password, $dbname, 3307);

if ($conexao->connect_error) {
    die("Falha na conexao: " . $conexao->connect_error);
}
?>