<?php
 #rand - gera um intervalo inteiro aletario
 $sorteio = rand ( 0 , 5 );
 echo "Sorteado: $sorteio <hr/>";
 #array_merge - Combaina um ou mais arrays
 #range - Cria um array contendo uma faixa de elementos
 #inicio , fim e passo
 $vetor = array_merge(range ( 0 , 10),
                    range ($sorteio , 10 ,2),
                    array ($sorteio));
print_r($vetor);
echo "<hr/>";
#embaralha
shuffle ($vetor);
print_r($vetor);
echo "<hr/>";
foreach ($vetor as $valor)
{
     echo 'O valor ', $valor ,' tem 3 elementos. <br/>';
}
?>

<?php
        echo " <h2 align='center'>
               João Vitor Luçolli Baartz
               </h2>";

    ?>