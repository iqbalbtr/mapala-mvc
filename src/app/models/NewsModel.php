<?php

namespace Tugas\UkmProject\app\models;

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
        $stmt = $this->db->prepare("INSERT INTO tb_berita (head, sub_head, content, dibuat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $head, $sub_head, $content, $dibuat);
        
        if ($stmt->execute()) {
            return Responses::Res(true, "Berita baru ditambahkan");
        } else {
            return Responses::Res(false, "Gagal menambahkan berita baru");
        }
    }

    function getById(
        int $id
    ) {

        $exist = $this->db->query("SELECT * FROM tb_berita WHERE id=$id");

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "Berita tidak ditemukan");
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
        $exist = $this->db->query("SELECT * FROM tb_berita WHERE id=$id");

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "Berita tidak ditemukan");
        }

        $stmt = $this->db->prepare("UPDATE tb_berita SET head=?, sub_head=?, content=?, dibuat=? WHERE id=?");
        $stmt->bind_param("ssssi", $head, $sub_head, $content, $dibuat, $id);

        if ($stmt->execute()) {
            return Responses::Res(true, "Sukses");
        } else {
            return Responses::Res(false, "Gagal memperbarui berita");
        }
    }

    function delete(
        int $id
    ) {
        $exist = $this->db->query("SELECT * FROM tb_berita WHERE id=$id");

        if ($exist->num_rows <= 0) {
            return Responses::Res(false, "Berita tidak ditemukan");
        }

        $this->db->query("DELETE FROM tb_berita WHERE id=$id");

        return Responses::Res(false, "Berita berhasil di hapus");
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
