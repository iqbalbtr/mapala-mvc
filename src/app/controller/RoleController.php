<?php

namespace Tugas\UkmProject\app\controller;

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
        $nama = $_POST["nama"];
        $deskripsi = $_POST["deskripsi"];

        $result = $this->role_Service->create($nama, $deskripsi);

        if($result["status"]){
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        } else {
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        }
    }

    function getById()
    {
        $id = $_GET["id"];
        $result = $this->role_Service->getById($id);

        if($result["status"]){
            return Responses::Res(true, "", $result)["data"];
        } else {
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        }
    }

    function delete()
    {
        $id = $_GET["id"];

        $result = $this->role_Service->delete($id);

        if($result["status"]){
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        } else {
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        }
}

    function update()
    {
        $nama = $_POST["nama"];
        $deskripsi = $_POST["deskripsi"];
        $id = $_POST["id"];

        $result = $this->role_Service->update($id, $nama, $deskripsi);

        if ($result["status"]) {
            Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        } else {
            Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        }
    }

    function getAll() {
        
        $result = $this->role_Service->getSelect();
        
        if($result["status"]){
            return Responses::Res(true, "", $result)["data"];
        } else {
            return Responses::Redirect("?page=anggota&tipe=master-role&pesan=" . $result["message"], "/admin");
        }

    }
}
