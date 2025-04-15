<html>
    <body>
        <?php
           // Define o fuso horário
           date_default_timezone_set('America/Sao_Paulo');

           // Pega a data atual
           $data_hoje = date("d/m/y", time());

           // Pega a hora atual
           $hora_agora = date("H:i:s", time());
        ?>
        
        <p align="center">Hoje é dia <?php echo $data_hoje; ?> e são <?php echo $hora_agora; ?> Horas</p>

        <?php
            echo "<h2 align='center'>João Vitor Luçolli Baartz</h2>";
        ?>
    </body>
</html>
