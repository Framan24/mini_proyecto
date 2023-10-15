<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: /index.php");
    exit();
}

$userEmail = $_SESSION["user"];

require_once($_SERVER["DOCUMENT_ROOT"] . "/config/dt_base.php");

// Consulta para obtener los datos del usuario
$query = "SELECT email, password,foto,name,bio,phone FROM usuarios WHERE email = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($email, $password, $foto, $name, $bio, $phone);
    $stmt->fetch();
} else {

    echo "Usuario no encontrado.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style/style.css">
    <TItle>perfil</TItle>
</head>

<body>
    <p class="l"><a class="cerrar" href="/handle_db/logout.php">Logout</a></p>
    <div class="encabezado">
         <h1>Personal info</h1>
         <p>Basic info, like your name and photo</p>
     </div>
   
    <div class="pagina">
        <span>
            <div class="editar">
                <div>
                    <h2>Profile</h2>
                    <p>Some info may be visible to other people</p>
                </div>
                 <p><a class="edit" href="/views/editar.php">editar</a></p>
            </div>

        </span>
        <p><img class="foto" src="<?php echo $foto; ?>" alt="foto_perfil" width="150" height="150"></p>
        <p>NAME: <?php echo $name; ?></p>
        <p>BIO: <?php echo $bio; ?></p>
        <p>PHONE: <?php echo $phone; ?></p>
        <p>EMAIL: <?php echo $email; ?></p>
        <p>PASSWORD: <?php echo "*******"; ?></p>
    </div>

</body>

</html>