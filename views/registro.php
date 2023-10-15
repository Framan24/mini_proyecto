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
    <title>Registro</title>
</head>

<body>
    <div class="pagina1">
        <h3 class="titulo">Join thousands of learners from<br /> around the world</h3>
        <p>Master web development by making real-life projects.<br /> There are multiple paths for you to choose</p>
        <form class="formulario" action="/handle_db/procesar_registro.php" method="POST">
            <div class="email">
                <span id="icono" class="material-symbols-outlined">mail</span>
                <input type="text" name="email" placeholder="email">
            </div>
            <div class="password">
                <span id="icono" class="material-symbols-outlined">lock</span>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button type="submit">Start coding now</button>
        </form>
        <p class="tex1">or continue with these social profiles</p>
        <div class="imagenes">
             <img src="/assets/Google.svg" alt="google">
        <img src="/assets/Facebook.svg" alt="link facebook">
        <img src="/assets/Twitter.svg" alt="link twitter">
        <img src="/assets/Gihub.svg" alt="link github">
        </div>
       
        <p class="tex1">Already a member? <a href="/index.php">Login</a></p>
    </div>
</body>

</html>