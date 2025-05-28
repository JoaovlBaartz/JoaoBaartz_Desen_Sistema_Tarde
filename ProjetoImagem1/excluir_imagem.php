<?php
//coneção com o banco de dados
require_once ('conecta.php');

//obtem o id da imagem da url, garantido que seja um numeor inteiro
$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

// verifica se o id e valido (e maior que zero)
if($id_imagem > 0){
    // cria a query segura usando o prepared statement
    $queryExclusao = "DELETE FROM tabela_imagem WHERE codigo = ?";

    //prepara a query
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i", $id_imagem); //define o id como um inteiro

    // executa a exclusão
    if($stmt->execute()){
        echo "Imagem excluída com sucesso!";
    }else{
        die("Erro ao excluir a imagem:".$stmt->error);
    }
    // fecha a consulta
    $stmt->close();
}else{
    echo "ID inválido.";
}

// redireciona para index.php e garante que o script para
header('Location: index.php');
exit();
?>