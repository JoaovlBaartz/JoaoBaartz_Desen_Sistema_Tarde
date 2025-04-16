<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada PHP</title>
    <style type="text/css">
        table{
            border-collapse: collapse;
        }
        th, td{
            border-style: solid;
            width: auto;
        }
    </style>
</head>
<body>
    <table>
        <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr>";
                for ($c = 1; $c <= 10; $c++) {
                    $resultado = $i * $c;
                    echo "<td>$i x $c = $resultado</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

    <?php
        echo "<h2 align='center'>João Vitor Luçolli Baartz</h2>";
    ?>
</body>
</html>
