<section class="footer">
    <h1 style="text-align: center; padding-top: 34px; margin-right: 34px; font-size: 34px;"><?= $profile["nama"] ?></h1>
    <div class="footer-column">
        <h4>Kontak</h4>
        <ul>
            <li>Alamat: <?= $profile["alamat"] ?></li>
            <li>No Telepon: <?= $profile["no_hp"] ?></li>
            <li>Email: <a href="mailto: <?= $profile["email"] ?>"><?= $profile["email"] ?></a></li>
        </ul>
    </div>
    <div class="footer-column">
        <h4>Links</h4>
        <ul>
            <li><a href="/#berita">Berita</a></li>
            <li><a href="/#tentang">Tentang Kami</a></li>
            <li><a href="/#galeri">Berita</a></li>
        </ul>
    </div>
    <div class="footer-column">
        <h4>Ikuti kami</h4>
        <ul>
            <li><a href="facebook.com">Facebook</a></li>
            <li><a href="instagram.com">Instagram</a></li>
            <li><a href="x.com">X</a></li>
        </ul>
    </div>
</section>
<section style="padding: 12px; background: var(--primary-color);">
    <p style="text-align: center; color: white;">Copyright © 2024. <?= $profile["nama"] ?> All rights reserved.</p>
</section>