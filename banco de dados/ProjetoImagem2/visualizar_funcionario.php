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

    // Verifica se o ID foi passado na URL
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // Obtém o ID do funcionário da URL

        // Recupera os dados do funcionário do banco de dados
        $sql = "SELECT nome, telefone, tipo_foto, foto FROM funcionarios WHERE id = :id";
        $stmt = $pdo->prepare($sql); // Prepara a instrução SQL para execução
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Vincula o valor do ID ao parâmetro :id
        $stmt->execute(); // Executa a instrução SQL

        // Verifica se encontrou o funcionário
        if ($stmt->rowCount() > 0) {
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC); // Busca os dados do funcionário como um array associativo

            // Verifica se foi solicitado a exclusão do funcionário
            // LINHA ABAIXO VERIFICA se os dados foram enviados via formulário com o método POST e
            // isset verifica-se se há um valor definido na variável 
            // Verifica se o formulário foi enviado via POST e se existe o campo 'excluir_id'
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir_id'])) { 
                // Pega o valor do ID que foi enviado pelo formulário (ID do funcionário a ser excluído)
                $excluir_id = $_POST['excluir_id']; 
                // Monta a query SQL para deletar o funcionário com o ID correspondente
                $sql_excluir = "DELETE FROM funcionarios WHERE id = :id"; 
                // Prepara a query para execução segura, evitando SQL injection
                $stmt_excluir = $pdo->prepare($sql_excluir); 
                // Associa o valor do ID ao parâmetro :id na query, garantindo que será tratado como número inteiro
                $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT); 
                // Executa a query, excluindo o funcionário do banco de dados
                $stmt_excluir->execute(); 

                // Redireciona para a página inicial após a exclusão
                header("Location: consultar_funcionario.php");
                exit();
            }
            ?>
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <title>Visualizar Funcionário</title>
                <link rel="stylesheet" href="styles.css">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background: #f5f5f5;
                        margin: 0;
                        padding: 0;
                    }
                    .main-center-container {
                        min-height: calc(100vh - 70px);
                        display: flex;
                        align-items: flex-start;
                        justify-content: center;
                        margin-top: 24px;
                    }
                    .card-funcionario {
                        background: #fff;
                        border-radius: 12px;
                        box-shadow: 0 2px 24px rgba(0,0,0,0.10);
                        padding: 32px 36px 28px 36px;
                        min-width: 340px;
                        max-width: 390px;
                        width: 100%;
                        display: flex;
                        flex-direction: column;
                        align-items: flex-start;
                    }
                    .card-funcionario h1 {
                        margin-top: 0;
                        margin-bottom: 22px;
                        font-size: 2.1rem;
                        text-align: left;
                        font-weight: bold;
                        width: 100%;
                    }
                    .card-funcionario p {
                        margin: 8px 0 0 0;
                        font-size: 1.09rem;
                        text-align: left;
                        width: 100%;
                    }
                    .card-funcionario img {
                        margin: 18px 0 10px 0;
                        max-width: 270px;
                        width: 100%;
                        height: auto;
                        border-radius: 10px;
                        box-shadow: 0 2px 10px rgba(0,0,0,0.10);
                        object-fit: cover;
                        display: block;
                    }
                    .card-funcionario form {
                        width: 100%;
                        display: flex;
                        justify-content: center;
                        margin-top: 18px;
                    }
                    .card-funcionario button {
                        background: #dc3545;
                        color: #fff;
                        border: none;
                        padding: 10px 28px;
                        border-radius: 5px;
                        cursor: pointer;
                        font-size: 1.05rem;
                        font-weight: 500;
                        transition: background 0.18s;
                    }
                    .card-funcionario button:hover {
                        background: #a71d2a;
                    }
                </style>
            </head>
            <body>
                <?php include 'menu.php'; ?>
                <div class="main-center-container">
                    <div class="card-funcionario">
                        <h1>Dados do Funcionário</h1>
                        <p>Nome: <?= htmlspecialchars($funcionario['nome']) ?></p>
                        <p>Telefone: <?= htmlspecialchars($funcionario['telefone']) ?></p>
                        <p>Foto:</p>
                        <img src="data:<?= $funcionario['tipo_foto'] ?>;base64,<?= base64_encode($funcionario['foto']) ?>" alt="Foto do Funcionário">
                        <form method="POST">
                            <input type="hidden" name="excluir_id" value="<?= $id ?>">
                            <button type="submit">Excluir Funcionário</button>
                        </form>
                    </div>
                </div>
            </body>
            </html>
            <?php
        } else {
            echo "Funcionário não encontrado."; // Mensagem exibida se o funcionário não for encontrado
        }
    } else {
        echo "ID do funcionário não foi fornecido."; // Mensagem exibida se o ID não for fornecido na URL
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage(); // Exibe a mensagem de erro se a conexão ou a consulta falhar
}
?>