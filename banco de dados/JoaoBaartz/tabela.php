<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela_php</title>
    <style type = "text/css">
        table{
            border-collapse: collapse;
        }
        th, td{
            border-style: solid;
            width: 50px;
        }
    </style>
</head>
<body>
    <table>
      <?php
         for ($i=1;$i<=5;$i++)
         {
            echo"<tr>";
            for ($c=1; $c<=20 ;$c++)
            {
                echo "<td> $1,$c </td>";
            }
            echo"</tr>";
         }
      ?>
    </table>
    <?php
        echo " <h2 align='center'>
               João Vitor Luçolli Baartz
               </h2>";

    ?>
</body>
</html>