<?php

namespace Tugas\UkmProject\app;

use mysqli;

class Database
{
    private static ?mysqli $mysqli = null;

    public static function getConnection(): mysqli
    {
        if (self::$mysqli === null) {
            $host = "localhost";
            $db = "db_ukm";
            $user = "root";
            $pass = "";

            self::$mysqli = new mysqli($host, $user, $pass, $db);

            if (self::$mysqli->connect_error) {
                die('koneksi Error (' . self::$mysqli->connect_errno . ') ' . self::$mysqli->connect_error);
            }
        }

        return self::$mysqli;
    }
}
