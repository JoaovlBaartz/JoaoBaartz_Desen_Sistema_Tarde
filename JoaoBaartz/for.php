<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOR</title>
</head>
<body>
        <?php
         for ($i=0; $i<10; $i++) {
            print " O quadrado de $i é ". $i * $i."<br/>";
         }
        ?>

         <?php
         for ($i = 2 ; $n = system('dir /b'); $i++) {
            echo ($n);
            if ($i == 10){
                break;
            }
         }
        ?>
        <?php
            echo " <h2 align='center'>
                   João Vitor Luçolli Baartz
                </h2>";

        ?>
</body>
</html>