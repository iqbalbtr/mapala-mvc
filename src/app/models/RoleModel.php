<?php

namespace Tugas\UkmProject\app\models;

use mysqli;
use Tugas\UkmProject\app\Responses;

class RoleModel
{

    private ?mysqli $db;
    private array $protect_role;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
        $this->protect_role = ["admin", "ketua", "anggota"];
    }

    public function protect_role(
        string $req_role
    ) {

        if (in_array($req_role, $this->protect_role)) {
            return Responses::Res(false, "Role dilindungi");
        }

        return Responses::Res(true, "");
    }


    function create(
        string $nama,
        string $deskripsi
    ) {

        $exist = $this->db->query("SELECT * FROM tb_role WHERE nama='$nama'");

        if ($exist->num_rows >= 1) {
            return Responses::Res(false, "Role telah ada");
        }

        $stmt = $this->db->prepare("INSERT INTO tb_role (nama, deskripsi) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $deskripsi);
        
        if ($stmt->execute()) {
            return Responses::Res(true, "Berhasil menambahkan role baru");
        } else {
            return Responses::Res(false, "Gagal menambahkan role baru");
        }
    }

    function delete(
        int $id
    ) {
        $exist = $this->db->query("SELECT * FROM tb_role WHERE id=$id");

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "Role tidak ditemukan");
        }

        $role = $exist->fetch_assoc();

        $protect = $this->protect_role($role["nama"]);


        if (!$protect["status"]) {
            return $protect;
        }

        $this->db->query("DELETE FROM tb_role WHERE id=$id");


        return Responses::Res(true, "Berhasil menghapus role");
    }

    function update(
        int $id,
        string $nama,
        string $deskripsi
    ) {
        $exist = $this->db->query("SELECT * FROM tb_role WHERE id=$id");

        $role = $exist->fetch_assoc();

        $protect = $this->protect_role($role["nama"]);

        if (!$protect["status"]) {
            return $protect;
        }

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "Role tidak ditemukan");
        }

        $stmt = $this->db->prepare("UPDATE tb_role SET nama = ?, deskripsi = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nama, $deskripsi, $id);

        if ($stmt->execute()) {
            return Responses::Res(true, "Berhasil mengupdate role");
        } else {
            return Responses::Res(false, "Gagal mengupdate role");
        }
    }

    function getById(
        int $id
    ) {
        $exist = $this->db->query("SELECT * FROM tb_role WHERE id=$id");
        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "Role tidak ditemukan");
        }

        return Responses::Res(true, "", $exist->fetch_assoc());
    }

    function getAll($page)
    {

        $user = $this->db->query("SELECT tb_user.nim, tb_role.nama AS role, tb_user.id, tb_user.status, tb_user_info.nama, tb_user_info.alamat, tb_user_info.no_hp, tb_user_info.tgl_lahir FROM tb_user INNER JOIN tb_user_info ON tb_user.user_info_id = tb_user_info.id INNER JOIN tb_role ON tb_user.role_id = tb_role.id");

        $count = $user->num_rows;

        $limit = 5;

        $pagination = ceil($count / $limit);

        $offset = ($page - 1) * $limit;

        $get = $this->db->query("SELECT * FROM tb_role LIMIT $limit OFFSET $offset");

        $data = array();
        while ($row = $get->fetch_assoc()) {
            $data[] = $row;
        }

        $response = array(
            "count" => $count,
            "data" => $data,
            "pagination" => $pagination,
            "page" => $page
        );

        return Responses::Res(true, "", $response);
    }

    function getSelect()
    {
        $result = $this->db->query("SELECT * FROM tb_role");

        return Responses::Res(true, "", $result->fetch_all(MYSQLI_ASSOC));
    }
}
