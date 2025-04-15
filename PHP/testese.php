<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTE SE</title>
</head>
<body>
    <?php
    //declara variavel numerica
    $unidade = 91;
    // testa se $unidade maior que 90 . retorna um boolean 
    $vaichover = ($unidade > 90);
    //testa se $vaichover e verdadeiro
    if ($vaichover)
     {
         echo "Vai chover com toda certeza absoluta da terra !";
     }
    ?>

<br>    
    <!--IF ELSE-->
    <?php
    $a = 17;
    if ($a >17)
     print "maior de idade .<br>";
    else
     print "menor de idade .<br>";
    ?>

</body>
</html>