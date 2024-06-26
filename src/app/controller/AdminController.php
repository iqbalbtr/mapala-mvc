<?php

namespace Tugas\UkmProject\app\controller;

use Exception;
use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\models\UserModel;
use Tugas\UkmProject\app\models\NewsModel;
use Tugas\UkmProject\app\models\ProfileModel;
use Tugas\UkmProject\app\models\RoleModel;
use Tugas\UkmProject\app\Responses;

class AdminController
{

    private UserModel $user_service;
    private NewsModel $news_service;
    private RoleModel $role_service;
    private ProfileModel $profile_service;

    public function __construct()
    {
        $sql = Database::getConnection();
        $this->user_service = new UserModel($sql);
        $this->profile_service = new ProfileModel($sql);
        $this->news_service = new NewsModel($sql);
        $this->role_service = new RoleModel($sql);
    }

    function adminPanel()
    {
        try {
            $offset = isset($_GET["offset"]) ? $_GET["offset"] : 1;

            $users = $this->user_service->getAllUser($offset)["data"];

            $dash = $this->user_service->dashbord()["data"];

            $newses = $this->news_service->getAll($offset)["data"];

            $roles = $this->role_service->getAll($offset)["data"];

            $roles_select = $this->role_service->getSelect()["data"];

            $profile = $this->profile_service->getById(1)["data"];

            $current_user = $this->user_service->getUserById($_SESSION["id"])["data"];

            return include __DIR__ . "/../../../views/component/admin/index.php";
        } catch (Exception $e) {
            return Responses::ErrorPage(500, "Internal server error");
        }
    }
}
