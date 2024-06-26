<?php

namespace Tugas\UkmProject\app\controller;

use Exception;
use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\models\NewsModel;
use Tugas\UkmProject\app\models\ProfileModel;
use Tugas\UkmProject\app\Responses;

class HomeController {

    private ?ProfileModel $profile_service;
    private ?NewsModel $berita_service;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->profile_service = new ProfileModel($db);    
        $this->berita_service = new NewsModel($db);    
    }

    function index(){
        try{
            $profile = $this->profile_service->getById(1)["data"];
            $newses = $this->berita_service->newsHome()["data"];
    
            include __DIR__ . "/../../../views/component/home/index.php";
        } catch (Exception $e){
            return Responses::ErrorPage(500, "Internal Server error");
        }
    }
    
}