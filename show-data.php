<?php
// phpcs:disable

$filteredXml = $filtrado;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>XML Storage</title>
        <link rel="stylesheet" href="../assets/css/styles.css" />
    </head>
    <body class="super-centered">
        <main class="flow text-center">
            <a href="./index.php">Enviar outro arquivo</a>
            <article class="card is-center flow" style=" --flow: 1em;">
                <h3>Fornecedor</h3>
                <h1 style="margin-top: .5em;"><?=$filteredXml['nomeFornecedor']?></h1>
                <p>Confira abaixo os dados salvos </p>
                
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cód. Forn</th>
                                <th>Desc Prod</th>
                                <th>NCM</th>
                                <th>Origem</th>
                                <th>Valor Unit</th>
                                <th>EAN</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($filteredXml['dets'] as $det): ?>
                                <tr>
                                    <td><?=$det['cProd']?></td>
                                    <td><?=$det['xProd']?></td>
                                    <td><?=$det['NCM']?></td>
                                    <td><?=$det['orig']?></td>
                                    <td><?=$det['vUnCom']?></td>
                                    <td><?=$det['cEAN']?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- <code class="code"><?=var_dump($filteredXml)?></code> -->
            </article>
        </main>
    </body>
</html>
