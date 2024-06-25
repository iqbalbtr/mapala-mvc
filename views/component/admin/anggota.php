<?php

if (isset($_GET["tipe"])) {

    $tipe = $_GET["tipe"];

    switch ($tipe) {
        case "master-anggota":
            include "anggota/anggota.php";
            break;
        case "master-role":
            include "anggota/role.php";
            break;
    }
}


?>