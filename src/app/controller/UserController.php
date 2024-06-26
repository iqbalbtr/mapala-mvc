<?php

namespace Tugas\UkmProject\app\controller;

use Exception;
use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\models\UserModel;
use Tugas\UkmProject\app\Responses;

class UserController
{
    private UserModel $user_service;

    public function __construct()
    {
        $sql = Database::getConnection();
        $this->user_service = new UserModel($sql);
    }

    function delete()
    {
        try {
            $id = $_GET["id"];
            $result = $this->user_service->deleteUserById($id);

            return Responses::Redirect('?page=anggota&tipe=master-anggota&pesan=' . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect('?page=anggota&tipe=master-anggota&pesan=' . $e->getMessage(), "/admin");
        }
    }

    function update()
    {
        try {
            $id = $_POST["id"];
            $name = $_POST["nama"];
            $alamat = $_POST["alamat"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $no_hp = $_POST["no_hp"];
            $role = $_POST["role"];
            $status = $_POST["status"];

            $result = $this->user_service->updateUser($id, $name, $tgl_lahir, $no_hp, $alamat, $role, $status);

            return Responses::Redirect("?page=anggota&tipe=master-anggota&pesan=" .  $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=anggota&tipe=master-anggota&pesan=" . $e->getMessage(), "/admin");
        }
    }

    function updatePassword()
    {
        try {
            $new = $_POST["new"];
            $confirm = $_POST["confirm"];
            $current = $_POST["current"];
            $id = $_SESSION["id"];

            if (trim($new) != trim($confirm)) {
                throw new Exception("Sandi tidak sama");
            }

            $this->user_service->updatePassword($id, $current, $new);

            return Responses::Redirect("?page=setelan&tipe=ubah-password&pesan=Sandi berhasil di ubah", "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=setelan&tipe=ubah-password&pesan=" . $e->getMessage(), "/admin");
        }
    }

    function getUserById()
    {
        try {
            $id = $_GET["id"];

            $result = $this->user_service->getUserById($id);

            return $result;
        } catch (Exception $e) {
            return Responses::Redirect("?page=profile&pesan=" . $e->getMessage(), "/admin");
        }
    }

    function updateProfileUser()
    {

        try {
            $id = $_SESSION["id"];
            $name = $_POST["nama"];
            $alamat = $_POST["alamat"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $no_hp = $_POST["no_hp"];

            $result = $this->user_service->updateProfileUser($id, $name, $no_hp, $tgl_lahir, $alamat);

            return Responses::Redirect("?page=setelan&tipe=ubah-profile&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=setelan&tipe=ubah-profile&pesan=" . $e->getMessage(), "/admin");
        }
    }
}
