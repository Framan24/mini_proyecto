<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/dt_base.php");
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    try {
        if (!empty($email) && !empty($password)) {
            $query = "SELECT email, password FROM usuarios WHERE email = ?";
            $st = $mysqli->prepare($query);
            $st->bind_param("s", $email);
            $st->execute();
            $st->store_result();
            if ($st->num_rows === 1) {
                $st->bind_result($email, $hashedPassword);
                $st->fetch();
                if (password_verify($password, $hashedPassword)) {
                    $_SESSION["user"] = $email;
                    header("Location: /views/dashboard.php");
                    exit();
                } else {
                    echo "Contraseña incorrecta.";
                }
            } else {
                echo "Usuario no encontrado.";
            }
        } else {
            header("Location: /index.php");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Acceso incorrecto. Ingrese por método POST.";
}
