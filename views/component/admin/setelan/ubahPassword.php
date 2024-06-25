<div class="setting-container">
    <form action="/api/user/change-password" method="post">
        <h1 class="title" style="margin-bottom: 26px;">Ubah Sandi</h1>
        <div class="field">
            <label for="">Sandi baru</label>
            <input required type="text" name="new">
        </div>
        <div class="field">
            <label for="">Konfirmasi sandi</label>
            <input required type="password" name="confirm">
        </div>
        <div class="field">
            <label for="">Sandi lama</label>
            <input required type="password" name="current">
        </div>
        <button class="submit" type="submit">Ubah</button>
    </form>
</div>