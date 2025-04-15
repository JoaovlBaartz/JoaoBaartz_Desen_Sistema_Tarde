<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Função</title>
</head>
<body>
        <?php
            echo "<h2 align='center'>João Vitor Luçolli Baartz</h2>";
        ?>
        <?php
            echo $name = "Joao Vitor Lucolli Baartz";
            echo "<br>";
            echo $length = strlen ($name);
            echo "<br>";
            echo $cmp = strcmp($name, "Paulo Rodrigues");
            echo "<br>";
            echo $index = strpos ($name, "i");
            echo "<br>";
            echo $first = substr ($name, 9, 5);
            echo "<br>";
            echo $name = strtoupper ($name);   
        ?>
        <?php
            echo $cidade = "Joinville";
            echo "<br>";
            echo $estado = "SC";
            echo "<br>";
            echo $idade = 174;
            echo "<br>";
            echo $frase_capital = "A cidade de $cidade tem a maior população de $estado";
            echo "<br>";
            echo $frase_idade = "$cidade tem mais de $idade anos";
            echo "<br>";
            echo "<h3> $frase_capital </h3>";
            echo "<h4> $frase_idade </h4>";
            
        ?>
</body>
</html>