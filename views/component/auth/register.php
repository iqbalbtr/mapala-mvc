<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM</title>
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/notif.css">
</head>

<body style="background-image: url(/img/hutan.jpg); background-repeat: no-repeat; background-size: cover;">

    <?php include __DIR__ . "/../notif.php" ?>
    <div>
        <form class="form-container" action="/auth/register" method="POST">
            <h1 class="title">Register</h1>
            <div class="field">
                <label for="">NIM</label>
                <input type="text" name="nim">
            </div>
            <div class="field-container">
                <div class="field">
                    <label for="">Nama</label>
                    <input type="text" name="nama">
                </div>
                <div class="field">
                    <label for="">Tgl Lahir</label>
                    <input type="date" name="tgl_lahir">
                </div>
            </div>
            <div class="field-container">
                <div class="field">
                    <label for="">No HP</label>
                    <input type="text" name="no_hp">
                </div>
                <div class="field">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat">
                </div>
            </div>
            <div class="field">
                <label for="">Password</label>
                <input type="password" name="password">
            </div>
            <p>Sudah punya akun? <a href="/auth/login">Login</a></p>
            <button class="submit">Register</button>
        </form>
    </div>

    <script src="/js/notif.js"></script>
</body>

</html>