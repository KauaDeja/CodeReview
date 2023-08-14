<!DOCTYPE html>
<html>
<head>
    <title>Teste de Conexão</title>
</head>
<body>
    <h1>Teste de Conexão</h1>

    <form method="GET" action="">
        <label for="count">Digite o número de pings (1-4):</label>
        <input type="number" name="count" id="count" min="1" max="4" required>
        <button type="submit">Testar Conexão</button>
    </form>

    <div>
        <h2>Resultado do Teste:</h2>
        <pre>
            <?php

            function ValidarCount($count){
                if($count >=1 && $count <=4){
                    $result = is_int((int)$count);
                    return ($result == true)? $count : false;
                }else{
                     return false;
                }
            }

            if (isset($_GET["count"])) {
                $count = ValidarCount($_GET["count"]);
                if($count !== false){
                    $output_command = shell_exec("ping pentesterlab.com -c ".$count);
                    if($output_command !== null){
                        echo "<pre>" . htmlspecialchars($output_command) . "</pre>";
                    }else{
                        echo "Comando vazio";
                    }
                }else {
                    echo "Erro";
                }

                //echo shell_exec("ping pentesterlab.com -c " . escapeshellcmd($_GET['count']));
            }
            ?>
        </pre>
    </div>
</body>
</html>