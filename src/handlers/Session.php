<?php
namespace src\handlers;

use Exception;

class Session
{
    public function __construct()
    {
        self::start();
    }

    public static function start(): bool
    {
        return session_start();
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        throw new Exception("Session key doesn't exist.");
    }

    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function setFlash($value): void
    {
        $_SESSION['flash'] = $value;
    }

    public static function getFlash()
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION["flash"]);
        return $flash;
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function hasValueIn($key)
    {
        return self::has($key) && !empty(self::get($key));
    }

    public static function close(): bool
    {
        return session_destroy();
    }
}
