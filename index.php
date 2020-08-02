<?php
// phpcs:disable
require_once "./app/functions.php";
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>XML Storage</title>
        <link rel="stylesheet" href="./assets/css/styles.css" />
    </head>
    <body class="super-centered">
        <main>
            <form
                action="app/handle-xml.php"
                method="POST"
                enctype="multipart/form-data"
                class="card is-center flow"
                style="width: 450px;"
            >
                <h1>XML Storage</h1>
                <?php if (
                    isset($_SESSION['flash']) &&
                    !empty($_SESSION['flash'])
                ): ?>
                <p class="alert is-danger"><?= getFlash() ?></p>
                <?php endif; ?>

                <div class="field is-file">
                    <label for="xml" class="label">Seu arquivo XML</label>
                    <input id="xml" name="xml" type="file" class="input" />
                </div>

                <button class="button is-primary">Enviar XML</button>
            </form>
        </main>

        <script src="./assets/js/script.js"></script>
    </body>
</html>
