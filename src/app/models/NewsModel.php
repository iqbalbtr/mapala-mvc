<?php

namespace Tugas\UkmProject\app\models;

use Exception;
use Tugas\UkmProject\app\Responses;
use mysqli;

class NewsModel
{

    private mysqli $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    function create(
        string $head,
        string $sub_head,
        string $content,
        string $dibuat
    ) {

        if (
            empty($head) ||
            empty($sub_head) ||
            empty($content) ||
            empty($dibuat)
        ) {
            Responses::Redirect("?page=berita&pesan=Isi kurang lengkap", "/admin");
        }

        $stmt = $this->db->prepare("INSERT INTO tb_berita (head, sub_head, content, dibuat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $head, $sub_head, $content, $dibuat);
        
        if ($stmt->execute()) {
            return Responses::Res(true, "Berita baru ditambahkan");
        } else {
            throw new Exception("Gagal menambahkan berita baru");
        }
    }

    function getById(
        int $id
    ) {

        if (!$id) {
            throw new Exception("Id tidak ada");
        }

        $exist = $this->db->query("SELECT * FROM tb_berita WHERE id=$id");

        if ($exist->num_rows <= 0) {
            throw new Exception("Berita tidak ditemukan");
        }

        $result = $this->db->query("SELECT * FROM tb_berita WHERE id=$id");

        return Responses::Res(true, "", $result->fetch_assoc());
    }

    function update(
        int $id,
        string $head,
        string $sub_head,
        string $content,
        string $dibuat
    ) {

        if (
            empty($head) ||
            empty($sub_head) ||
            empty($content) ||
            empty($dibuat)
        ) {
            throw new Exception("Data tidak lengkap");
        }

        $exist = $this->db->query("SELECT * FROM tb_berita WHERE id=$id");

        if ($exist->num_rows <= 0) {
            throw new Exception("Berita tidak ditemukan");
        }

        $stmt = $this->db->prepare("UPDATE tb_berita SET head=?, sub_head=?, content=?, dibuat=? WHERE id=?");
        $stmt->bind_param("ssssi", $head, $sub_head, $content, $dibuat, $id);

        if ($stmt->execute()) {
            return Responses::Res(true, "Sukses");
        } else {
            throw new Exception("Error mengubah berita");
        }
    }

    function delete(
        int $id
    ) {

        if (empty($id)) {
            throw new Exception("?page=berita&pesan=Id tidak ada", "/admin");
        }

        $exist = $this->db->query("SELECT * FROM tb_berita WHERE id=$id");

        if ($exist->num_rows <= 0) {
            throw new Exception("Berita tidak ditemukan");
        }

        $this->db->query("DELETE FROM tb_berita WHERE id=$id");

        return Responses::res(false, "Berita berhasil di hapus");
    }
    function getAll($page)
    {
        $news = $this->db->query("SELECT * FROM tb_berita");

        $count = $news->num_rows;

        $limit = 5;

        $pagination = ceil($count / $limit);

        $offset = ($page - 1) * $limit;

        $get = $this->db->query("SELECT * FROM tb_berita ORDER BY dibuat DESC LIMIT $limit OFFSET $offset");

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

    function newsHome()
    {

        $result = $this->db->query("SELECT * FROM tb_berita ORDER BY dibuat DESC LIMIT 3");

        return Responses::Res(true, "", $result->fetch_all(MYSQLI_ASSOC));
    }
}
