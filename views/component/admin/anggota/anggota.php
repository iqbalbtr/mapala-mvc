<?php

if (isset($_GET["edit"])) {
    include "editAnggota.php";
}

?>


<h1>Daftar Anggota</h1>

<div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Status</th>
                <th>Role</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tgl Lahir</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = $users["page"] > 1 ? ($users["page"] - 1) * 5 + 1 : $users["page"];
            ?>
            <?php foreach ($users["data"] as $user) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $user["nim"] ?></td>
                    <td><?= $user["status"] ?></td>
                    <td><?= $user["role"] ?></td>
                    <td><?= $user["nama"] ?></td>
                    <td><?= $user["alamat"] ?></td>
                    <td><?= $user["tgl_lahir"] ?></td>
                    <td><?= $user["no_hp"] ?></td>
                    <td class="aksi">
                        <a class="delete-btn" href="/api/user/delete?id=<?= $user["id"] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="trash-alt" width=20>
                                <path fill="#fff" d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z">
                                </path>
                            </svg>
                        </a>
                        <a class="edit-btn" href="?page=anggota&tipe=master-anggota&edit=<?= $user["id"] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="edit-alt" width=20>
                                <path fill="#fff" d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z">
                                </path>
                            </svg>
                        </a>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $users["pagination"]; $i++) : ?>
            <a href="admin?page=anggota&tipe=master-anggota&offset=<?= $i ?>" class="pagination-btn"><?= $i ?></a>
        <?php endfor ?>
    </div>
</div>