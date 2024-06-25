<a href="?page=berita" style="width: 100%; min-height: 100vh; position: fixed; background-color: rgba(7, 7, 7, 0.34); top: 0; left: 0;"></a>

<div class="modal-edit" style="width: 450px;">

    <a class="button-close" href="?page=berita">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times-circle" width=25>
            <path fill="#fff" d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z">
            </path>
        </svg>
    </a>

        <h1 style="padding: 4px 0 14px 0;">Tambah berita</h1>
        <form action="/api/news/create" method="post" key="<?= time() ?>">
            <input type="hidden" name="id" value="">

            <div class="field">
                <label for="">Head</label>
                <input required type="text" name="head" value="">
            </div>
            <div class="field">
                <label for="">Sub head</label>
                <input required type="text" name="sub_head" value="">
            </div>
            <div class="field">
                <label for="">Content</label>
                <textarea name="content" rows="6" id=""></textarea>
            </div>
            <div class="field">
                <label for="">Tanggal</label>
                <input required type="date" id="date-news" name="dibuat">
            </div>
            <button class="submit" name="ubah">Tambah</button>
        </form>
</div>

<script>
    document.querySelector("#date-news").valueAsDate = new Date();
</script>