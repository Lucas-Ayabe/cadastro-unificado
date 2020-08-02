<?php

if (!function_exists("setFlash")) {
    function setFlash($flash)
    {
        if (isset($_SESSION)) {
            $_SESSION['flash'] = $flash;
        }
    }
}

if (!function_exists("getFlash")) {
    function getFlash()
    {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }

        return null;
    }
}
