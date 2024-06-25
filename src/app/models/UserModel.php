<?php

namespace Tugas\UkmProject\app\models;

use Tugas\UkmProject\app\Database;
use mysqli;
use Tugas\UkmProject\app\Responses;

class UserModel
{

    private mysqli $db;
    private array $protect_user;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
        $this->protect_user = ["12345678"];
    }

    function protect_user($user)
    {
        if (in_array($user, $this->protect_user)) {
            return Responses::Res(false, "User dilindungi");
        } else {
            return Responses::Res(true, "");
        }
    }

    function login(
        string $nim,
        string $password
    ) {

        $user_exist = $this->db->query("SELECT tb_user.id, tb_user_info.nama, tb_user.nim , tb_user.password, tb_role.nama AS role FROM tb_user INNER JOIN tb_role ON tb_role.id = tb_user.role_id INNER JOIN tb_user_info ON tb_user.user_info_id = tb_user_info.id WHERE nim=$nim");

        if (!$user_exist->num_rows === 0) {
            return Responses::Res(false, "User tidak ditemukan");
        }

        $result = $user_exist->fetch_assoc();

        if (!password_verify($password, $result["password"])) {
            return Responses::Res(false, "Kata sandi atau username salah");
        }

        return Responses::Res(true, "Login telah berhasil", $result);
    }

    function register(
        string $nama,
        string $nim,
        string $tgl_lahir,
        string $no_hp,
        string $alamat,
        string $password
    ) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $user_exist = $this->db->query("SELECT * FROM tb_user WHERE nim=$nim");

        if ($user_exist->num_rows >= 1) {
            return Responses::Res(false, "User telah terdaftar");
        }

        $stmt_info = $this->db->prepare("INSERT INTO tb_user_info (nama, alamat, no_hp, tgl_lahir) VALUES (?, ?, ?, ?)");
        $stmt_info->bind_param("ssss", $nama, $alamat, $no_hp, $tgl_lahir);

        if ($stmt_info->execute()) {
            $result = $this->db->insert_id;

            $stmt_user = $this->db->prepare("INSERT INTO tb_user (nim, password, user_info_id, role_id, status) VALUES (?, ?, ?, '1', 'aktif')");
            $stmt_user->bind_param("ssi", $nim, $hash, $result);

            if ($stmt_user->execute()) {
                return Responses::Res(true, "User telah dibuat");
            } else {
                return Responses::Res(false, "Gagal menambahkan user baru");
            }
        } else {
            return Responses::Res(false, "Gagal menambahkan user info");
        }
    }

    function getAllUser($page)
    {

        $user = $this->db->query("SELECT * FROM tb_user");

        $count = $user->num_rows;

        $limit = 5;

        $pagination = ceil($count / $limit);

        $offset = ($page - 1) * $limit;

        $get = $this->db->query("SELECT tb_user.status, tb_user.nim, tb_role.nama AS role, tb_user.id, tb_user.status, tb_user_info.nama, tb_user_info.alamat, tb_user_info.no_hp, tb_user_info.tgl_lahir FROM tb_user INNER JOIN tb_user_info ON tb_user.user_info_id = tb_user_info.id INNER JOIN tb_role ON tb_user.role_id = tb_role.id LIMIT $limit OFFSET $offset");

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

    function getUserById(
        int $id
    ) {

        $result = $this->db->query("SELECT tb_user.nim, tb_user.role_id, tb_user.status, tb_role.nama AS role, tb_user.id, tb_user.status, tb_user_info.nama, tb_user_info.alamat, tb_user_info.no_hp, tb_user_info.tgl_lahir FROM tb_user INNER JOIN tb_user_info ON tb_user.user_info_id = tb_user_info.id INNER JOIN tb_role ON tb_user.role_id = tb_role.id WHERE tb_user.id=$id");

        if ($result->num_rows <= 0) {
            return Responses::Res(false, "User tidak ditemukan");
        }

        return Responses::Res(true, "", $result->fetch_assoc());
    }

    function deleteUserById(
        int $id
    ) {
        $exist = $this->db->query("SELECT * FROM tb_user WHERE id=$id");

        $nim = $exist->fetch_assoc()["nim"];

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "User tidak ditemukan");
        }

        $protect = $this->protect_user($nim);

        if (!$protect["status"]) {
            return $protect;
        }

        $this->db->query("DELETE FROM tb_user WHERE id=$id");

        return Responses::Res(false, "Berhasil menghapus user");
    }

    function updateUser(
        int $id,
        string $nama,
        string $tgl_lahir,
        string $no_hp,
        string $alamat,
        string $role,
        string $status
    ) {
        $exist = $this->db->query("SELECT * FROM tb_user WHERE id=$id");

        $user = $exist->fetch_assoc();
        $user_info_id = $user["user_info_id"];
        $nim = $user["nim"];

        $protect = $this->protect_user($nim);

        if ($protect["status"] === false) {
            return $protect;
        }

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "User tidak ditemukan");
        }

        $stmt_info = $this->db->prepare("UPDATE tb_user_info SET nama = ?, tgl_lahir = ?, no_hp = ?, alamat = ? WHERE id = ?");
        $stmt_info->bind_param("ssssi", $nama, $tgl_lahir, $no_hp, $alamat, $user_info_id);

        if ($stmt_info->execute()) {
            $stmt_user = $this->db->prepare("UPDATE tb_user SET role_id = ?, status = ? WHERE id = ?");
            $stmt_user->bind_param("ssi", $role, $status, $id);

            if ($stmt_user->execute()) {
                return Responses::Res(true, "Suksess");
            } else {
                return Responses::Res(false, "Gagal mengupdate user");
            }
        } else {
            return Responses::Res(false, "Gagal mengupdate user info");
        }
    }

    function updatePassword(
        int $id,
        string $current,
        string $new
    ) {
        $exist = $this->db->query("SELECT COUNT(*) FROM tb_user where id=$id");

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "User tidak diemukan");
        }

        $result = $exist = $this->db->query("SELECT * FROM tb_user where id=$id");

        if (password_verify($current, $result->fetch_assoc()["password"])) {

            $hash = password_hash($new, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("UPDATE tb_user SET password = ? WHERE id = ?");
            $stmt->bind_param("si", $hash, $id);

            if ($stmt->execute()) {
                return Responses::Res(true, "Berhasil mengubah sandi");
            } else {
                return Responses::Res(false, "Gagal mengubah sandi");
            }
        } else {
            return Responses::Res(false, "Sandi atau nim salah");
        }
    }

    function dashbord()
    {
        $anggota = $this->db->query("SELECT * FROM tb_user");
        $berita = $this->db->query("SELECT * FROM tb_berita");

        return Responses::Res(true, "", array(
            "anggota" => $anggota->num_rows,
            "berita" => $berita->num_rows,
        ));
    }

    function getRoleSelect()
    {
        $result = $this->db->query("SELECT tb_user.nama, tb_role.nama AS role, tb_user.id FROM tb_user INNER JOIN tb_role ON tb_user.role_id = tb_role.id");

        return Responses::Res(true, "", $result->fetch_all(MYSQLI_ASSOC));
    }

    function updateProfileUser(
        int $id,
        string $nama,
        string $no_hp,
        string $tgl_lahir,
        string $alamat,
    ) {
        $exist = $this->db->query("SELECT * FROM tb_user WHERE id=$id");

        $user = $exist->fetch_assoc();
        $user_info_id = $user["user_info_id"];
        $nim = $user["nim"];

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "User tidak ditemukan");
        }

        $protect = $this->protect_user($nim);

        if (!$protect["status"]) {
            return $protect;
        }

        $stmt = $this->db->prepare("UPDATE tb_user_info SET nama=?, tgl_lahir=?, no_hp=?, alamat=? WHERE id=?");
        $stmt->bind_param("ssssi", $nama, $tgl_lahir, $no_hp, $alamat, $user_info_id);

        if ($stmt->execute()) {
            return Responses::Res(true, "Berhasil update");
        } else {
            return Responses::Res(false, "Gagal update");
        }
    }
}
