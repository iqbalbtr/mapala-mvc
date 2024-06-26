<nav class="navbar">
    <a href="/">
        <h1 style="color: var(--primary-color); letter-spacing: 5px;"><?= $profile["nama"] ?></h1>
    </a>
    <div class="navbar-right">
        <div class="nav-link-container">
            <ul>
                <button class="toggle-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" viewBox="0 0 24 24" id="bars">
                        <path fill="var(--primary-color)" d="M3,8H21a1,1,0,0,0,0-2H3A1,1,0,0,0,3,8Zm18,8H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Zm0-5H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z">
                        </path>
                    </svg>
                </button>
                <li><a href="/#galeri">Galeri</a></li>
                <li><a href="/#berita">Berita</a></li>
                <li><a href="/#tentang">Tentang Kami</a></li>
            </ul>
        </div>
        <div class="navbar-inner-rightp">
            <?php if (isset($_SESSION["login"])) : ?>
                <a class="login" href="/admin?page=dashboard">Masuk</a>
            <?php else : ?>
                <div class="nav-btn">
                    <a class="login" href="auth/login">Login</a>
                    <a class="daftar" href="auth/register">Daftar</a>
                </div>
            <?php endif ?>
        </div>
    </div>
</nav>

<script>
    let tglNav = false;
    const toggleNav = document.querySelectorAll('.toggle-nav');
    const navbarContainer = document.querySelector('.nav-link-container');

    toggleNav.forEach(tgl => {
        tgl.addEventListener("click", () => {
            tglNav = !tglNav;
            return tglNav ? navbarContainer.classList.add("active") : navbarContainer.classList.remove("active");
        })
    })
</script>