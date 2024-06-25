<div class="profile-container">
    <div class="profile-top-container" style="background-image: url(/img/kayu.jpg);">
        <img class="profile-img" src="/img/profile.png" alt="">
    </div>
    <div class="profile-bottom-container">
        <h1><?= $_SESSION["nim"] ?></h1>
        <div style="display: flex; gap: 4px;">
            <p><?= $_SESSION["nama"] ?></p>
            .
            <p><?= $_SESSION["role"] ?></p>
        </div>
    </div>
</div>