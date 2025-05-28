<?php
$musica = array (
    array ("Kid Abelha","Amanhã",1993),
    array ("Ultrage A Rigor","Pelados",1985),
    array ("Paralamas do sucesso","Alagados",1987));
    for ($linha=0;$linha<3;$linha++)
    {
        for($coluna=0;$coluna<3;$coluna++)
        {
            echo $musica[$linha][$coluna]."|";
        }
        echo "<br/>";
    }
?>
<?php
echo "<br/>";
$amazomProdutos = array(
    array("Código" => "Livro", "Discrição" => "Livros", "Preço" => 50),
    array("Código" => "DVDs", "Discrição" => "Filmes", "Preço" => 15),
    array("Código" => "CDa", "Discrição" => "Música", "Preço" => 20)
);
for ($linha = 0; $linha < 3; $linha++) { ?>
    <p> | <?= $amazomProdutos[$linha]["Código"] ?>
        | <?= $amazomProdutos[$linha]["Discrição"] ?>
        | <?= $amazomProdutos[$linha]["Preço"] ?>
    </p>
<?php 
}
?>
     <?php
        echo " <h2 align='center'>
               João Vitor Luçolli Baartz
               </h2>";

    ?>