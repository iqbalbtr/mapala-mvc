<div class="notif" style="display: none;">
    <div class="notif-container">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" width="20" id="bell">
                <path fill="#fff" d="M18,13.18V10a6,6,0,0,0-5-5.91V3a1,1,0,0,0-2,0V4.09A6,6,0,0,0,6,10v3.18A3,3,0,0,0,4,16v2a1,1,0,0,0,1,1H8.14a4,4,0,0,0,7.72,0H19a1,1,0,0,0,1-1V16A3,3,0,0,0,18,13.18ZM8,10a4,4,0,0,1,8,0v3H8Zm4,10a2,2,0,0,1-1.72-1h3.44A2,2,0,0,1,12,20Zm6-3H6V16a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z">
                </path>
            </svg>
        </div>
        <p class="content-pesan"><?= isset($_GET["pesan"]) ? $_GET["pesan"] : null ?></p>
        <button id="close-notif" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times" width="20">
                <path fill="#fff" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                </path>
            </svg>
        </button>
    </div>
</div>