<?php
require_once 'functions.php';
session_start();

if (isset($_SESSION['xml']) && !empty($_SESSION['xml'])) {
    $xml = $_SESSION['xml'];

    $tags = filter_input(
        INPUT_POST,
        "tags",
        FILTER_DEFAULT,
        FILTER_FORCE_ARRAY
    );

    if ($tags) {
        $_SESSION['filteredXml'] = array_filter(
            $xml,
            function ($value, $tag) use ($tags) {
                return in_array($tag, $tags);
            },
            ARRAY_FILTER_USE_BOTH
        );

        header("Location: ../show-data.php");
        exit();
    }
}

setFlash("Selecione os campos a serem enviados.");
header("Location: ../select-data.php");
