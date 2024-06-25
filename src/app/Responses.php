<?php

namespace Tugas\UkmProject\app;

class Responses
{

    public static function Res(
        bool $status,
        string $msg,
        $data = null
    ) {

        return array(
            "status" => $status,
            "message" => $msg,
            "data" => $data
        );
    }

    public static function Redirect(
        string $msg,
        string $path
    ) {

        header("Location: " . $path . $msg);
        exit;
    }
}
