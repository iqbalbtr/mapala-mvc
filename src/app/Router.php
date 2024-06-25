<?php

namespace Tugas\UkmProject\app;

use Tugas\UkmProject\app\Middlewares;

class Router
{

    private static array $routes = [];
    private static array $middlewares = [];

    public static function add(
        string $method,
        string $path,
        string $controller,
        string $function,
        array $middleware = null
    ) {
        self::$routes[] = [
            "method" => $method,
            "path" => $path,
            "controller" => $controller,
            "function" => $function
        ];

        if (isset($middleware)) {
            self::$middlewares[$path] = $middleware;
        }
    }

    public static function run()
    {
        $path  = "/";
        if (isset($_SERVER["PATH_INFO"])) {
            $path = $_SERVER["PATH_INFO"];
        }

        $method = $_SERVER["REQUEST_METHOD"];

        foreach (self::$routes as $route) {
            if ($path == $route["path"] && $method == $route["method"]) {

                if (isset(self::$middlewares[$path])) {

                    $middlewares = new Middlewares();
                    $path_middleware = self::$middlewares[$path];

                    $function = $path_middleware["function"];
                    $params = isset($path_middleware["params"]) ? $path_middleware["params"] : null;
                    $result = $middlewares->$function($params);


                    if (!$result["status"]) {
                        header("Location: /admin?page=dashboard&pesan=" . $result["message"]);
                        exit;
                    }
                }

                $controller = new $route["controller"];
                $function = $route["function"];

                $controller->$function();
                return;
            }
        }

        // Jika contoller tidak ditemukan
        http_response_code(404);
    }
}
