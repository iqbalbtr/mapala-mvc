<?php

namespace Tugas\UkmProject\app\models;

use mysqli;
use Tugas\UkmProject\app\Responses;

class ProfileModel
{

    private mysqli $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    function update(
        int $id,
        string $nama,
        string $alamat,
        string $email,
        string $no_hp,
    ) {

        $stmt = $this->db->prepare("UPDATE tb_profile SET nama = ?, alamat = ?, email = ?, no_hp = ? WHERE id = ?");

        $stmt->bind_param("ssssi", $nama, $alamat, $email, $no_hp, $id);

        if ($stmt->execute()) {
            return Responses::Res(true, "Berhasil mengubah profile");
        } else {
            return Responses::Res(false, "Gagal mengubah profile");
        }
    }

    function getById(
        int $id
    ) {

        $result = $this->db->query("SELECT * FROM tb_profile WHERE id=$id");

        if ($result->num_rows <= 0) {
            return Responses::Res(false, "Profile tidak ditemukan");
        }

        return Responses::Res(true, "", $result->fetch_assoc());
    }
}
