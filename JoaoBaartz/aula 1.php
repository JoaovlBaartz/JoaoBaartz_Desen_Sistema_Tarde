<html>
    <head>
        <title>Primeiro programa PHP</title>
    </head>
    <body>
        <?php
            echo "<h1>Hello world, PHP 7!</h1>";
        ?>

        <?php
            print "teste <br>"; 
            print "Ola Mundo <br>";
            print "Escape 'chars' são os MESMO com em C\n <br>"; 
            print "Voce pode ter quebra de linhas em uma string. <br>"; 
            print 'Usa string pode usar "apas duplas". isso e muito legal !<br>'; 
            print 'Ainda pode-ser usar apas simples dessa forma It\'s cool !<br>'; 

        ?>


        <?php
            echo " <h2 align='center'>
                O meu programa esta ecoando corretamente
                no meu servidor PHP!
                </h2>";

        ?>
        <?php
            echo " <h2 align='center'>
                   João Vitor Luçolli Baartz
                </h2>";

        ?>
        
        <?php
            phpinfo();
        ?>
    </body>
</html>
