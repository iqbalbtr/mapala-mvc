<?php

namespace Tugas\UkmProject\app\controller;

use Exception;
use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\Responses;
use Tugas\UkmProject\app\models\UserModel;

class AuthController
{

    private UserModel $user_service;

    public function __construct()
    {
        $sql = Database::getConnection();
        $this->user_service = new UserModel($sql);
    }


    function loginForm()
    {
        try {
            return include __DIR__ . "/../../../views/component/auth/login.php";
        } catch (Exception $e) {
            // return Responses::ErrorPage(500, "Internal server error");
        }
    }


    function login()
    {
        try {
            $nim = $_POST["nim"];
            $password = $_POST["password"];

            $result = $this->user_service->login($nim, $password);

            $_SESSION["login"] = true;
            $_SESSION["nim"] = $nim;
            $_SESSION["nama"] = $result["data"]["nama"];
            $_SESSION["role"] = $result["data"]["role"];
            $_SESSION["id"] = $result["data"]["id"];

            return Responses::Redirect("?page=dashboard&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=dashboard&pesan=" . $e->getMessage(), "/auth/login");
        }
    }


    function register()
    {
        try {
            $name = $_POST["nama"];
            $nim = $_POST["nim"];
            $address = $_POST["alamat"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $no_hp = $_POST["no_hp"];
            $password = $_POST["password"];

            $result = $this->user_service->register($name, $nim, $tgl_lahir, $no_hp, $address, $password);

            return Responses::Redirect("?pesan=" . $result["message"], "/auth/login");
        } catch (Exception $e) {
            return Responses::Redirect("?pesan=" . $e->getMessage(), "/auth/register");
        }
    }

    function registerForm()
    {
        try {
            return include __DIR__ . "/../../../views/component/auth/register.php";
        } catch (Exception $e) {
            // return Responses::ErrorPage(500, "Internal server Erro");
        }
    }

    function logout()
    {
        try {
            session_destroy();
            return Responses::Redirect("?pesan=Berhasil logout", "/auth/login");
        } catch (Exception $e) {
            return Responses::Redirect("?pesan=gagal logout", "/auth/login");
        }
    }
}
