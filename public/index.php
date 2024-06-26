<?php
session_start();
require_once __DIR__ . "/../vendor/autoload.php";

use Tugas\UkmProject\app\Router;
use Tugas\UkmProject\app\controller\HomeController;
use Tugas\UkmProject\app\controller\AuthController;
use Tugas\UkmProject\app\controller\UserController;
use Tugas\UkmProject\app\controller\AdminController;
use Tugas\UkmProject\app\controller\NewsController;
use Tugas\UkmProject\app\controller\ProfileController;
use Tugas\UkmProject\app\controller\RoleController;
use Tugas\UkmProject\app\Middlewares;


Router::add("GET", "/", HomeController::class, "index");
Router::add("GET", "/berita", NewsController::class, "newsPage");

Middlewares::use("/auth", "auth");
Router::add("GET", "/auth/login", AuthController::class, "loginForm");
Router::add("POST", "/auth/login", AuthController::class, "login");
Router::add("GET", "/auth/register", AuthController::class, "registerForm");
Router::add("POST", "/auth/register", AuthController::class, "register");
Router::add("GET", "/auth/logout", AuthController::class, "logout");

Middlewares::use("/admin", "auth");
Router::add("GET", "/admin", AdminController::class, "adminPanel");

Middlewares::use("/api", "auth");
Router::add("GET", "/api/user/delete", UserController::class, "delete", Middlewares::set("role", ["admin", "ketua"]));
Router::add("POST", "/api/user/update", UserController::class, "update", Middlewares::set("role", ["admin", "ketua"]));
Router::add("POST", "/api/user/change-password", UserController::class, "updatePassword");
Router::add("POST", "/api/user/change-profile", UserController::class, "updateProfileUser");

Router::add("POST", "/api/news/create", NewsController::class, "create", Middlewares::set("role", ["admin", "ketua"]));
Router::add("GET", "/api/news/delete", NewsController::class, "delete", Middlewares::set("role", ["admin", "ketua"]));
Router::add("POST", "/api/news/update", NewsController::class, "update", Middlewares::set("role", ["admin", "ketua"]));

Router::add("POST", "/api/role/update", RoleController::class, "update", Middlewares::set("role", ["admin", "ketua"]));
Router::add("POST", "/api/role/create", RoleController::class, "create", Middlewares::set("role", ["admin", "ketua"]));
Router::add("GET", "/api/role/delete", RoleController::class, "delete", Middlewares::set("role", ["admin", "ketua"]));

Router::add("POST", "/api/profile/update", ProfileController::class, "update");

Router::run();
