<nav class="navbar">
    <a href="/">
        <h1 style="color: var(--primary-color); letter-spacing: 5px;"><?= $profile["nama"] ?></h1>
    </a>
    <div class="navbar-right">
        <div class="nav-link-container">
            <ul>
                <li><a href="/#galeri">Galeri</a></li>
                <li><a href="/#berita">Berita</a></li>
                <li><a href="/#tentang">Tentang Kami</a></li>
            </ul>
        </div>
        <?php if (isset($_SESSION["login"])) : ?>
            <!-- <div class="nav-btn"> -->
            <a class="login" href="/admin?page=dashboard">Masuk</a>
            <!-- </div> -->
        <?php else : ?>
            <div class="nav-btn">
                <a class="login" href="auth/login">Login</a>
                <a class="daftar" href="auth/register">Daftar</a>
            </div>
        <?php endif ?>
    </div>
</nav>