<?php $render('header'); ?>

<main class="super-centered main">
    <form
        action="./handle"
        method="POST"
        enctype="multipart/form-data"
        class="card is-center flow"
        style="width: 450px;"
    >
        <h1>XML Storage</h1>
        <div class="field is-file">
            <label for="xml" class="label">Seu arquivo XML</label>
            <input id="xml" name="xml" type="file" class="input" />
        </div>

        <button class="button is-primary">Enviar XML</button>
    </form>
</main>

<?php $render('footer'); ?>
