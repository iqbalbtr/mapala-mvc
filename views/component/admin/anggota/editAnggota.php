<a href="?page=anggota&tipe=master-anggota" style="width: 100%; min-height: 100vh; position: fixed; background-color: rgba(7, 7, 7, 0.34); top: 0; left: 0;"></a>


<div class="modal-edit">

    <a class="button-close" href="?page=anggota&tipe=master-anggota">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times-circle" width=25>
            <path fill="#fff" d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z">
            </path>
        </svg>
    </a>

    <?php if (isset($_GET["edit"])) : ?>

        <?php

        $user = $this->user_service->getUserById($_GET["edit"])["data"];

        ?>
        <h1 style="padding: 4px 0 14px 0;">Ubah Anggota</h1>
        <form action="/api/user/update" method="post" key="<?= time() ?>">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user["id"]) ?>">

            <div class="field">
                <label for="">NIM</label>
                <input required disabled type="text" name="nim" value="<?= htmlspecialchars($user["nim"]) ?>">
            </div>
            <div class="field-container">
                <div class="field">
                    <label for="">Nama</label>
                    <input required type="text" name="nama" value="<?= htmlspecialchars($user["nama"]) ?>">
                </div>
                <div class="field">
                    <label for="">tgl Lahir</label>
                    <input required type="date" name="tgl_lahir" value="<?= htmlspecialchars($user["tgl_lahir"]) ?>">
                </div>
            </div>
            <div class="field-container">
                <div class="field">
                    <label for="">No HP</label>
                    <input required type="text" name="no_hp" value="<?= htmlspecialchars($user["no_hp"]) ?>">
                </div>
                <div class="field">
                    <label for="">Alamat</label>
                    <input required type="text" name="alamat" value="<?= htmlspecialchars($user["alamat"]) ?>">
                </div>
            </div>
            <div class="field">
                <label for="role">Role</label>
                <select required name="role" value="<?= $user["role_id"] ?>" id="role-input">
                    <option value="">Pilih</option>
                    <?php foreach ($roles_select as $role) : ?>
                        <option value="<?= $role["id"] ?>"> <?= $role["nama"] ?> </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="field">
                <label for="">Status</label>
                <select required name="status" value="<?= $user["status"] ?>" id="status-input">
                    <option value="">pilih</option>
                    <option value="aktif">Aktif</option>
                    <option value="pasif">Pasif</option>
                    <option value="keluar">Keluar</option>
                </select>
            </div>

            <button class="submit" name="ubah">Ubah</button>
        </form>
    <?php endif ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelector("#role-input").value = <?= json_encode($user["role_id"]) ?>;
        document.querySelector("#status-input").value = <?= json_encode($user["status"]) ?>;
    });
</script>