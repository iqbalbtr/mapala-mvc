<?php

if (isset($_GET["edit"])) {
    include "editRole.php";
}

if (isset($_GET["aksi"])) {
    $aksi = $_GET["aksi"];

    if ($aksi == "tambah") {
        include "tambahRole.php";
    }
}

?>



<div style="width: 100%; display: flex; justify-content: space-between; padding: 8px 12px; align-items: center;">
    <h1>Daftar role</h1>
    <a href="?page=anggota&tipe=master-role&aksi=tambah" class="add-btn">
        Tambah
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width=20 id="plus-square">
            <path fill="#fff" d="M9,13h2v2a1,1,0,0,0,2,0V13h2a1,1,0,0,0,0-2H13V9a1,1,0,0,0-2,0v2H9a1,1,0,0,0,0,2ZM21,2H3A1,1,0,0,0,2,3V21a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,20H4V4H20Z">
            </path>
        </svg>
    </a>
</div>
<div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = $roles["page"] > 1 ? ($roles["page"] - 1) * 5 + 1 : $roles["page"];
            ?>
            <?php foreach ($roles["data"] as $role) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $role["nama"] ?></td>
                    <td><?= $role["deskripsi"] ? $role["deskripsi"] : "Default" ?></td>
                    <td><?= $role["dibuat"] ?></td>
                    <td class="aksi">
                        <a class="delete-btn" href="/api/role/delete?id=<?= $role["id"] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="trash-alt" width=20>
                                <path fill="#fff" d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z">
                                </path>
                            </svg>
                        </a>
                        <a class="edit-btn" href="?page=anggota&tipe=master-role&edit=<?= $role["id"] ?>">
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
        <?php for ($i = 1; $i <= $roles["pagination"]; $i++) : ?>
            <a href="admin?page=anggota&tipe=master-role&offset=<?= $i ?>" class="pagination-btn"><?= $i ?></a>
        <?php endfor ?>
    </div>
</div>