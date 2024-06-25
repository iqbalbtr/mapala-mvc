<?php

namespace Tugas\UkmProject\app\controller;

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

        if (isset($_SESSION["login"])) {
            Responses::Redirect("?page=dashboard", "/admin");
        }

        return include __DIR__ . "/../../../views/component/auth/login.php";
    }


    function login()
    {
        $nim = $_POST["nim"];
        $password = $_POST["password"];

        if (empty($nim) || empty($password)) {
            Responses::Redirect("Isi tidak lengkap", "/auth/login");
        }

        $result = $this->user_service->login($nim, $password);

        if (empty($result["data"]["id"])) {
            return Responses::Redirect("?page=dashboard&pesan=" . $result["message"], "/auth/login");
        }

        $_SESSION["login"] = true;
        $_SESSION["nim"] = $nim;
        $_SESSION["nama"] = $result["data"]["nama"];
        $_SESSION["role"] = $result["data"]["role"];
        $_SESSION["id"] = $result["data"]["id"];

        if ($result["status"]) {
            return Responses::Redirect("?page=dashboard&pesan=" . $result["message"], "/admin");
        } else {
            return Responses::Redirect("?page=dashboard&pesan=" . $result["message"], "/auth/login");
        }
    }


    function register()
    {
        $name = $_POST["nama"];
        $nim = $_POST["nim"];
        $address = $_POST["alamat"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $no_hp = $_POST["no_hp"];
        $password = $_POST["password"];

        if (empty($nim) || empty($password) || empty($name) || empty($address)) {
            Responses::Redirect("?pesan=Data tidak lengkap", "/auth/register");
        }

        $result = $this->user_service->register($name, $nim, $tgl_lahir, $no_hp, $address, $password);

        if ($result["status"]) {
            Responses::Redirect("?pesan=" . $result["message"], "/auth/login");
        } else {
            Responses::Redirect("?pesan=" . $result["message"], "/auth/register");
        }
    }

    function registerForm()
    {
        if (isset($_SESSION["login"])) {
            Responses::Redirect("?page=dashboard", "/admin");
        }

        return include __DIR__ . "/../../../views/component/auth/register.php";
    }

    function logout()
    {
        session_destroy();
        Responses::Redirect("?pesan=Berhasil logout", "/auth/login");
    }
}
