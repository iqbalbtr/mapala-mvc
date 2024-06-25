
<div class="setting-container">
    <form action="/api/profile/update" method="post">
        <h1 class="title">Ubah Profile UKM</h1>
        <div class="field">
            <label for="">Nama</label>
            <input required type="text" name="nama" value="<?= $profile["nama"] ?>">
        </div>
        <div class="field">
            <label for="">Alamat</label>
            <input required type="text" name="alamat" value="<?= $profile["alamat"] ?>">
        </div>
        <div class="field">
            <label for="">Email</label>
            <input required type="email" name="email" value="<?= $profile["email"]?>">
        </div>
        <div class="field">
            <label for="">No Telepon</label>
            <input required type="number" name="no_hp" value="<?= $profile["no_hp"] ?>">
        </div>
        <button class="submit">Ubah</button>
    </form>
</div>