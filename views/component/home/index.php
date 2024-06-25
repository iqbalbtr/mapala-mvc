<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $profile["nama"] ?></title>
    <link rel="stylesheet" href="/css/home.css?v=<?= time() ?>">
</head>

<body style="position: relative;">

    <?php include  __DIR__ . "/components/navbar.php" ?>
    
    
    <!-- Main section -->
    <section class="hero" id="hero" style="background-image: url(/img/hero-bg.jpg); background-repeat: no-repeat; background-size: cover;">
        <div class="hero-left">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, quae sequi eveniet corporis beatae incidunt ipsum maiores veniam doloribus, ea quis. Quis suscipit repellendus velit, itaque sed quos ullam inventore hic. Vero, ea sint enim veniam quis at beatae, tempora debitis, inventore architecto est!</p>
        </div>
        <h1 class="hero-title"><?= $profile["nama"] ?></h1>
    </section>
 
    
    <!-- Galeri section -->
    <section id="galeri" class="event-container">
        <img src="/img/topography.jpg" class="event-bg-img" alt="">
        <img src="/img/topography.jpg" class="event-bg-img-2" alt="">
        <div class="event-container-left">
            <div>
                <img class="event-img-1" src="/img/galery-1.jpg" style="object-fit: cover;" alt="">
                <img class="event-img-2" src="/img/galery-2.jpg" style="object-fit: cover;" alt="">
                <img class="event-img-3" src="/img/galery-3.jpg" style="object-fit: cover;" alt="">
                <img class="event-img-4" src="/img/galery-4.jpg" style="object-fit: cover;" alt="">
                <img class="event-img-5" src="/img/galery-5.jpg" style="object-fit: cover;" alt="">
                <img class="event-img-6" src="/img/galery-3.jpg" style="object-fit: cover;" alt="">
            </div>
        </div>
        <div class="event-container-right" style="background-image: url(\img\topography.jpg);">
            <h1 style="color: var(--primary-color);">Galeri UKM</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate itaque minima recusandae, a asperiores atque, quae odit provident adipisci aspernatur officiis dolorem perferendis, nam laborum. Vero non minus inventore omnis neque! Cupiditate minus fugit laborum voluptatum consectetur facilis illo illum est, rerum quo?</p>
            <h3 style="margin-top: 4px; text-align: right;">Lorem ipsum dolor sit amet.!</h3>
            <a href="/auth/register" class="gabung-btn">Gabung sekarang!</a>
        </div>
    </section>


    <!-- Tentang section -->
    <section class="about-container" id="tentang">
        <!-- <img src="/img/kayu.jpg" style="position: absolute; top: 0; height: auto; left: 0; right: 0; width: 100%; bottom: 0; z-index: 1; opacity: .2;" alt=""> -->
        <div class="about-content">
            <h1>Tentang Kami</h1>
            <h3>Lorem ipsum dolor, sit amet consectetur adipisicing elit!</h3>

            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id vel qui ipsum sed dicta veniam molestiae quia cum. Beatae perspiciatis velit debitis praesentium molestias quia possimus atque vitae aspernatur quos nobis consequatur in adipisci rem, modi magni illum ipsa? Cumque voluptate deserunt iure. Sit.</p>
        </div>
        <img class="about-img" style="object-fit: cover; z-index: 10;" src="/img/tentang.jpg" alt="">
    </section>

    <!-- Berita section -->
    <section style="padding-top: 120px; position: relative; z-index: 5;">
        <img class="berita-img" style="object-fit: cover; height: 100%; opacity: .3; position: absolute; top: 0; left: 0; width: 100%; z-index: 0;" src="/img/berita-bg.jpg" alt="">
        <div class="news-container" id="berita">
            <div>
                <h1 style="margin: 0 0 35px 0; font-size: 36px; text-align: left; color: var(--primary-color);">Berita</h1>
                <div>
                    <img class="berita-img" style="object-fit: fill;" src="/img/news.jpg" alt="">
                </div>
            </div>
            <div class="news-container-card">
                <?php foreach ($newses as $news) : ?>
                    <a href="/berita?id=<?= $news["id"] ?>">
                        <div class="news-card">
                            <h2 class="news-title"><?= $news["head"] ?></h2>
                            <p class="news-content"><?= $news["content"] ?></p>
                            <p class="news-date"><?= $news["dibuat"] ?></p>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    
    <?php include __DIR__ . "/components/footer.php" ?>
</body>

</html>