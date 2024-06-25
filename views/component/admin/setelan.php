<?php

if (isset($_GET["tipe"])) {

    $tipe = $_GET["tipe"];

    switch ($tipe) {
        case "ubah-password":
            include "setelan/ubahPassword.php";
            break;
            case "ubah-profile":
                include "setelan/ubahProfile.php";
            break;
        case "ubah-profile-ukm":
            include "setelan/ubahProfileUKM.php";
            break;
    }
}


?>