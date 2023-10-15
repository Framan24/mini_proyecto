<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/assets/style/style.css">
    <title>Login</title>
</head>

<body>
    <div class="pagina1">
        <h3>Login</h3>
        <form class="formulario" action="/handle_db/login.php" method="POST">
            <div class="email">
                <span id="icono" class="material-symbols-outlined">mail</span>
                <input type="text" name="email" placeholder="email">
            </div>
            <div class="password">
                <span id="icono" class="material-symbols-outlined">lock</span>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button class="btn_log" type="submit">Login</button>
        </form>
        <p class="tex1">or continue with these social profile</p>
        <div class="imagenes">
        <img src="/assets/Google.svg" alt="google">
        <img src="/assets/Facebook.svg" alt="link facebook">
        <img src="/assets/Twitter.svg" alt="link twitter">
        <img src="/assets/Gihub.svg" alt="link github">
        </div>
        <p>Don't have an account yet? <a href="/views/registro.php">Register</a></p>
    </div>
</body>

</html>