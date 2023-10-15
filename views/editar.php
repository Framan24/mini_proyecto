<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: /views/login.php");
    exit();
}
$userEmail = $_SESSION["user"];
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/dt_base.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if (!empty($_FILES["foto"]["name"])) {
        $uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/assets/";
        $uploadFile = $uploadDir . basename($_FILES["foto"]["name"]);
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadFile)) {
            $foto = "/assets/" . $_FILES["foto"]["name"];
        } else {
            echo "Error al cargar la foto.";
        }
    } else {
        $foto = $foto;
    }
    $query = "UPDATE usuarios SET name = ?, bio = ?, phone = ?, password = ?, foto = ? WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssss", $name, $bio, $phone, $hashedPassword, $foto, $userEmail);
    if ($stmt->execute()) {
        header("Location: /views/dashboard.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }
}
$query = "SELECT email, password, foto, name, bio, phone FROM usuarios WHERE email = ?";
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/assets/style/style.css">
    <title>Editar Perfil</title>
</head>
<body>
    <div class="atras">
         <span id="flecha" class="material-symbols-outlined">arrow_back_ios</span>
         <a class="back" href="/views/dashboard.php">Back</a>
         </div>
    <div class="pagina">
        <h1>Change Info</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <label for="foto">Foto de Perfil:</label>
            <input type="file" name="foto"><br>
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>
            <label for="bio">Biografía:</label>
            <textarea name="bio"><?php echo $bio; ?></textarea><br>
            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" value=""><br/><br/>
            <input class="save" type="submit" value="Save">
        </form>
    </div>
</body>

</html>