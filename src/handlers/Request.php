<?php
namespace src\handlers;

class Request
{
    public function getRequestData(): array
    {
        parse_str(file_get_contents('php://input'), $input);
        return $input;
    }

    public function getRequestFiles(): array
    {
        if (isset($_FILES) && !empty($_FILES)) {
            return $_FILES;
        }

        return [];
    }
}
