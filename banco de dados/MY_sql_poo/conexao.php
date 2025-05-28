<?php
//habilita relatorio detalhado de erros no my sql
mysqli_report(MYSQLI_REPORT_ERROR / MYSQLI_REPORT_STRICT);

/**
 * Função para conectar ao banco de dados 
 * Retorna um obeheto de conexão do mysql ou interrompe o script em caso de erro 
 
 */
function conectadb(){
$endereco = "localhost"; // endereco do servidor 
$usuario = "root"; // nome de usuario do banco
$senha = "";// senha do banco
$banco = "empresa";// nome do banco de dados

try{
    //criação da conexão
    $con = new mysqli($endereco, $usuario, $senha, $banco);

    //definição de conjunto de caraceres para evitar problema de acentuação
    $con->set_charset("utf8mb4");
    return $con;
  }catch (Exception $e){
//exibe uam mensagem de erro e encontra o script
   die("Erro de conexão:" . $e->getMessage());  
} 
}

?>