<?php

namespace Tugas\UkmProject\app\controller;

use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\models\NewsModel;
use Tugas\UkmProject\app\models\ProfileModel;

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

        $profile = $this->profile_service->getById(1)["data"];
        $newses = $this->berita_service->newsHome()["data"];

        include __DIR__ . "/../../../views/component/home/index.php";
    }
    
}