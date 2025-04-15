<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USO DE CASOS</title>
</head>
<body>
    <?php
    $s = "lampada";
    switch ($s) {
        case "casa":
            print "A casa e amarela";
            break;
        case "arvore":
            print "a arvore e bonita";
            break;
        case "lampada":
            print "joao apagou a lampada";
               break;
        default:
           print "voce nao selecionou";
           break;
     }
    ?>
</body>
</html>