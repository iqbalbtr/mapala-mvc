<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM</title>
    <link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/notif.css">
</head>
<body style="background-image: url(/img/hutan.jpg); background-repeat: no-repeat; background-size: cover;">
    
<?php include __DIR__ . "/../notif.php" ?>

    <div>
        <form class="form-container" action="/auth/login" method="post">
            <h1 class="title">Login</h1>
            <div class="field">
                <label for="">NIM</label>
                <input type="text" name="nim">
            </div>
            <div class="field">
                <label for="">Password</label>
                <input type="password" name="password">
            </div>
            <p>Belum punya akun? <a href="/auth/register">Register</a></p>
            <button class="submit" type="submit" name="login">Login</button>
        </form>
    </div>
    
    <script src="/js/notif.js"></script>
</body>
</html>