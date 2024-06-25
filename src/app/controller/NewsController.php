<?php

namespace Tugas\UkmProject\app\controller;

use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\models\NewsModel;
use Tugas\UkmProject\app\models\ProfileModel;
use Tugas\UkmProject\app\Responses;

class NewsController{

    private NewsModel $news_service;
    private ProfileModel $profile_service;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->news_service = new NewsModel($db);
        $this->profile_service = new ProfileModel($db);
    }

    function newsPage(){

        $id = $_GET["id"];

        if(!$id){
            header("Loaction: /");
            exit;
        }

        $news = $this->news_service->getById($id)["data"];

        $profile = $this->profile_service->getById(1)["data"];

        return include __DIR__ . "/../../../views/component/home/news.php";
    }

    function update(){
        $id = $_POST["id"];
        $head = $_POST["head"];
        $sub_head = $_POST["sub_head"];
        $content = $_POST["content"];
        $dibuat = $_POST["dibuat"];

        if(
            empty($head) ||
            empty($sub_head) || 
            empty($content) ||
            empty($dibuat)
        ) {
            Responses::Redirect("?page=berita&pesan=Isi kurang lengkap", "/admin");
        }
        
        $result = $this->news_service->update($id, $head, $sub_head, $content, $dibuat);
        
        if($result["status"]){
            Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        } else {
            Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        }
    }

    function delete(){
        $id = $_GET["id"];

        if(empty($id)){
            Responses::Redirect("?page=berita&pesan=Id tidak ada", "/admin");
        }

        $result = $this->news_service->delete($id);

        if($result["status"]){
            Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        } else {
            Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        }
    }

    function create(){
        $head = $_POST["head"];
        $sub_head = $_POST["sub_head"];
        $content = $_POST["content"];
        $dibuat = $_POST["dibuat"];

        if(
            empty($head) ||
            empty($sub_head) || 
            empty($content) ||
            empty($dibuat)
        ) {
            Responses::Redirect("?page=berita&pesan=Isi kurang lengkap", "/admin");
        }
        
        $result = $this->news_service->create($head, $sub_head, $content, $dibuat);
        
        if($result["status"]){
            Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        } else {
            Responses::Redirect("?page=berita&pesan=" . $result["message"], "/admin");
        }
    }
    
}