<?php

function sidebar_protect(array $roles)
{
    return in_array($_SESSION["role"], $roles);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $profile["nama"] ?></title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/notif.css">
</head>

<body>

    <?php include __DIR__ . "/../notif.php" ?>

    <section class="admin-container">

    <?php include __DIR__ . "/components/sidebar.php" ?>
    
    <div class="content-container">
        
        <?php include __DIR__ . "/components/navbar.php" ?>
        
        <div class="main-content-container">
            
            <?php include __DIR__ . "/components/breadcumb.php" ?>


                <div class="dashboard-content-container">
                    <!-- Content admin  -->

                    <?php

                    if (isset($_GET["page"])) {
                        $page = $_GET["page"] ? $_GET["page"] : "dashboard";

                        switch ($page) {

                            case "dashboard":
                                include "dashboard.php";
                                break;
                            case "anggota":
                                include "anggota.php";
                                break;
                            case "berita":
                                include "berita.php";
                                break;
                            case "profile":
                                include "profile.php";
                                break;
                            case "setelan":
                                include "setelan.php";
                                break;
                            default:
                                include "dashoboard.php";
                                break;
                        }
                    }

                    ?>

                </div>

            </div>
        </div>
    </section>
</body>


<script src="/js/notif.js"></script>
<script>
    let isProfile = false;

    const modalProfile = document.getElementById("modal-profile");
    const profile = document.getElementById("profile");

    profile.addEventListener("click", () => {
        isProfile = !isProfile;
        return modalProfile.style.display = isProfile ? "block" : "none";
    });

    const extendLink = document.querySelectorAll(".extend-sidebar");
    const extendArrows = document.querySelectorAll(".extend-arrow");
    const buttonExtendLink = document.querySelectorAll(".extend-btn");
    const statusExtendes = Array(buttonExtendLink.length).fill(false);

    buttonExtendLink.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            const current = statusExtendes[i];
            extendLink[i].style.display = current ? "none" : "block";
            extendArrows[i].style.rotate = current ? "180deg" : "0deg";
            statusExtendes[i] = !statusExtendes[i]
        })
    })
</script>

</html>