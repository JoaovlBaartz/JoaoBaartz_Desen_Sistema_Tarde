<?php
require_once 'config.php';

if(!isset($_SESSION['usuario_id'])){
    header('Location:login.php');
exit();
}
$pdo=conectarBanco();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body{font-family:Arial,sans-serif;}
        .header{background:#FFCC99; color: #000000; padding:10px;}
        table{width: 100%;border-collapse:collapse;}
        th,td{border:1px solid #ddd; padding:8px; text-align:left;}
        th{background-color:#f2f2f2;}
    </style>
    <style>
table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    background: #fff;
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
}
th, td {
    padding: 10px 14px;
    text-align: left;
    font-size: 15px;
}
th {
    background: #FFCC99;
    color: #000000;
    font-weight: 600;
    border: none;
}
tr {
    border-bottom: 1px solid #ededed;
}
tr:nth-child(even) {
    background: #f4f6fa;
}
tr:nth-child(odd) {
    background: #fff;
}
tr:last-child {
    border-bottom: none;
}
.menu {
    margin: 20px 0;
    text-align: left;
}
.menu a {
    display: inline-block;
    margin: 8px 8px 0 0;
    padding: 8px 18px;
    background: #FFCC99;
    color: #000000;
    border-radius: 4px;
    text-decoration: none;
    font-size: 15px;
    transition: background 0.2s, box-shadow 0.2s;
    box-shadow: 0 1px 4px rgba(0,0,0,0.03);
}
.menu a:hover {
    background:rgb(226, 156, 85);
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}
</style>
</head>
<body>
    <div class="header">
    <h1>Bem-vindo,<?= htmlspecialchars($_SESSION['usuario_nome'])?>!</h1>
</div>
<div class="menu">
    <a href="relatorio.php">Gerar Relatorio PDF</a>
    <a href="logout.php">Sair</a>
</div>
<h2>Lista de Produtos</h2>
<table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Valor Unitario</th>
        </tr>
        <?php
        $stmt=$pdo->query("SELECT * FROM produto");
        while($produto=$stmt->fetch(PDO::FETCH_ASSOC)):
        ?>
        <tr>
            <td><?= $produto['id_produto']?></td>
            <td><?= htmlspecialchars( $produto['nome_prod'])?></td>
            <td><?= htmlspecialchars( $produto['descricao'])?></td>
            <td><?= htmlspecialchars( $produto['qtde'])?></td>
            <td>R$ <?= number_format( $produto['valor_unit'],2,',','.')?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>