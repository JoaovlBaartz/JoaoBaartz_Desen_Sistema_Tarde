<?php
error_reporting(E_ALL);
ini_set('display errors', 1);
ob_clean(); // limpa qualquer saida inesperada antes do header

//coneção com o banco de dados
require_once ('conecta.php');

//obtem o id da imagem da url, garantido que seja um numeor inteiro
$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

// cria consulta para buscar a imagem no banco de dados
$querySelecionaPorCodigo = "SELECT imagem, tipo_imagem FROM tabela_imagem WHERE codigo = ? ";

//usa prepared statement para maior segurança
$stmt = $conexao->prepare($querySelecionaPorCodigo);
$stmt->bind_param("i", $id_imagem);
$stmt->execute();
$resultado = $stmt->get_result();

// verifica se a imagem existe no banco de dados
if ($resultado->num_rows > 0) {
    $imagem = $resultado->fetch_object();

    // define o tipo correto da imagem(fallback para jpeg caso estaja vazio)
    $tipo_imagem = !empty($imagem->tipo_imagem) ? $imagem->tipo_imagem : 'imagem/jpeg';
    header("Content-Type:". $tipo_imagem);

    // exibe a imagem armazenada no banco de dados
    echo $imagem->imagem;
}else{
    echo "Imagem não encontrada";
}

//fecha a cunsulta 
$stmt->close();
?>