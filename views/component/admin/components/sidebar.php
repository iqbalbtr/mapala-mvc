<nav class="sidebar-container">
            <div>
                <h3 class="admin-title"><a style="color: var(--white);" href="/"><?= $profile["nama"] ?></a></h3>
                <ul class="nav-link-container">
                    <li>
                        <a href="?page=dashboard" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" width="20" id="tachometer-fast-alt">
                                <path fill="#fff" d="M12 5a10 10 0 0 0-8.66 15 1 1 0 0 0 1.74-1A7.92 7.92 0 0 1 4 15a8 8 0 1 1 14.93 4 1 1 0 0 0 .37 1.37 1 1 0 0 0 1.36-.37A10 10 0 0 0 12 5Zm2.84 5.76-1.55 1.54A2.91 2.91 0 0 0 12 12a3 3 0 1 0 3 3 2.9 2.9 0 0 0-.3-1.28l1.55-1.54a1 1 0 0 0 0-1.42 1 1 0 0 0-1.41 0ZM12 16a1 1 0 0 1 0-2 1 1 0 0 1 .7.28 1 1 0 0 1 .3.72 1 1 0 0 1-1 1Z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <?php if (sidebar_protect(["admin", "ketua"])) : ?>
                        <li>
                            <span class="nav-link extend-btn" href="?page=anggota">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" id="users-alt">
                                    <path fill="#fff" d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z">
                                    </path>
                                </svg>
                                Anggota
                                <svg class="extend-arrow" style="rotate: 180deg;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="angle-up" width=23>
                                    <path fill="#fff" d="M17,13.41,12.71,9.17a1,1,0,0,0-1.42,0L7.05,13.41a1,1,0,0,0,0,1.42,1,1,0,0,0,1.41,0L12,11.29l3.54,3.54a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29A1,1,0,0,0,17,13.41Z">
                                    </path>
                                </svg>
                            </span>
                            <div class="extend-sidebar" style="display: none;">
                                <ul>
                                    <li>
                                        <a class="nav-link" href="?page=anggota&tipe=master-anggota">
                                            Anggota
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="?page=anggota&tipe=master-role">
                                            Role
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link" href="?page=berita">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" id="newspaper">
                                    <path fill="#fff" d="M17,11H16a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm0,4H16a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2ZM11,9h6a1,1,0,0,0,0-2H11a1,1,0,0,0,0,2ZM21,3H7A1,1,0,0,0,6,4V7H3A1,1,0,0,0,2,8V18a3,3,0,0,0,3,3H18a4,4,0,0,0,4-4V4A1,1,0,0,0,21,3ZM6,18a1,1,0,0,1-2,0V9H6Zm14-1a2,2,0,0,1-2,2H7.82A3,3,0,0,0,8,18V5H20Zm-9-4h1a1,1,0,0,0,0-2H11a1,1,0,0,0,0,2Zm0,4h1a1,1,0,0,0,0-2H11a1,1,0,0,0,0,2Z">
                                    </path>
                                </svg>
                                Master Berita
                            </a>
                        </li>
                    <?php endif ?>
                    <li>
                        <a class="nav-link" href="?page=profile">
                            <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="user">
                                <path fill="#fff" d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z">
                                </path>
                            </svg>
                            Profile
                        </a>
                    </li>
                    <li>
                        <span class="nav-link extend-btn">
                            <svg width="20" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="setting">
                                <path fill="#fff" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9-1.28 2.22-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24-1.3-2.21.8-.9a3 3 0 0 0 0-4l-.8-.9 1.28-2.2 1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24 1.28 2.22-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4 4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2 2 2 0 0 1-2 2Z">
                                </path>
                            </svg>
                            Setelan
                            <svg class="extend-arrow" style="rotate: 180deg;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="angle-up" width=23>
                                <path fill="#fff" d="M17,13.41,12.71,9.17a1,1,0,0,0-1.42,0L7.05,13.41a1,1,0,0,0,0,1.42,1,1,0,0,0,1.41,0L12,11.29l3.54,3.54a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29A1,1,0,0,0,17,13.41Z">
                                </path>
                            </svg>
                        </span>

                        <div class="extend-sidebar" style="display: none;">
                            <ul>
                                <li>
                                    <a class="nav-link" href="?page=setelan&tipe=ubah-profile">
                                        Ubah Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="?page=setelan&tipe=ubah-password">
                                        Ganti Password
                                    </a>
                                </li>
                                <?php if (sidebar_protect(["admin", "ketua"])) : ?>
                                    <li>
                                        <a class="nav-link" href="?page=setelan&tipe=ubah-profile-ukm">
                                            Ubah Profile UKM
                                        </a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div>
                <span>
                    <a class="nav-link" href="/auth/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" id="signout">
                            <path fill="#fff" d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z">
                            </path>
                        </svg>
                        Keluar
                    </a>
                </span>
            </div>
        </nav>