<a href="?page=anggota&tipe=master-role" style="width: 100%; min-height: 100vh; position: fixed; background-color: rgba(7, 7, 7, 0.34); top: 0; left: 0;"></a>


<div class="modal-edit" style="width: 450px;">

    <a class="button-close" href="?page=anggota&tipe=master-role">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times-circle" width=25>
            <path fill="#fff" d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z">
            </path>
        </svg>
    </a>
        <h1 style="padding: 4px 0 14px 0;">Tambah Role</h1>
        <form action="/api/role/create" method="post" key="<?= time() ?>">
            <input required type="hidden" name="id">

            <div class="field">
                <label for="">Nama</label>
                <input required type="text" name="nama">
            </div>
            <div class="field">
                <label for="">Deskripsi</label>
                <input required type="text" name="deskripsi">
            </div>
            <button class="submit" name="ubah">Tambah</button>
        </form>
</div>