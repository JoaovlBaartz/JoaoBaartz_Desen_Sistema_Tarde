<?php
//conexao com o banco de dados
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = 'root';
$port = '3307';
try {
    // cria uma nova instancia de pdo para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //define o modo de erro do pdo para exceção

    //recuperar tudos os funcioanrios do banco de dados
    $sql = "SELECT id,nome  FROM funcionarios";
    $stmt = $pdo->prepare($sql);//prepara a istrução sql para ser executada
    $stmt->execute(); //executa a istrução 
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //Busca todos os resultado com um matriz associativa
    
    //verifaca se foi solicitado a exclusão de um formulario
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['excluir_id'])) {
        $excluir_id = $_POST['excluir_id'];
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo->prepare($sql_excluir);
        $stmt_excluir->bindParam(':id',$excluir_id, PDO::PARAM_INT);
        $stmt_excluir->execute();

        //redireciona para evitar o reenvio do formulario
        header("Location: ". $_SERVER['PHP_SELF']);
        exit();
    }
} catch (PDOException $e){
    echo "Erro. ". $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Funcionario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <h1>Consulta de Funcionario</h1>
    <div class="consulta-container">
     <ul class="consulta-lista">
        <?php foreach ($funcionarios as $funcionario):?>
            <li>
                <a href="visualizar_funcionario.php?id=<?= $funcionario['id'] ?>">
                    <?=htmlspecialchars($funcionario['nome'])?>
                </a>
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="excluir_id" value="<?= $funcionario['id'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            </li>
        <?php endforeach; ?>
     </ul>
    </div>
</body>
</html>