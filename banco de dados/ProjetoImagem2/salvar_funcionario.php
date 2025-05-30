<?php

//FUnçao para dimensionar  a imagem
function redimensionarImagem($imagem,$largura,$altura){
    //obetendo as dimensoes da imagem original
    list($larguraOriginal,$alturaOriginal) = getimagesize($imagem);

    //cria uma nova iamgem com as dimensoes especificadas
    $novaImagem = imagecreatetruecolor($largura,$altura);

    //cria iamgem a partir do arquivo original (formato JPEG)
    $imagemOriginal = imagecreatefromjpeg($imagem);

    //copia e redimensiona a imagem original para a nova imagem
    imagecopyresampled($novaImagem,$imagemOriginal, 0, 0, 0, 0, $largura,$altura,$larguraOriginal,$alturaOriginal); 

    //Incia a saida em buffer para capturar os dados da imagem 
    ob_start();
    imagejpeg($novaImagem);
    $dadosImagem = ob_get_clean();//obtem os dados da imagem no buffer

    //libera a memoria uasda pelas imagens
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem; //retorna os dados da imagem redimensionada
}

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
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_FILES['foto'])){
        //codigo abaixo verifica se nao ouve erro no upload da foto
        if($_FILES['foto']['error'] == 0){
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $nomeFoto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];
            
            //redimensiona a imagem para 300x400 pixels
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);

            //prepara a consulta SQL para inserir os dados do funcionario
            $sql = "INSERT INTO funcionarios (nome,telefone,nome_foto,tipo_foto,foto) VALUES (:nome,:telefone,:nome_foto,:tipo_foto,:foto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':nome_foto', $nomeFoto);
            $stmt->bindParam(':tipo_foto', $tipoFoto);
            // o codigo abaixo define o parametro da foto como large object (LOB)
            $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);

            if($stmt->execute()){
                echo "Funcionario cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o funcionario.";
            }
        }else{
            echo "Erro ao fazer upload da foto: " .$_FILES['foto']['error'];
        }
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
    <title>Lista Imagens</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <h1>Lista de imagens</h1>
    
    <div class="center-link-container" style="display: flex; justify-content: center; margin-top: 18px;">
    <a class="listar-link" href="consultar_funcionario.php" style="
        display: inline-block;
        background: #007bff;
        color: #fff;
        text-decoration: none;
        padding: 12px 28px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 1.09rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        transition: background 0.16s, color 0.16s;
    "
    onmouseover="this.style.background='#0056b3';this.style.color='#e2e2e2';"
    onmouseout="this.style.background='#007bff';this.style.color='#fff';"
    >Listar Funcionarios</a>
</div>
</body>
</html>