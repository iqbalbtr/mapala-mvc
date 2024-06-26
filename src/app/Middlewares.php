<?php

namespace Tugas\UkmProject\app;

class Middlewares
{
    private static array $auth_path = ["/api", "/admin", "/auth"];

    public static function set(
        string $funtion,
        $params = null
    ) {

        return array(
            "function" => $funtion,
            "params" => $params
        );
    }

    public static function use(string $path, string $function)
    {
        $session_path = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/";

        if (strpos($session_path, $path) === 0) {
            $middlewares = new Middlewares();
            $middlewares->$function();
        } 
    }

    public static function auth()
    {
        $path = $_SERVER["PATH_INFO"];

        if ($path === '/auth/login' || $path === '/auth/register') {
            return;
        }

        if (empty($_SESSION["login"])) {
            header("Location: /auth/login");
            exit;
        } else {
            foreach (self::$auth_path as $current) {
                if (strpos($path, $current) !== false) {
                    return;
                }
            }
            header("Location: /admin");
            exit;
        }
    }
    public static function role(array $roles)
    {

        $role = $_SESSION["role"];

        if (in_array($role, $roles)) {
            return Responses::Res(true, "");
        } else {
            return Responses::Res(false, "User tidak memiliki akses");
        }
    }
}
