<?php
// phpcs:disable
$render('header'); ?>
<main class="main super-centered">
    <div class="flow text-center">
        <!-- <a href="./index.php">Enviar outro arquivo</a> -->
        <article class="card is-center flow" style=" --flow: 1em;">
            <h3 style="text-transform: uppercase;">Fornecedor</h3>
            <h1 style="margin-top: 0;"><?= $providerName ?></h1>
            <p>Selecione as linhas a serem importadas e depois clique no botão abaixo.</p>
            
            <form class="flow" action="./create-csv" method="POST">
                <button class="button is-primary">Criar CSV</button>
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>[]</th>
                                <th>Cód. Forn</th>
                                <th>Desc Prod</th>
                                <th>NCM</th>
                                <th>Origem</th>
                                <th>Valor Unit</th>
                                <th>EAN</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($dets as $det): ?>
                                <tr>
                                    <td><input type="checkbox" name="dets[]" id="det-<?= $det->id ?>" value="<?= $det->id ?>"></td>
                                    <td><?= $det->providerCode ?></td>
                                    <td><?= $det->productDescription ?></td>
                                    <td><?= $det->ncm ?></td>
                                    <td><?= $det->origin ?></td>
                                    <td><?= $det->unitaryValue ?></td>
                                    <td><?= $det->ean ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </article>
    </div>
</main>
<?php $render('header'); ?>
