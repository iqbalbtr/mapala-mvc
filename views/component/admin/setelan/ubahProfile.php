<?php

?>

<div class="setting-container">
    <form action="/api/user/change-profile" method="post">
        <h1 class="title">Ubah Profile</h1>
        <div class="field">
            <label for="">NIM</label>
            <input required type="text" value="<?= $current_user["nim"] ?>" disabled name="nim">
        </div>
        <div class="field">
            <label for="">Nama</label>
            <input required type="text" name="nama" value="<?= $current_user["nama"] ?>">
        </div>
        <div class="field">
            <label for="">Alamat</label>
            <input required type="text" name="alamat" value="<?= $current_user["alamat"] ?>">
        </div>
        <div class="field">
            <label for="">Tgl Lahir</label>
            <input required type="date" name="tgl_lahir" value="<?= $current_user["tgl_lahir"] ?>">
        </div>
        <div class="field">
            <label for="">No HP</label>
            <input required type="number" name="no_hp" value="<?= $current_user["no_hp"] ?>">
        </div>
        <button class="submit">Ubah</button>
    </form>
</div>