<?php
// phpcs:disable
require_once "./app/functions.php";
session_start();

if (!isset($_SESSION['xml']) || empty($_SESSION['xml'])) {
    header("Location: index.php");
    exit();
}

$xml = $_SESSION['xml'];
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
                action="app/save-xml.php"
                method="POST"
                class="card flow"
                style="width: 450px;"
            >
                <h1>XML Storage</h1>
                <p>Escolha os campos que serão salvos.</p>

                <?php if (
                    isset($_SESSION['flash']) &&
                    !empty($_SESSION['flash'])
                ): ?>
                <p class="alert is-danger"><?= getFlash() ?></p>
                <?php endif; ?>

                <?php foreach ($xml as $tag => $content): ?>
                <div class="field is-checkbox">
                    <label for="tag_<?= $tag ?>" class="label"><?= $tag ?></label>
                    <input id="tag_<?= $tag ?>" name="tags[]" value="<?= $tag ?>" type="checkbox" class="input" />
                </div>
                <?php endforeach; ?>

                <button class="button is-primary">Enviar XML</button>
            </form>
        </main>

        <script src="./assets/js/script.js"></script>
    </body>
</html>
