<?php

namespace Tugas\UkmProject\app\controller;

use Exception;
use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\models\NewsModel;
use Tugas\UkmProject\app\models\ProfileModel;
use Tugas\UkmProject\app\Responses;

class NewsController
{

    private NewsModel $news_service;
    private ProfileModel $profile_service;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->news_service = new NewsModel($db);
        $this->profile_service = new ProfileModel($db);
    }

    function newsPage()
    {
        try{
            $id = $_GET["id"];
    
            $news = $this->news_service->getById($id)["data"];
    
            $profile = $this->profile_service->getById(1)["data"];
    
            return include __DIR__ . "/../../../views/component/home/news.php";
        } catch(Exception $e){
            return Responses::ErrorPage(500, "Internal server error");
        }
    }

    function update()
    {
        try {
            $id = $_POST["id"];
            $head = $_POST["head"];
            $sub_head = $_POST["sub_head"];
            $content = $_POST["content"];
            $dibuat = $_POST["dibuat"];

            $result = $this->news_service->update($id, $head, $sub_head, $content, $dibuat);

            return Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=berita&pesan=" . $e->getMessage(), "/admin");
        }
    }

    function delete()
    {
        try {
            $id = $_GET["id"];

            $result = $this->news_service->delete($id);

            return Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=berita&pesan=" . $e->getMessage(), "/admin");
        }
    }

    function create()
    {
        try {
            $head = $_POST["head"];
            $sub_head = $_POST["sub_head"];
            $content = $_POST["content"];
            $dibuat = $_POST["dibuat"];

            $result = $this->news_service->create($head, $sub_head, $content, $dibuat);

            return Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        } catch (Exception $e) {
            return Responses::Redirect("?page=berita&pesan=" . $e->getMessage(), "/admin");
        }
    }
}
