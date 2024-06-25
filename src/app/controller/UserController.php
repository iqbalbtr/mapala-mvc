<?php

namespace Tugas\UkmProject\app\controller;

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

        $id = $_GET["id"];

        if (!$id) {
            Responses::Redirect('?pesan=Id tidak ditemukan', "/admin");
        }

        $result = $this->user_service->deleteUserById($id);

        if ($result["status"]) {
            Responses::Redirect('?page=anggota&tipe=master-anggota&pesan=' . $result["message"], "/admin");
        } else {
            Responses::Redirect('?page=anggota&tipe=master-anggota&pesan=' . $result["message"], "/admin");
        }
    }

    function update()
    {
        $id = $_POST["id"];
        $name = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $no_hp = $_POST["no_hp"];
        $role = $_POST["role"];
        $status = $_POST["status"];

        if (
            empty($name) ||
            empty($alamat) ||
            empty($no_hp) ||
            empty($tgl_lahir) ||
            empty($status)
        ) {
            Responses::Redirect("?page=anggota&tipe=master-anggota&pesan=Isi tidak lengkap", "/admin");
        }

        $result = $this->user_service->updateUser($id, $name, $tgl_lahir, $no_hp, $alamat, $role, $status);

        if ($result["status"]) {
            Responses::Redirect("?page=anggota&tipe=master-anggota&pesan=" .  $result["message"], "/admin");
        } else {
            Responses::Redirect("?page=anggota&tipe=master-anggota&pesan=" . $result["message"], "/admin");
        }
    }

    function updatePassword()
    {
        $new = $_POST["new"];
        $confirm = $_POST["confirm"];
        $current = $_POST["current"];
        $id = $_SESSION["id"];

        if (trim($new) != trim($confirm)) {
            Responses::Redirect("?page=setelan&tipe=ubah-password&pesan=Sandi tidak sama", "/admin");
        }

        $result = $this->user_service->updatePassword($id, $current, $new);

        if ($result["status"]) {
            Responses::Redirect("?page=setelan&tipe=ubah-password&pesan=Sandi berhasil di ubah", "/admin");
        } else {
            Responses::Redirect("?page=setelan&tipe=ubah-password&pesan=" . $result["message"], "/admin");
        }
    }

    function getUserById(){
        $id = $_GET["id"];

        if(empty($id)){
            Responses::Redirect("?page=profile", "/admin");
        }

        $result = $this->user_service->getUserById($id);

        if($result["status"]){
            return $result;
        } else {
            Responses::Redirect("?page=profile&pesan=" . $result["message"], "/admin");
        }
    }

    function updateProfileUser(){

        $id = $_SESSION["id"];
        $name = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $no_hp = $_POST["no_hp"];
        
        $result = $this->user_service->updateProfileUser($id, $name, $no_hp, $tgl_lahir, $alamat);

       
        if ($result["status"]) {
            Responses::Redirect("?page=setelan&tipe=ubah-profile&pesan=" . $result["message"], "/admin");
        } else {
            Responses::Redirect("?page=setelan&tipe=ubah-profile&pesan=" . $result["message"], "/admin");
        }
    }
}
