<div class="header-main-content">
    <div>
        <h3 style="padding: 6px; font-size: 26px;">
            <?php
            $page = $_GET["page"];

            $chara = str_split($page);

            $chara[0] = strtoupper($chara[0]);

            echo implode($chara);
            ?>
        </h3>
    </div>

    <div class="breadcumb">
        <a href="/">Home</a> /
        <span><?= $_GET["page"] ?></span>
        <?php if (isset($_GET["tipe"])) : ?>
            <a href="/admin?page=setelan&tipe=<?= $_GET["tipe"] ?>"> / <?= $_GET["tipe"] ?></a>
        <?php endif ?>
    </div>
</div>