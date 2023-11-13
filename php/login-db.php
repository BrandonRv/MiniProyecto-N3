<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $email_user = $_POST["email"];
    $pass_user = $_POST["passw"];
    require_once("connection.php");

    try {
        // Verificar si el correo ya existe
        $stmt_check = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt_check->bind_param("s", $email_user);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $_SESSION["error_rg"] = "Esta cuenta ya existe.";
            $stmt_check->close(); 
            redirect("../index.php");
        } else {

            $avatar = file_get_contents("../img/user.png");
            $nombre_user = 'Usuario';
            $info_bio = 'Biografia';
            $info_phone = '5555551234';
            $pass_user = password_hash($pass_user, PASSWORD_DEFAULT);
            $stmt_insert = $mysqli->prepare("INSERT INTO usuarios (nombre, bio, telefono, email, password, foto) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt_insert->bind_param("ssssss", $nombre_user, $info_bio, $info_phone, $email_user, $pass_user, $avatar);
            $stmt_insert->execute();
            $stmt_insert->close();
            $stmt_get_user = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt_get_user->bind_param("s", $email_user);
            $stmt_get_user->execute();
            $result_user = $stmt_get_user->get_result();
            $stmt_get_user->close();

            if ($result_user->num_rows > 0) {
                $user_data = $result_user->fetch_assoc();
                $_SESSION["datos"] = $user_data;
                $_SESSION["user_id"] = $user_data["id"];
                $_SESSION["dato_nombre"] = $user_data["nombre"];
                $_SESSION["dato_bio"] = $user_data["bio"];
                $_SESSION["dato_telef"] =$user_data["telefono"];
                $_SESSION["dato_email"] = $user_data["email"];
                $_SESSION["dato_passw"] = $user_data["password"];
                $_SESSION["dato_imagen"] =$user_data["foto"];
                redirect("perfil-info.php");
            } 
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function redirect($url) {
    header("Location: $url");
    die();
}

?>
