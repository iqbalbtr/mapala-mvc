<?php 

namespace Tugas\UkmProject\app\controller;

use Tugas\UkmProject\app\Database;
use Tugas\UkmProject\app\models\ProfileModel;
use Tugas\UkmProject\app\Responses;

class ProfileController {
    
    private ?ProfileModel $profile_service;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->profile_service = new ProfileModel($db);
    }

    function update(){
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $email = $_POST["email"];
        $no_hp = $_POST["no_hp"];

        $result = $this->profile_service->update("1", $nama, $alamat, $email, $no_hp);

        if($result["status"]){
            return Responses::Redirect("?page=setelan&tipe=ubah-profile-ukm&pesan=" . $result["message"], "/admin");
        } else {
            return Responses::Redirect("?page=setelan&tipe=ubah-profile-ukm&pesan=" . $result["message"], "/admin");
        }
    }
}