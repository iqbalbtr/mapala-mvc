<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $profile["nama"] ?></title>
        <link rel="stylesheet" href="/css/home.css?v=<?= time() ?>">
    </head>

</head>

<body>

    <?php include __DIR__ . "/components/navbar.php" ?>

    
       <!-- News Section -->
    <section class="news-section">
        <h1 class="head"><?= $news["head"] ?></h1>
        <div>
            <h3 class="sub-head"><?= $news["sub_head"] ?></h3>
            <p style="font-size: 14px; text-align: center;"><?= $news["dibuat"] ?></p>
        </div>
        <p class="content"><?= $news["content"] ?></p>
    </section>

    <?php include  __DIR__ . "/components/footer.php" ?>
</body>

</html>