<?php

namespace Tugas\UkmProject\app\controller;

use Exception;
use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\models\RoleModel;
use Tugas\UkmProject\app\Responses;

class RoleController
{

    private ?RoleModel $role_Service;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->role_Service = new RoleModel($db);
    }


    function create()
    {
        try {
            $nama = $_POST["nama"];
            $deskripsi = $_POST["deskripsi"];

            $result = $this->role_Service->create($nama, $deskripsi);

            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $e->getMessage(), "/admin");
        }
    }

    function getById()
    {
        try {
            $id = $_GET["id"];
            $result = $this->role_Service->getById($id);

            return Responses::Res(true, "", $result)["data"];
        } catch (Exception $e) {
            return Responses::Res(false, $e->getMessage(), $result);
        }
    }

    function delete()
    {
        try {
            $id = $_GET["id"];

            $result = $this->role_Service->delete($id);

            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $e->getMessage(), "/admin");
        }
    }

    function update()
    {
        try {
            $nama = $_POST["nama"];
            $deskripsi = $_POST["deskripsi"];
            $id = $_POST["id"];

            $result = $this->role_Service->update($id, $nama, $deskripsi);

            Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $e->getMessage(), "/admin");
        }
    }

    function getAll()
    {
        try {
            $result = $this->role_Service->getSelect();
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $e->getMessage(), "/admin");
        }
    }
}
