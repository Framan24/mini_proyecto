<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conexión a la base de datos
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/dt_base.php");
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    try {
        // Validar datos de entrada
        if (!empty($email) && !empty($password)) {
            // Verificar si el correo ya está registrado
            $check_query = "SELECT email FROM usuarios WHERE email = ?";
            $check_stmt = $mysqli->prepare($check_query);
            $check_stmt->bind_param("s", $email);
            $check_stmt->execute();
            $check_stmt->store_result();
            if ($check_stmt->num_rows > 0) {
                // El correo ya está registrado
                echo "El correo ya está registrado.";
            } else {
                // Insertar usuario en la base de datos
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $insert_query = "INSERT INTO usuarios (email, password) VALUES (?, ?)";
                $insert_stmt = $mysqli->prepare($insert_query);
                $insert_stmt->bind_param("ss", $email, $hash);
                if ($insert_stmt->execute()) {
                    // Registro exitoso
                    session_start();
                    $_SESSION["user"] = $email; // Almacena el correo del usuario
                    header("Location: /views/dashboard.php");
                    exit();
                } else {
                    // Error al insertar el usuario
                    echo "Error al registrar el usuario.";
                }
            }
        } else {
            // Datos incompletos
            header("Location: /views/registro.php");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // Error general
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Acceso incorrecto. Ingrese por método POST.";
}
?>
