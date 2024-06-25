<nav class="header-container">
    <h1></h1>
    <div>
        <span class="profile" id="profile">
            <?= $_SESSION["nim"] ?>
            <svg width="40" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="user-circle">
                <path fill="#fff" d="M12,2A10,10,0,0,0,4.65,18.76h0a10,10,0,0,0,14.7,0h0A10,10,0,0,0,12,2Zm0,18a8,8,0,0,1-5.55-2.25,6,6,0,0,1,11.1,0A8,8,0,0,1,12,20ZM10,10a2,2,0,1,1,2,2A2,2,0,0,1,10,10Zm8.91,6A8,8,0,0,0,15,12.62a4,4,0,1,0-6,0A8,8,0,0,0,5.09,16,7.92,7.92,0,0,1,4,12a8,8,0,0,1,16,0A7.92,7.92,0,0,1,18.91,16Z">
                </path>
            </svg>
        </span>
    </div>

    <!-- Modal Profile -->
    <div class="modal-profile" id="modal-profile">
        <ul>
            <li>
                <a href="" class="nav-link">
                    <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="user">
                        <path fill="#fff" d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z">
                        </path>
                    </svg>
                    Profile
                </a>
            </li>
            <li>
                <a class="nav-link" href="/auth/logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" id="signout">
                        <path fill="#fff" d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z">
                        </path>
                    </svg>
                    Keluar
                </a>
            </li>
        </ul>
    </div>
</nav>